<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Éditer l'Actualité
                </h2>
                <p class="text-sm text-gray-600 mt-1">{{ $actualite->titre }}</p>
            </div>
            <div class="flex space-x-2">
                <a href="{{ route('admin.actualites.show', $actualite) }}" 
                   class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-semibold transition shadow-sm">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                    </svg>
                    Voir
                </a>
                <a href="{{ route('admin.actualites.index') }}" 
                   class="inline-flex items-center bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg font-semibold transition shadow-sm">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"/>
                    </svg>
                    Retour à la liste
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ route('admin.actualites.update', $actualite) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Titre -->
                        <div class="mb-6">
                            <label for="titre" class="block text-sm font-medium text-gray-700 mb-2">
                                Titre <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   id="titre" 
                                   name="titre" 
                                   value="{{ old('titre', $actualite->titre) }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-sipn-orange focus:border-sipn-orange @error('titre') border-red-500 @enderror"
                                   required>
                            @error('titre')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Résumé -->
                        <div class="mb-6">
                            <label for="resume" class="block text-sm font-medium text-gray-700 mb-2">
                                Résumé <span class="text-red-500">*</span>
                            </label>
                            <textarea id="resume" 
                                      name="resume" 
                                      rows="3"
                                      class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-sipn-orange focus:border-sipn-orange @error('resume') border-red-500 @enderror"
                                      placeholder="Résumé court de l'actualité (max 500 caractères)"
                                      required>{{ old('resume', $actualite->resume) }}</textarea>
                            @error('resume')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Contenu -->
                        <div class="mb-6">
                            <label for="contenu" class="block text-sm font-medium text-gray-700 mb-2">
                                Contenu <span class="text-red-500">*</span>
                            </label>
                            <textarea id="contenu" 
                                      name="contenu" 
                                      rows="10"
                                      class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-sipn-orange focus:border-sipn-orange @error('contenu') border-red-500 @enderror"
                                      placeholder="Contenu complet de l'actualité"
                                      required>{{ old('contenu', $actualite->contenu) }}</textarea>
                            @error('contenu')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Image d'affiche -->
                        <div class="mb-6">
                            <label for="image_affiche" class="block text-sm font-medium text-gray-700 mb-2">
                                Image d'affiche
                            </label>
                            
                            @if($actualite->image_affiche_url)
                                <div class="mb-4">
                                    <img src="{{ $actualite->image_affiche_url }}" 
                                         alt="{{ $actualite->titre }}"
                                         class="w-32 h-32 object-cover rounded-lg">
                                    <p class="text-sm text-gray-500 mt-1">Image actuelle</p>
                                </div>
                            @endif
                            
                            <input type="file" 
                                   id="image_affiche" 
                                   name="image_affiche" 
                                   accept="image/*"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-sipn-orange focus:border-sipn-orange @error('image_affiche') border-red-500 @enderror">
                            <p class="mt-1 text-sm text-gray-500">
                                Formats acceptés : JPEG, PNG, JPG, GIF. Taille maximale : 2MB
                                @if($actualite->image_affiche_url)
                                    <br>Laissez vide pour conserver l'image actuelle.
                                @endif
                            </p>
                            @error('image_affiche')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <!-- Catégorie -->
                            <div>
                                <label for="category_id" class="block text-sm font-medium text-gray-700 mb-2">
                                    Catégorie
                                </label>
                                <select id="category_id" 
                                        name="category_id"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-sipn-orange focus:border-sipn-orange @error('category_id') border-red-500 @enderror">
                                    <option value="">Sélectionner une catégorie</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" 
                                                {{ old('category_id', $actualite->category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Statut -->
                            <div>
                                <label for="statut" class="block text-sm font-medium text-gray-700 mb-2">
                                    Statut <span class="text-red-500">*</span>
                                </label>
                                <select id="statut" 
                                        name="statut"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-sipn-orange focus:border-sipn-orange @error('statut') border-red-500 @enderror"
                                        required>
                                    <option value="brouillon" {{ old('statut', $actualite->statut) === 'brouillon' ? 'selected' : '' }}>
                                        Brouillon
                                    </option>
                                    <option value="publie" {{ old('statut', $actualite->statut) === 'publie' ? 'selected' : '' }}>
                                        Publier
                                    </option>
                                </select>
                                @error('statut')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Date de publication -->
                        <div class="mb-6">
                            <label for="date_publication" class="block text-sm font-medium text-gray-700 mb-2">
                                Date de publication
                            </label>
                            <input type="datetime-local" 
                                   id="date_publication" 
                                   name="date_publication" 
                                   value="{{ old('date_publication', $actualite->date_publication ? $actualite->date_publication->format('Y-m-d\TH:i') : '') }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-sipn-orange focus:border-sipn-orange @error('date_publication') border-red-500 @enderror">
                            <p class="mt-1 text-sm text-gray-500">
                                Laissez vide pour publier immédiatement (si statut = Publier)
                            </p>
                            @error('date_publication')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Galerie d'images -->
                        <div class="border-t border-gray-200 pt-6 mb-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Galerie d'images</h3>
                            
                            <!-- Images existantes -->
                            @if($actualite->images->count() > 0)
                                <div class="mb-6">
                                    <h4 class="text-md font-medium text-gray-700 mb-3">Images actuelles</h4>
                                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                        @foreach($actualite->images as $image)
                                            <div class="relative group">
                                                <img src="{{ $image->image_url }}" 
                                                     alt="{{ $image->alt_text }}"
                                                     class="w-full h-32 object-cover rounded-lg">
                                                <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity rounded-lg flex items-center justify-center">
                                                    <button type="button" 
                                                            onclick="deleteGalleryImage({{ $image->id }})"
                                                            class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm">
                                                        Supprimer
                                                    </button>
                                                </div>
                                                @if($image->caption)
                                                    <p class="text-xs text-gray-600 mt-1">{{ $image->caption }}</p>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            
                            <!-- Nouvelles images -->
                            <div>
                                <h4 class="text-md font-medium text-gray-700 mb-3">Ajouter de nouvelles images</h4>
                                <div id="gallery-container">
                                    <div class="gallery-item mb-4 p-4 border border-gray-200 rounded-lg">
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Image</label>
                                                <input type="file" 
                                                       name="gallery_images[]" 
                                                       accept="image/*"
                                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-sipn-orange focus:border-sipn-orange">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Légende (optionnel)</label>
                                                <input type="text" 
                                                       name="gallery_captions[]" 
                                                       placeholder="Description de l'image"
                                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-sipn-orange focus:border-sipn-orange">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <button type="button" 
                                        id="add-gallery-item" 
                                        class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white text-sm font-medium rounded-md transition">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"/>
                                    </svg>
                                    Ajouter une image
                                </button>
                            </div>
                        </div>

                        <!-- SEO -->
                        <div class="border-t border-gray-200 pt-6 mb-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Référencement (SEO)</h3>
                            
                            <div class="mb-4">
                                <label for="meta_description" class="block text-sm font-medium text-gray-700 mb-2">
                                    Meta Description
                                </label>
                                <textarea id="meta_description" 
                                          name="meta_description" 
                                          rows="2"
                                          maxlength="160"
                                          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-sipn-orange focus:border-sipn-orange @error('meta_description') border-red-500 @enderror"
                                          placeholder="Description pour les moteurs de recherche (max 160 caractères)">{{ old('meta_description', $actualite->meta_description['fr'] ?? '') }}</textarea>
                                @error('meta_description')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="meta_keywords" class="block text-sm font-medium text-gray-700 mb-2">
                                    Mots-clés
                                </label>
                                <input type="text" 
                                       id="meta_keywords" 
                                       name="meta_keywords" 
                                       value="{{ old('meta_keywords', $actualite->meta_keywords['fr'] ?? '') }}"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-sipn-orange focus:border-sipn-orange @error('meta_keywords') border-red-500 @enderror"
                                       placeholder="Mots-clés séparés par des virgules">
                                @error('meta_keywords')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Boutons -->
                        <div class="flex justify-end space-x-4">
                            <a href="{{ route('admin.actualites.index') }}" 
                               class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 transition">
                                Annuler
                            </a>
                            <button type="submit" 
                                    class="px-4 py-2 bg-sipn-orange hover:bg-sipn-orange-dark text-white rounded-md font-semibold transition">
                                Mettre à jour
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addButton = document.getElementById('add-gallery-item');
            const container = document.getElementById('gallery-container');
            let itemCount = 1;

            addButton.addEventListener('click', function() {
                const newItem = document.createElement('div');
                newItem.className = 'gallery-item mb-4 p-4 border border-gray-200 rounded-lg';
                newItem.innerHTML = `
                    <div class="flex justify-between items-start mb-2">
                        <h4 class="text-sm font-medium text-gray-700">Image ${itemCount + 1}</h4>
                        <button type="button" class="remove-gallery-item text-red-600 hover:text-red-800">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Image</label>
                            <input type="file" 
                                   name="gallery_images[]" 
                                   accept="image/*"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-sipn-orange focus:border-sipn-orange">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Légende (optionnel)</label>
                            <input type="text" 
                                   name="gallery_captions[]" 
                                   placeholder="Description de l'image"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-sipn-orange focus:border-sipn-orange">
                        </div>
                    </div>
                `;
                
                container.appendChild(newItem);
                itemCount++;

                // Ajouter l'événement de suppression
                newItem.querySelector('.remove-gallery-item').addEventListener('click', function() {
                    newItem.remove();
                });
            });

            // Gérer la suppression des éléments existants
            container.addEventListener('click', function(e) {
                if (e.target.closest('.remove-gallery-item')) {
                    e.target.closest('.gallery-item').remove();
                }
            });
        });

        // Fonction pour supprimer une image de galerie existante
        function deleteGalleryImage(imageId) {
            if (confirm('Êtes-vous sûr de vouloir supprimer cette image ?')) {
                fetch(`/admin/actualites/images/${imageId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json',
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    } else {
                        alert('Erreur lors de la suppression de l\'image');
                    }
                })
                .catch(error => {
                    console.error('Erreur:', error);
                    alert('Erreur lors de la suppression de l\'image');
                });
            }
        }
    </script>
</x-app-layout>