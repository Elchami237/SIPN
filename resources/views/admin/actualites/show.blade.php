<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Actualité : {{ Str::limit($actualite->titre, 50) }}
            </h2>
            <div class="flex space-x-2">
                @if($actualite->est_publie)
                    <a href="{{ $actualite->url }}" 
                       target="_blank"
                       class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg font-semibold transition">
                        Voir sur le site
                    </a>
                @endif
                <a href="{{ route('admin.actualites.edit', $actualite) }}" 
                   class="bg-sipn-orange hover:bg-sipn-orange-dark text-white px-4 py-2 rounded-lg font-semibold transition">
                    Éditer
                </a>
                <a href="{{ route('admin.actualites.index') }}" 
                   class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg font-semibold transition">
                    Retour à la liste
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <!-- Informations générales -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wide mb-2">Statut</h3>
                            @if($actualite->statut === 'publie')
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    Publié
                                </span>
                            @else
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    Brouillon
                                </span>
                            @endif
                        </div>

                        <div>
                            <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wide mb-2">Catégorie</h3>
                            @if($actualite->category)
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                    {{ $actualite->category->name }}
                                </span>
                            @else
                                <span class="text-gray-400">Aucune catégorie</span>
                            @endif
                        </div>

                        <div>
                            <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wide mb-2">Date de publication</h3>
                            <p class="text-gray-900">
                                {{ $actualite->date_publication ? $actualite->date_publication->format('d/m/Y à H:i') : 'Non définie' }}
                            </p>
                        </div>

                        <div>
                            <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wide mb-2">Dernière modification</h3>
                            <p class="text-gray-900">{{ $actualite->updated_at->format('d/m/Y à H:i') }}</p>
                        </div>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wide mb-2">Slug</h3>
                        <p class="text-gray-900 font-mono text-sm bg-gray-100 px-3 py-2 rounded">{{ $actualite->slug }}</p>
                    </div>
                </div>
            </div>

            <!-- Contenu de l'actualité -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $actualite->titre }}</h1>

                    @if($actualite->image_affiche_url)
                        <div class="mb-6">
                            <img src="{{ $actualite->image_affiche_url }}" 
                                 alt="{{ $actualite->titre }}"
                                 class="w-full max-w-2xl h-auto rounded-lg shadow-md">
                        </div>
                    @endif

                    <div class="bg-gray-50 border-l-4 border-sipn-orange p-4 mb-6">
                        <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wide mb-2">Résumé</h3>
                        <p class="text-gray-700 leading-relaxed">{{ $actualite->resume }}</p>
                    </div>

                    <div class="prose max-w-none">
                        <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wide mb-2">Contenu</h3>
                        <div class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $actualite->contenu }}</div>
                    </div>
                </div>
            </div>

            <!-- SEO -->
            @if($actualite->meta_description || $actualite->meta_keywords)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Référencement (SEO)</h3>
                        
                        @if($actualite->meta_description && isset($actualite->meta_description['fr']))
                            <div class="mb-4">
                                <h4 class="text-sm font-medium text-gray-500 uppercase tracking-wide mb-2">Meta Description</h4>
                                <p class="text-gray-700 bg-gray-50 p-3 rounded">{{ $actualite->meta_description['fr'] }}</p>
                            </div>
                        @endif

                        @if($actualite->meta_keywords && isset($actualite->meta_keywords['fr']))
                            <div>
                                <h4 class="text-sm font-medium text-gray-500 uppercase tracking-wide mb-2">Mots-clés</h4>
                                <div class="flex flex-wrap gap-2">
                                    @foreach(explode(',', $actualite->meta_keywords['fr']) as $keyword)
                                        <span class="bg-gray-100 text-gray-700 px-2 py-1 rounded text-sm">
                                            {{ trim($keyword) }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>