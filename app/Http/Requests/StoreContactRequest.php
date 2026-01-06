<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email:rfc,dns|max:255',
            'phone' => 'nullable|string|max:20|regex:/^[0-9\s\+\-\(\)]+$/',
            'company' => 'nullable|string|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10|max:2000',
            'privacy_accepted' => 'required|accepted',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Le nom est obligatoire.',
            'email.required' => 'L\'adresse email est obligatoire.',
            'email.email' => 'L\'adresse email n\'est pas valide.',
            'phone.regex' => 'Le numéro de téléphone n\'est pas valide.',
            'subject.required' => 'Le sujet est obligatoire.',
            'message.required' => 'Le message est obligatoire.',
            'message.min' => 'Le message doit contenir au moins 10 caractères.',
            'message.max' => 'Le message ne doit pas dépasser 2000 caractères.',
            'privacy_accepted.required' => 'Vous devez accepter la politique de confidentialité.',
            'privacy_accepted.accepted' => 'Vous devez accepter la politique de confidentialité.',
        ];
    }
}
