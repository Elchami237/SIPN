<x-public-layout>
    <!-- Header Section -->
    <section class="bg-gradient-to-r from-sipn-blue to-sipn-blue-light text-white py-16">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center">
                <h1 class="font-heading font-bold text-4xl md:text-5xl mb-4">
                    Actualités
                </h1>
                <p class="text-xl text-gray-200 max-w-2xl mx-auto">
                    Découvrez nos dernières actualités, projets et innovations dans le domaine de la construction et de la location d'équipements.
                </p>
            </div>
        </div>
    </section>

    <!-- Filters Section -->
    <section class="py-8 bg-gray-50 border-b">
        <div class="max-w-7xl mx-auto px-4">
            <form method="GET" class="flex flex-col md:flex-row gap-4 items-center justify-between">
                <!-- Search -->
                <div class="flex-1 max-w-md">
                    <input type="text" 
                           name="search" 
                           value="{{ request('search') }}"
                           placeholder="Rechercher une actualité..."
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sipn-orange focus:border-transparent">
                </div>

                <!-- Category Filter -->
                <div class="flex gap-4 items-center">
                    <select name="category" 
                            class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sipn-orange focus:border-transparent">
                        <option value="">Toutes les catégories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->slug }}" 
                                    {{ request('category') === $category->slug ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>

                    <button type="submit" 
                            class="bg-sipn-orange hover:bg-sipn-orange-dark text-white px-6 py-2 rounded-lg font-semibold transition">
                        Filtrer
                    </button>

                    @if(request()->hasAny(['search', 'category']))
                        <a href="{{ route('actualites.index') }}" 
                           class="text-gray-600 hover:text-sipn-orange transition">
                            Réinitialiser
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </section>

    <!-- Actualités Grid -->
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4">
            @if($actualites->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($actualites as $actualite)
                        <article class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                            @if($actualite->image_affiche_url)
                                <div class="aspect-video overflow-hidden">
                                    <img src="{{ $actualite->image_affiche_url }}" 
                                         alt="{{ $actualite->titre }}" 
                                         class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                                </div>
                            @else
                                <div class="aspect-video bg-gradient-to-br from-sipn-blue to-sipn-blue-light flex items-center justify-center">
                                    <svg class="w-16 h-16 text-white opacity-50" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                            @endif

                            <div class="p-6">
                                <div class="flex items-center gap-2 text-sm text-gray-500 mb-3">
                                    @if($actualite->category)
                                        <span class="bg-sipn-orange/10 text-sipn-orange px-3 py-1 rounded-full font-medium">
                                            {{ $actualite->category->name }}
                                        </span>
                                    @endif
                                    <span>{{ $actualite->date_publication_formatee }}</span>
                                </div>

                                <h3 class="text-xl font-bold text-sipn-blue mb-3 line-clamp-2 hover:text-sipn-orange transition">
                                    <a href="{{ $actualite->url }}">
                                        {{ $actualite->titre }}
                                    </a>
                                </h3>

                                <p class="text-gray-600 mb-4 line-clamp-3">
                                    {{ $actualite->resume_court }}
                                </p>

                                <a href="{{ $actualite->url }}" 
                                   class="inline-flex items-center text-sipn-orange font-semibold hover:text-sipn-orange-dark transition group">
                                    Lire la suite
                                    <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" 
                                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-12">
                    {{ $actualites->appends(request()->query())->links() }}
                </div>
            @else
                <div class="text-center py-16">
                    <svg class="w-24 h-24 text-gray-300 mx-auto mb-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
                    </svg>
                    <h3 class="text-xl font-semibold text-gray-600 mb-2">Aucune actualité trouvée</h3>
                    <p class="text-gray-500">
                        @if(request()->hasAny(['search', 'category']))
                            Essayez de modifier vos critères de recherche.
                        @else
                            Les actualités seront bientôt disponibles.
                        @endif
                    </p>
                </div>
            @endif
        </div>
    </section>
</x-public-layout>