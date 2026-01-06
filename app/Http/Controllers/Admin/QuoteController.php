<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    /**
     * Display a listing of quotes.
     */
    public function index(Request $request)
    {
        $query = Quote::latest();

        // Filter by status
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        // Filter by service type
        if ($request->has('service_type')) {
            $query->where('service_type', $request->service_type);
        }

        // Search
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('company', 'like', "%{$search}%");
            });
        }

        $quotes = $query->paginate(20);
        
        $stats = [
            'pending' => Quote::where('status', 'pending')->count(),
            'in_progress' => Quote::where('status', 'in_progress')->count(),
            'quoted' => Quote::where('status', 'quoted')->count(),
            'accepted' => Quote::where('status', 'accepted')->count(),
        ];
        
        return view('admin.quotes.index', compact('quotes', 'stats'));
    }

    /**
     * Display the specified quote.
     */
    public function show($id)
    {
        $quote = Quote::findOrFail($id);
        
        // Mark as read when viewed
        if (!$quote->is_read) {
            $quote->update(['is_read' => true, 'read_at' => now()]);
        }
        
        return view('admin.quotes.show', compact('quote'));
    }

    /**
     * Mark a quote as read.
     */
    public function markAsRead($id)
    {
        $quote = Quote::findOrFail($id);
        $quote->update(['is_read' => true, 'read_at' => now()]);

        if (request()->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Devis marqué comme lu.',
            ]);
        }

        return redirect()->route('admin.quotes.index')->with('success', 'Devis marqué comme lu.');
    }

    /**
     * Update the status of a quote.
     */
    public function updateStatus(Request $request, $id)
    {
        $quote = Quote::findOrFail($id);

        $request->validate([
            'status' => 'required|in:pending,in_progress,quoted,accepted,rejected',
        ]);

        $quote->update(['status' => $request->status]);

        if (request()->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Statut mis à jour avec succès.',
                'quote' => $quote,
            ]);
        }

        return redirect()->route('admin.quotes.show', $id)->with('success', 'Statut mis à jour avec succès.');
    }
}
