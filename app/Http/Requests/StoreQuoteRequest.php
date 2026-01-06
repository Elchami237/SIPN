<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuoteRequest extends FormRequest
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
            'phone' => 'required|string|max:20|regex:/^[0-9\s\+\-\(\)]+$/',
            'company' => 'nullable|string|max:255',
            'service_type' => 'required|in:location,genie_civil,construction_metallique,travaux_publics',
            'start_date' => 'nullable|date|after_or_equal:today',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'description' => 'required|string|min:20|max:2000',
            'budget_range' => 'nullable|in:0-5M,5M-10M,10M-50M,50M+',
            'attachments.*' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:5120',
            'privacy_accepted' => 'required|accepted',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Le nom est obligatoire.',
            'email.required' => 'L\'adresse email est obligatoire.',
            'email.email' => 'L\'adresse email n\'est pas valide.',
            'phone.required' => 'Le numéro de téléphone est obligatoire.',
            'phone.regex' => 'Le numéro de téléphone n\'est pas valide.',
            'service_type.required' => 'Le type de service est obligatoire.',
            'service_type.in' => 'Le type de service sélectionné n\'est pas valide.',
            'start_date.after_or_equal' => 'La date de début ne peut pas être dans le passé.',
            'end_date.after_or_equal' => 'La date de fin doit être après ou égale à la date de début.',
            'description.required' => 'La description du projet est obligatoire.',
            'description.min' => 'La description doit contenir au moins 20 caractères.',
            'description.max' => 'La description ne doit pas dépasser 2000 caractères.',
            'attachments.*.mimes' => 'Les fichiers doivent être au format PDF, DOC, DOCX, JPG, JPEG ou PNG.',
            'attachments.*.max' => 'Chaque fichier ne doit pas dépasser 5 Mo.',
            'privacy_accepted.required' => 'Vous devez accepter la politique de confidentialité.',
            'privacy_accepted.accepted' => 'Vous devez accepter la politique de confidentialité.',
        ];
    }
}
