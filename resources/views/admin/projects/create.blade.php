<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Créer un Projet
            </h2>
            <a href="{{ route('admin.projects.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 text-white text-sm font-semibold rounded-lg hover:bg-gray-700 transition">
                ← Retour
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8">
                <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Titre FR -->
                    <div class="mb-6">
                        <label for="title_fr" class="block text-sm font-medium text-gray-700 mb-2">Titre (Français) *</label>
                        <input type="text" name="title[fr]" id="title_fr" value="{{ old('title.fr') }}" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sipn-orange focus:border-transparent">
                        @error('title.fr')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Titre EN -->
                    <div class="mb-6">
                        <label for="title_en" class="block text-sm font-medium text-gray-700 mb-2">Titre (Anglais)</label>
                        <input type="text" name="title[en]" id="title_en" value="{{ old('title.en') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sipn-orange focus:border-transparent">
                        @error('title.en')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description FR -->
                    <div class="mb-6">
                        <label for="description_fr" class="block text-sm font-medium text-gray-700 mb-2">Description (Français) *</label>
                        <textarea name="description[fr]" id="description_fr" rows="5" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sipn-orange focus:border-transparent">{{ old('description.fr') }}</textarea>
                        @error('description.fr')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description EN -->
                    <div class="mb-6">
                        <label for="description_en" class="block text-sm font-medium text-gray-700 mb-2">Description (Anglais)</label>
                        <textarea name="description[en]" id="description_en" rows="5"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sipn-orange focus:border-transparent">{{ old('description.en') }}</textarea>
                        @error('description.en')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-6 mb-6">
                        <!-- Client -->
                        <div>
                            <label for="client" class="block text-sm font-medium text-gray-700 mb-2">Client</label>
                            <input type="text" name="client" id="client" value="{{ old('client') }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sipn-orange focus:border-transparent">
                            @error('client')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Location -->
                        <div>
                            <label for="location" class="block text-sm font-medium text-gray-700 mb-2">Localisation</label>
                            <input type="text" name="location" id="location" value="{{ old('location') }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sipn-orange focus:border-transparent">
                            @error('location')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-6 mb-6">
                        <!-- Start Date -->
                        <div>
                            <label for="start_date" class="block text-sm font-medium text-gray-700 mb-2">Date de début</label>
                            <input type="date" name="start_date" id="start_date" value="{{ old('start_date') }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sipn-orange focus:border-transparent">
                            @error('start_date')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- End Date -->
                        <div>
                            <label for="end_date" class="block text-sm font-medium text-gray-700 mb-2">Date de fin</label>
                            <input type="date" name="end_date" id="end_date" value="{{ old('end_date') }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sipn-orange focus:border-transparent">
                            @error('end_date')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Category -->
                    <div class="mb-6">
                        <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Catégorie *</label>
                        <select name="category" id="category" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sipn-orange focus:border-transparent">
                            <option value="">Sélectionner une catégorie</option>
                            <option value="construction" {{ old('category') == 'construction' ? 'selected' : '' }}>Construction</option>
                            <option value="genie_civil" {{ old('category') == 'genie_civil' ? 'selected' : '' }}>Génie civil</option>
                            <option value="location" {{ old('category') == 'location' ? 'selected' : '' }}>Location</option>
                            <option value="travaux_publics" {{ old('category') == 'travaux_publics' ? 'selected' : '' }}>Travaux publics</option>
                        </select>
                        @error('category')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Featured Image -->
                    <div class="mb-6">
                        <label for="featured_image" class="block text-sm font-medium text-gray-700 mb-2">Image mise en avant *</label>
                        <input type="file" name="featured_image" id="featured_image" accept="image/jpeg,image/jpg,image/png,image/webp" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sipn-orange focus:border-transparent">
                        <p class="mt-1 text-sm text-gray-500">Formats acceptés : JPEG, JPG, PNG, WebP (max 2 Mo)</p>
                        @error('featured_image')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Is Featured -->
                    <div class="mb-6">
                        <label class="flex items-center">
                            <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}
                                class="rounded border-gray-300 text-sipn-orange focus:ring-sipn-orange">
                            <span class="ml-2 text-sm text-gray-700">Mettre en avant ce projet</span>
                        </label>
                    </div>

                    <!-- Buttons -->
                    <div class="flex items-center justify-end gap-3 pt-6 border-t">
                        <a href="{{ route('admin.projects.index') }}" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                            Annuler
                        </a>
                        <button type="submit" class="px-6 py-2 bg-sipn-orange text-white rounded-lg hover:bg-sipn-orange-dark transition">
                            Créer le projet
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
