<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Créer une Actualité
                </h2>
                <p class="text-sm text-gray-600 mt-1">Ajoutez une nouvelle actualité avec du contenu riche et des images</p>
            </div>
            <a href="{{ route('admin.actualites.index') }}" 
               class="inline-flex items-center bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg font-semibold transition shadow-sm">
                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"/>
                </svg>
                Retour à la liste
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-xl border border-gray-200">
                <div class="bg-gradient-to-r from-sipn-blue to-sipn-blue-light p-6 text-white">
                    <h3 class="text-lg font-semibold flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"/>
                        </svg>
                        Nouvelle Actualité
                    </h3>
                    <p class="text-sm text-blue-100 mt-1">Remplissez les informations ci-dessous pour créer votre actualité</p>
                </div>
                <div class="p-8">
                    <form method="POST" action="{{ route('admin.actualites.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Titre -->
                        <div class="mb-6">
                            <label for="titre" class="block text-sm font-medium text-gray-700 mb-2">
                                Titre <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   id="titre" 
                                   name="titre" 
                                   value="{{ old('titre') }}"
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
                                      required>{{ old('resume') }}</textarea>
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
                                      required>{{ old('contenu') }}</textarea>
                            @error('contenu')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Image d'affiche -->
                        <div class="mb-8">
                            <label for="image_affiche" class="block text-sm font-medium text-gray-700 mb-3">
                                <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
                                </svg>
                                Image d'affiche
                            </label>
                            
                            <!-- Zone de prévisualisation -->
                            <div id="image-preview-container" class="mb-4 hidden">
                                <div class="relative inline-block">
                                    <img id="image-preview" 
                                         src="" 
                                         alt="Prévisualisation" 
                                         class="max-w-xs max-h-48 object-cover rounded-lg shadow-md border border-gray-200">
                                    <button type="button" 
                                            id="remove-image" 
                                            class="absolute -top-2 -right-2 bg-red-500 hover:bg-red-600 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs transition">
                                        ×
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Zone de drop et sélection -->
                            <div id="image-drop-zone" 
                                 class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-sipn-orange transition-colors cursor-pointer">
                                <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <p class="text-gray-600 mb-2">
                                    <span class="font-medium text-sipn-orange">Cliquez pour sélectionner</span> ou glissez-déposez une image
                                </p>
                                <p class="text-xs text-gray-500">PNG, JPG, GIF jusqu'à 2MB</p>
                            </div>
                            
                            <input type="file" 
                                   id="image_affiche" 
                                   name="image_affiche" 
                                   accept="image/*"
                                   class="hidden @error('image_affiche') border-red-500 @enderror">
                            
                            @error('image_affiche')
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    {{ $message }}
                                </p>
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
                                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
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
                                    <option value="brouillon" {{ old('statut', 'brouillon') === 'brouillon' ? 'selected' : '' }}>
                                        Brouillon
                                    </option>
                                    <option value="publie" {{ old('statut') === 'publie' ? 'selected' : '' }}>
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
                                   value="{{ old('date_publication') }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-sipn-orange focus:border-sipn-orange @error('date_publication') border-red-500 @enderror">
                            <p class="mt-1 text-sm text-gray-500">
                                Laissez vide pour publier immédiatement (si statut = Publier)
                            </p>
                            @error('date_publication')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Galerie d'images -->
                        <div class="border-t border-gray-200 pt-8 mb-8">
                            <div class="flex items-center mb-6">
                                <svg class="w-5 h-5 text-sipn-orange mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
                                </svg>
                                <h3 class="text-lg font-medium text-gray-900">Galerie d'images</h3>
                            </div>
                            <p class="text-sm text-gray-600 mb-6">Ajoutez des images supplémentaires qui seront affichées dans une galerie interactive</p>
                            
                            <div id="gallery-container">
                                <div class="gallery-item mb-6 p-6 border border-gray-200 rounded-xl bg-gray-50 hover:bg-gray-100 transition">
                                    <div class="flex items-center justify-between mb-4">
                                        <h4 class="text-sm font-semibold text-gray-700 flex items-center">
                                            <span class="bg-sipn-orange text-white rounded-full w-6 h-6 flex items-center justify-center text-xs mr-2">1</span>
                                            Image de galerie
                                        </h4>
                                    </div>
                                    
                                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                                        <!-- Zone d'upload -->
                                        <div class="lg:col-span-2">
                                            <label class="block text-sm font-medium text-gray-700 mb-3">Sélectionner une image</label>
                                            <div class="gallery-drop-zone border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-sipn-orange transition-colors cursor-pointer">
                                                <svg class="mx-auto h-8 w-8 text-gray-400 mb-2" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                                <p class="text-sm text-gray-600">Cliquez ou glissez une image</p>
                                            </div>
                                            <input type="file" 
                                                   name="gallery_images[]" 
                                                   accept="image/*"
                                                   class="gallery-input hidden">
                                            
                                            <!-- Prévisualisation -->
                                            <div class="gallery-preview mt-4 hidden">
                                                <img class="gallery-preview-img w-full h-32 object-cover rounded-lg border border-gray-200" src="" alt="Prévisualisation">
                                            </div>
                                        </div>
                                        
                                        <!-- Légende -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-3">Légende (optionnel)</label>
                                            <textarea name="gallery_captions[]" 
                                                      rows="4"
                                                      placeholder="Décrivez cette image..."
                                                      class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-sipn-orange focus:border-sipn-orange resize-none"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <button type="button" 
                                    id="add-gallery-item" 
                                    class="inline-flex items-center px-6 py-3 bg-sipn-orange hover:bg-sipn-orange-dark text-white font-medium rounded-lg transition shadow-sm">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"/>
                                </svg>
                                Ajouter une image à la galerie
                            </button>
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
                                          placeholder="Description pour les moteurs de recherche (max 160 caractères)">{{ old('meta_description') }}</textarea>
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
                                       value="{{ old('meta_keywords') }}"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-sipn-orange focus:border-sipn-orange @error('meta_keywords') border-red-500 @enderror"
                                       placeholder="Mots-clés séparés par des virgules">
                                @error('meta_keywords')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Boutons -->
                        <div class="border-t border-gray-200 pt-8">
                            <div class="flex flex-col sm:flex-row justify-end space-y-3 sm:space-y-0 sm:space-x-4">
                                <a href="{{ route('admin.actualites.index') }}" 
                                   class="inline-flex items-center justify-center px-6 py-3 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition font-medium">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                    </svg>
                                    Annuler
                                </a>
                                <button type="submit" 
                                        class="inline-flex items-center justify-center px-8 py-3 bg-sipn-orange hover:bg-sipn-orange-dark text-white rounded-lg font-semibold transition shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                    </svg>
                                    Créer l'actualité
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Gestion de l'image d'affiche
            const imageInput = document.getElementById('image_affiche');
            const dropZone = document.getElementById('image-drop-zone');
            const previewContainer = document.getElementById('image-preview-container');
            const previewImage = document.getElementById('image-preview');
            const removeButton = document.getElementById('remove-image');

            // Clic sur la zone de drop
            dropZone.addEventListener('click', () => imageInput.click());

            // Drag & Drop
            dropZone.addEventListener('dragover', (e) => {
                e.preventDefault();
                dropZone.classList.add('border-sipn-orange', 'bg-orange-50');
            });

            dropZone.addEventListener('dragleave', () => {
                dropZone.classList.remove('border-sipn-orange', 'bg-orange-50');
            });

            dropZone.addEventListener('drop', (e) => {
                e.preventDefault();
                dropZone.classList.remove('border-sipn-orange', 'bg-orange-50');
                const files = e.dataTransfer.files;
                if (files.length > 0) {
                    imageInput.files = files;
                    handleImagePreview(files[0]);
                }
            });

            // Changement de fichier
            imageInput.addEventListener('change', (e) => {
                if (e.target.files.length > 0) {
                    handleImagePreview(e.target.files[0]);
                }
            });

            // Supprimer l'image
            removeButton.addEventListener('click', () => {
                imageInput.value = '';
                previewContainer.classList.add('hidden');
                dropZone.classList.remove('hidden');
            });

            function handleImagePreview(file) {
                if (file && file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        previewImage.src = e.target.result;
                        previewContainer.classList.remove('hidden');
                        dropZone.classList.add('hidden');
                    };
                    reader.readAsDataURL(file);
                }
            }

            // Gestion de la galerie
            const addButton = document.getElementById('add-gallery-item');
            const container = document.getElementById('gallery-container');
            let itemCount = 1;

            // Initialiser la première galerie
            initializeGalleryItem(container.querySelector('.gallery-item'));

            addButton.addEventListener('click', function() {
                itemCount++;
                const newItem = document.createElement('div');
                newItem.className = 'gallery-item mb-6 p-6 border border-gray-200 rounded-xl bg-gray-50 hover:bg-gray-100 transition';
                newItem.innerHTML = `
                    <div class="flex items-center justify-between mb-4">
                        <h4 class="text-sm font-semibold text-gray-700 flex items-center">
                            <span class="bg-sipn-orange text-white rounded-full w-6 h-6 flex items-center justify-center text-xs mr-2">${itemCount}</span>
                            Image de galerie
                        </h4>
                        <button type="button" class="remove-gallery-item text-red-600 hover:text-red-800 p-1 rounded-full hover:bg-red-100 transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </div>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        <div class="lg:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-3">Sélectionner une image</label>
                            <div class="gallery-drop-zone border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-sipn-orange transition-colors cursor-pointer">
                                <svg class="mx-auto h-8 w-8 text-gray-400 mb-2" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <p class="text-sm text-gray-600">Cliquez ou glissez une image</p>
                            </div>
                            <input type="file" 
                                   name="gallery_images[]" 
                                   accept="image/*"
                                   class="gallery-input hidden">
                            
                            <div class="gallery-preview mt-4 hidden">
                                <img class="gallery-preview-img w-full h-32 object-cover rounded-lg border border-gray-200" src="" alt="Prévisualisation">
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-3">Légende (optionnel)</label>
                            <textarea name="gallery_captions[]" 
                                      rows="4"
                                      placeholder="Décrivez cette image..."
                                      class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-sipn-orange focus:border-sipn-orange resize-none"></textarea>
                        </div>
                    </div>
                `;
                
                container.appendChild(newItem);
                initializeGalleryItem(newItem);

                // Animation d'apparition
                newItem.style.opacity = '0';
                newItem.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    newItem.style.transition = 'all 0.3s ease';
                    newItem.style.opacity = '1';
                    newItem.style.transform = 'translateY(0)';
                }, 10);
            });

            function initializeGalleryItem(item) {
                const dropZone = item.querySelector('.gallery-drop-zone');
                const input = item.querySelector('.gallery-input');
                const preview = item.querySelector('.gallery-preview');
                const previewImg = item.querySelector('.gallery-preview-img');
                const removeBtn = item.querySelector('.remove-gallery-item');

                // Clic sur la zone
                dropZone.addEventListener('click', () => input.click());

                // Drag & Drop
                dropZone.addEventListener('dragover', (e) => {
                    e.preventDefault();
                    dropZone.classList.add('border-sipn-orange', 'bg-orange-50');
                });

                dropZone.addEventListener('dragleave', () => {
                    dropZone.classList.remove('border-sipn-orange', 'bg-orange-50');
                });

                dropZone.addEventListener('drop', (e) => {
                    e.preventDefault();
                    dropZone.classList.remove('border-sipn-orange', 'bg-orange-50');
                    const files = e.dataTransfer.files;
                    if (files.length > 0) {
                        input.files = files;
                        handleGalleryPreview(files[0], dropZone, preview, previewImg);
                    }
                });

                // Changement de fichier
                input.addEventListener('change', (e) => {
                    if (e.target.files.length > 0) {
                        handleGalleryPreview(e.target.files[0], dropZone, preview, previewImg);
                    }
                });

                // Supprimer l'élément
                if (removeBtn) {
                    removeBtn.addEventListener('click', () => {
                        item.style.transition = 'all 0.3s ease';
                        item.style.opacity = '0';
                        item.style.transform = 'translateY(-20px)';
                        setTimeout(() => item.remove(), 300);
                    });
                }
            }

            function handleGalleryPreview(file, dropZone, preview, previewImg) {
                if (file && file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        previewImg.src = e.target.result;
                        preview.classList.remove('hidden');
                        dropZone.classList.add('hidden');
                    };
                    reader.readAsDataURL(file);
                }
            }
        });
    </script>
</x-app-layout>