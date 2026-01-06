<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Tableau de bord') }}
            </h2>
            <div class="flex gap-3">

                <a href="{{ route('admin.actualites.create') }}" class="inline-flex items-center px-4 py-2 bg-sipn-blue text-white text-sm font-semibold rounded-lg hover:bg-sipn-blue-light transition">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"/>
                    </svg>
                    Nouvelle actualité
                </a>
                <a href="{{ route('admin.projects.create') }}" class="inline-flex items-center px-4 py-2 bg-sipn-orange text-white text-sm font-semibold rounded-lg hover:bg-sipn-orange-dark transition">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"/>
                    </svg>
                    Nouveau projet
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Message -->
            <div class="bg-gradient-to-r from-sipn-blue to-sipn-blue-light text-white rounded-lg shadow-lg p-6 mb-8">
                <h3 class="text-2xl font-bold mb-2">Bienvenue, {{ Auth::user()->name }} ! 👋</h3>
                <p class="text-gray-100">Voici un aperçu de votre activité aujourd'hui.</p>
            </div>
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mb-8">
                <!-- Total Actualités -->
                <a href="{{ route('admin.actualites.index') }}" class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 border-l-4 border-sipn-blue hover:shadow-2xl transition group">
                    <div class="flex items-center justify-between mb-4">
                        <div class="text-gray-500 text-sm uppercase font-bold">Total Actualités</div>
                        <div class="w-12 h-12 bg-sipn-blue/10 rounded-full flex items-center justify-center group-hover:bg-sipn-blue/20 transition">
                            <svg class="w-6 h-6 text-sipn-blue" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                    <div class="text-3xl font-bold text-gray-800">{{ $stats['total_actualites'] }}</div>
                    <div class="text-sm text-gray-500 mt-2">Voir toutes les actualités →</div>
                </a>
                
                <!-- Actualités Publiées -->
                <a href="{{ route('admin.actualites.index') }}?statut=publie" class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 border-l-4 border-green-500 hover:shadow-2xl transition group">
                    <div class="flex items-center justify-between mb-4">
                        <div class="text-gray-500 text-sm uppercase font-bold">Actualités Publiées</div>
                        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center group-hover:bg-green-200 transition">
                            <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                    <div class="text-3xl font-bold text-gray-800">{{ $stats['actualites_publiees'] }}</div>
                    <div class="text-sm text-gray-500 mt-2">Voir les actualités publiées →</div>
                </a>

                <!-- Brouillons -->
                <a href="{{ route('admin.actualites.index') }}?statut=brouillon" class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 border-l-4 border-yellow-500 hover:shadow-2xl transition group">
                    <div class="flex items-center justify-between mb-4">
                        <div class="text-gray-500 text-sm uppercase font-bold">Brouillons</div>
                        <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center group-hover:bg-yellow-200 transition">
                            <svg class="w-6 h-6 text-yellow-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                    <div class="text-3xl font-bold text-gray-800">{{ $stats['actualites_brouillons'] }}</div>
                    <div class="text-sm text-gray-500 mt-2">Voir les brouillons →</div>
                </a>

                <!-- Unread Contacts -->
                <a href="{{ route('admin.contacts.index') }}" class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 border-l-4 border-sipn-orange hover:shadow-2xl transition group">
                    <div class="flex items-center justify-between mb-4">
                        <div class="text-gray-500 text-sm uppercase font-bold">{{ __('Messages non lus') }}</div>
                        <div class="w-12 h-12 bg-sipn-orange/10 rounded-full flex items-center justify-center group-hover:bg-sipn-orange/20 transition">
                            <svg class="w-6 h-6 text-sipn-orange" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="text-3xl font-bold text-gray-800">{{ $stats['unread_contacts'] }}</div>
                    <div class="text-sm text-gray-500 mt-2">Voir les messages →</div>
                </a>

                <!-- Pending Quotes -->
                <a href="{{ route('admin.quotes.index') }}" class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 border-l-4 border-green-500 hover:shadow-2xl transition group">
                    <div class="flex items-center justify-between mb-4">
                        <div class="text-gray-500 text-sm uppercase font-bold">{{ __('Devis en attente') }}</div>
                        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center group-hover:bg-green-200 transition">
                            <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                                <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                    <div class="text-3xl font-bold text-gray-800">{{ $stats['pending_quotes'] }}</div>
                    <div class="text-sm text-gray-500 mt-2">Voir les devis →</div>
                </a>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Recent Contacts -->
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="px-6 py-4 border-b border-gray-200 bg-gray-50 flex justify-between items-center">
                        <h3 class="text-lg font-bold text-gray-800">{{ __('Derniers messages') }}</h3>
                        <a href="{{ route('admin.contacts.index') }}" class="text-sm text-sipn-blue hover:underline">{{ __('Voir tout') }}</a>
                    </div>
                    <div class="p-6">
                        @forelse($recent_contacts as $contact)
                            <a href="{{ route('admin.contacts.show', $contact->id) }}" class="flex items-start border-b border-gray-100 last:border-0 py-3 hover:bg-gray-50 transition rounded px-2 -mx-2">
                                <div class="flex-shrink-0 w-10 h-10 rounded-full bg-sipn-orange/10 flex items-center justify-center text-sipn-orange font-bold">
                                    {{ substr($contact->name, 0, 1) }}
                                </div>
                                <div class="ml-4 flex-1">
                                    <div class="flex justify-between items-baseline mb-1">
                                        <h4 class="text-sm font-bold text-gray-900">{{ $contact->name }}</h4>
                                        <span class="text-xs text-gray-500">{{ $contact->created_at->diffForHumans() }}</span>
                                    </div>
                                    <p class="text-sm text-gray-600 line-clamp-1 mb-1">{{ $contact->subject }}</p>
                                    <div class="flex items-center gap-2">
                                        @if(!$contact->is_read)
                                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-red-100 text-red-800">
                                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                                                </svg>
                                                Non lu
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-gray-100 text-gray-600">
                                                Lu
                                            </span>
                                        @endif
                                        <span class="text-xs text-gray-500">{{ $contact->email }}</span>
                                    </div>
                                </div>
                            </a>
                        @empty
                            <p class="text-gray-500 text-center py-4">{{ __('Aucun message récent.') }}</p>
                        @endforelse
                    </div>
                </div>

                <!-- Recent Quotes -->
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="px-6 py-4 border-b border-gray-200 bg-gray-50 flex justify-between items-center">
                        <h3 class="text-lg font-bold text-gray-800">{{ __('Dernières demandes de devis') }}</h3>
                        <a href="{{ route('admin.quotes.index') }}" class="text-sm text-sipn-blue hover:underline">{{ __('Voir tout') }}</a>
                    </div>
                    <div class="p-6">
                        @forelse($recent_quotes as $quote)
                            <a href="{{ route('admin.quotes.show', $quote->id) }}" class="flex items-start border-b border-gray-100 last:border-0 py-3 hover:bg-gray-50 transition rounded px-2 -mx-2">
                                <div class="flex-shrink-0 w-10 h-10 rounded-full bg-sipn-blue/10 flex items-center justify-center text-sipn-blue font-bold">
                                    {{ substr($quote->name, 0, 1) }}
                                </div>
                                <div class="ml-4 flex-1">
                                    <div class="flex justify-between items-baseline mb-1">
                                        <h4 class="text-sm font-bold text-gray-900">{{ $quote->company ?? $quote->name }}</h4>
                                        <span class="text-xs text-gray-500">{{ $quote->created_at->diffForHumans() }}</span>
                                    </div>
                                    <p class="text-sm text-gray-600 mb-1">{{ __('Service : ') }} {{ ucfirst(str_replace('_', ' ', $quote->service_type)) }}</p>
                                    <div class="flex items-center gap-2">
                                        @if($quote->status === 'pending')
                                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-orange-100 text-orange-800">
                                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                                </svg>
                                                En attente
                                            </span>
                                        @elseif($quote->status === 'accepted')
                                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800">
                                                Accepté
                                            </span>
                                        @elseif($quote->status === 'rejected')
                                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-red-100 text-red-800">
                                                Refusé
                                            </span>
                                        @endif
                                        @if($quote->budget_range)
                                            <span class="text-xs text-gray-500">Budget: {{ $quote->budget_range }}</span>
                                        @endif
                                    </div>
                                </div>
                            </a>
                        @empty
                            <p class="text-gray-500 text-center py-4">{{ __('Aucune demande récente.') }}</p>
                        @endforelse
                    </div>
                </div>

                <!-- Recent Actualités -->
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="px-6 py-4 border-b border-gray-200 bg-gray-50 flex justify-between items-center">
                        <h3 class="text-lg font-bold text-gray-800">Dernières Actualités</h3>
                        <a href="{{ route('admin.actualites.index') }}" class="text-sm text-sipn-blue hover:underline">Voir tout</a>
                    </div>
                    <div class="p-6">
                        @forelse($recent_actualites as $actualite)
                            <a href="{{ route('admin.actualites.show', $actualite) }}" class="flex items-start border-b border-gray-100 last:border-0 py-3 hover:bg-gray-50 transition rounded px-2 -mx-2">
                                @if($actualite->image_affiche_url)
                                    <img src="{{ $actualite->image_affiche_url }}" 
                                         alt="{{ $actualite->titre }}"
                                         class="flex-shrink-0 w-10 h-10 rounded object-cover">
                                @else
                                    <div class="flex-shrink-0 w-10 h-10 rounded bg-sipn-blue/10 flex items-center justify-center text-sipn-blue">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                @endif
                                <div class="ml-4 flex-1">
                                    <div class="flex justify-between items-baseline mb-1">
                                        <h4 class="text-sm font-bold text-gray-900 line-clamp-1">{{ $actualite->titre }}</h4>
                                        <span class="text-xs text-gray-500">{{ $actualite->created_at->diffForHumans() }}</span>
                                    </div>
                                    <p class="text-sm text-gray-600 line-clamp-1 mb-1">{{ Str::limit($actualite->resume, 60) }}</p>
                                    <div class="flex items-center gap-2">
                                        @if($actualite->statut === 'publie')
                                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800">
                                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                                </svg>
                                                Publié
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-yellow-100 text-yellow-800">
                                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                                </svg>
                                                Brouillon
                                            </span>
                                        @endif
                                        @if($actualite->category)
                                            <span class="text-xs text-gray-500">{{ $actualite->category->name }}</span>
                                        @endif
                                    </div>
                                </div>
                            </a>
                        @empty
                            <p class="text-gray-500 text-center py-4">Aucune actualité récente.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
