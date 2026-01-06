<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Gestion des Actualités
            </h2>
            <a href="{{ route('admin.actualites.create') }}" 
               class="bg-sipn-orange hover:bg-sipn-orange-dark text-white px-4 py-2 rounded-lg font-semibold transition">
                Nouvelle Actualité
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Filtres -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <form method="GET" class="flex flex-col md:flex-row gap-4">
                        <div class="flex-1">
                            <input type="text" 
                                   name="search" 
                                   value="{{ request('search') }}"
                                   placeholder="Rechercher une actualité..."
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-sipn-orange focus:border-sipn-orange">
                        </div>
                        
                        <div>
                            <select name="statut" 
                                    class="px-3 py-2 border border-gray-300 rounded-md focus:ring-sipn-orange focus:border-sipn-orange">
                                <option value="">Tous les statuts</option>
                                <option value="brouillon" {{ request('statut') === 'brouillon' ? 'selected' : '' }}>Brouillon</option>
                                <option value="publie" {{ request('statut') === 'publie' ? 'selected' : '' }}>Publié</option>
                            </select>
                        </div>
                        
                        <div>
                            <select name="category" 
                                    class="px-3 py-2 border border-gray-300 rounded-md focus:ring-sipn-orange focus:border-sipn-orange">
                                <option value="">Toutes les catégories</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" 
                                            {{ request('category') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <button type="submit" 
                                class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-md transition">
                            Filtrer
                        </button>
                        
                        @if(request()->hasAny(['search', 'statut', 'category']))
                            <a href="{{ route('admin.actualites.index') }}" 
                               class="text-gray-600 hover:text-gray-800 px-4 py-2 transition">
                                Réinitialiser
                            </a>
                        @endif
                    </form>
                </div>
            </div>

            <!-- Liste des actualités -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    @if($actualites->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Actualité
                                        </th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Catégorie
                                        </th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Statut
                                        </th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Date Publication
                                        </th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($actualites as $actualite)
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    @if($actualite->image_affiche_url)
                                                        <img src="{{ $actualite->image_affiche_url }}" 
                                                             alt="{{ $actualite->titre }}"
                                                             class="w-12 h-12 object-cover rounded-lg mr-4">
                                                    @else
                                                        <div class="w-12 h-12 bg-gray-200 rounded-lg mr-4 flex items-center justify-center">
                                                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                                                <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
                                                            </svg>
                                                        </div>
                                                    @endif
                                                    <div>
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{ Str::limit($actualite->titre, 50) }}
                                                        </div>
                                                        <div class="text-sm text-gray-500">
                                                            {{ Str::limit($actualite->resume, 80) }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if($actualite->category)
                                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                        {{ $actualite->category->name }}
                                                    </span>
                                                @else
                                                    <span class="text-gray-400">Aucune</span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if($actualite->statut === 'publie')
                                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                        Publié
                                                    </span>
                                                @else
                                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                                        Brouillon
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $actualite->date_publication ? $actualite->date_publication->format('d/m/Y H:i') : 'Non définie' }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <div class="flex space-x-2">
                                                    <a href="{{ route('admin.actualites.show', $actualite) }}" 
                                                       class="text-blue-600 hover:text-blue-900">Voir</a>
                                                    <a href="{{ route('admin.actualites.edit', $actualite) }}" 
                                                       class="text-indigo-600 hover:text-indigo-900">Éditer</a>
                                                    <form method="POST" 
                                                          action="{{ route('admin.actualites.destroy', $actualite) }}" 
                                                          class="inline"
                                                          onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette actualité ?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" 
                                                                class="text-red-600 hover:text-red-900">
                                                            Supprimer
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <div class="mt-6">
                            {{ $actualites->appends(request()->query())->links() }}
                        </div>
                    @else
                        <div class="text-center py-12">
                            <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
                            </svg>
                            <h3 class="text-lg font-medium text-gray-900 mb-2">Aucune actualité trouvée</h3>
                            <p class="text-gray-500 mb-4">
                                @if(request()->hasAny(['search', 'statut', 'category']))
                                    Essayez de modifier vos critères de recherche.
                                @else
                                    Commencez par créer votre première actualité.
                                @endif
                            </p>
                            <a href="{{ route('admin.actualites.create') }}" 
                               class="inline-flex items-center px-4 py-2 bg-sipn-orange hover:bg-sipn-orange-dark text-white font-semibold rounded-lg transition">
                                Créer une actualité
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>