<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title.fr' => 'required|string|max:255',
            'title.en' => 'nullable|string|max:255',
            'description.fr' => 'required|string',
            'description.en' => 'nullable|string',
            'client' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'category' => 'required|in:construction,genie_civil,location,travaux_publics',
            'featured_image' => 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
            'is_featured' => 'boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'title.fr.required' => 'Le titre en français est obligatoire.',
            'description.fr.required' => 'La description en français est obligatoire.',
            'featured_image.required' => 'L\'image mise en avant est obligatoire.',
            'featured_image.image' => 'Le fichier doit être une image.',
            'featured_image.mimes' => 'L\'image doit être au format JPEG, JPG, PNG ou WebP.',
            'featured_image.max' => 'L\'image ne doit pas dépasser 2 Mo.',
            'end_date.after_or_equal' => 'La date de fin doit être après ou égale à la date de début.',
            'category.required' => 'La catégorie est obligatoire.',
            'category.in' => 'La catégorie sélectionnée n\'est pas valide.',
        ];
    }
}
