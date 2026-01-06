<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    /**
     * Display a listing of media files.
     */
    public function index(Request $request)
    {
        $query = Media::latest();

        // Filter by type if requested
        if ($request->has('type')) {
            $query->where('type', $request->type);
        }

        // Search by filename
        if ($request->has('search')) {
            $query->where('filename', 'like', '%' . $request->search . '%');
        }

        $media = $query->paginate(24);
        
        return view('admin.media.index', compact('media'));
    }

    /**
     * Upload a new media file.
     */
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:10240', // 10MB max
            'alt_text' => 'nullable|string|max:255',
        ]);

        $file = $request->file('file');
        
        // Determine file type
        $mimeType = $file->getMimeType();
        $type = 'other';
        
        if (str_starts_with($mimeType, 'image/')) {
            $type = 'image';
        } elseif (str_starts_with($mimeType, 'video/')) {
            $type = 'video';
        } elseif (str_starts_with($mimeType, 'application/pdf')) {
            $type = 'document';
        }

        // Store the file
        $path = $file->store('media', 'public');
        
        // Create media record
        $media = Media::create([
            'filename' => $file->getClientOriginalName(),
            'path' => $path,
            'url' => Storage::url($path),
            'type' => $type,
            'mime_type' => $mimeType,
            'size' => $file->getSize(),
            'alt_text' => $request->alt_text,
        ]);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'media' => $media,
            ]);
        }

        return redirect()->route('admin.media.index')->with('success', 'Fichier uploadé avec succès.');
    }

    /**
     * Delete a media file.
     */
    public function destroy($id)
    {
        $media = Media::findOrFail($id);
        
        // Delete the file from storage
        if (Storage::disk('public')->exists($media->path)) {
            Storage::disk('public')->delete($media->path);
        }
        
        // Delete the database record
        $media->delete();

        if (request()->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Fichier supprimé avec succès.',
            ]);
        }

        return redirect()->route('admin.media.index')->with('success', 'Fichier supprimé avec succès.');
    }
}
