<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of contacts.
     */
    public function index(Request $request)
    {
        $query = Contact::latest();

        // Filter by read status
        if ($request->has('status')) {
            if ($request->status === 'unread') {
                $query->where('is_read', false);
            } elseif ($request->status === 'read') {
                $query->where('is_read', true);
            }
        }

        // Search
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('subject', 'like', "%{$search}%");
            });
        }

        $contacts = $query->paginate(20);
        $unreadCount = Contact::where('is_read', false)->count();
        
        return view('admin.contacts.index', compact('contacts', 'unreadCount'));
    }

    /**
     * Display the specified contact.
     */
    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        
        // Mark as read when viewed
        if (!$contact->is_read) {
            $contact->update(['is_read' => true, 'read_at' => now()]);
        }
        
        return view('admin.contacts.show', compact('contact'));
    }

    /**
     * Mark a contact as read.
     */
    public function markAsRead($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->update(['is_read' => true, 'read_at' => now()]);

        if (request()->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Contact marqué comme lu.',
            ]);
        }

        return redirect()->route('admin.contacts.index')->with('success', 'Contact marqué comme lu.');
    }
}
