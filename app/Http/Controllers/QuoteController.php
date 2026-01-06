<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuoteRequest;
use App\Models\Quote;
use Illuminate\Support\Facades\Storage;

class QuoteController extends Controller
{
    public function create()
    {
        return view('quote');
    }

    public function store(StoreQuoteRequest $request)
    {
        $validated = $request->validated();

        // Handle file uploads
        if ($request->hasFile('attachments')) {
            $attachmentPaths = [];
            foreach ($request->file('attachments') as $file) {
                $path = $file->store('quote-attachments', 'public');
                $attachmentPaths[] = $path;
            }
            $validated['attachments'] = $attachmentPaths;
        }

        // Store IP for security (with timestamp for GDPR compliance)
        $validated['ip_address'] = $request->ip();
        $validated['ip_stored_at'] = now();
        $validated['status'] = 'pending';

        // Remove privacy_accepted from data to be stored
        unset($validated['privacy_accepted']);

        Quote::create($validated);

        return redirect()->route('quote.create')->with('success', 'Votre demande de devis a été envoyée avec succès. Nous vous contacterons dans les plus brefs délais.');
    }
}
