<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact');
    }

    public function store(StoreContactRequest $request)
    {
        $validated = $request->validated();
        
        // Store IP only if privacy accepted (with timestamp for GDPR compliance)
        $validated['ip_address'] = $request->ip();
        $validated['ip_stored_at'] = now();
        
        // Remove privacy_accepted from data to be stored
        unset($validated['privacy_accepted']);

        Contact::create($validated);

        return redirect()->route('contact.create')->with('success', 'Votre message a été envoyé avec succès. Nous vous répondrons dans les plus brefs délais.');
    }
}
