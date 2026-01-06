<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Demandes de Devis
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    @if($quotes->count() > 0)
                        <div class="space-y-4">
                            @foreach($quotes as $quote)
                                <div class="border rounded-lg p-4 hover:bg-gray-50 transition {{ $quote->status === 'pending' ? 'border-orange-300 bg-orange-50' : 'border-gray-200' }}">
                                    <div class="flex items-start justify-between">
                                        <div class="flex items-start flex-1">
                                            <div class="flex-shrink-0 w-12 h-12 rounded-full bg-sipn-blue/10 flex items-center justify-center text-sipn-blue font-bold text-lg">
                                                {{ substr($quote->name, 0, 1) }}
                                            </div>
                                            <div class="ml-4 flex-1">
                                                <div class="flex items-center gap-3 mb-2">
                                                    <h3 class="text-lg font-bold text-gray-900">{{ $quote->company ?? $quote->name }}</h3>
                                                    @if($quote->status === 'pending')
                                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-orange-100 text-orange-800">
                                                            En attente
                                                        </span>
                                                    @elseif($quote->status === 'accepted')
                                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                                            Accepté
                                                        </span>
                                                    @elseif($quote->status === 'rejected')
                                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">
                                                            Refusé
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="flex items-center gap-4 text-sm text-gray-600 mb-2">
                                                    <span class="flex items-center">
                                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                                                        </svg>
                                                        {{ $quote->email }}
                                                    </span>
                                                    <span class="flex items-center">
                                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                                                        </svg>
                                                        {{ $quote->phone }}
                                                    </span>
                                                </div>
                                                <div class="grid grid-cols-2 gap-4 mb-3">
                                                    <div>
                                                        <span class="font-semibold text-gray-700">Service :</span>
                                                        <span class="text-gray-900">{{ ucfirst(str_replace('_', ' ', $quote->service_type)) }}</span>
                                                    </div>
                                                    @if($quote->budget_range)
                                                        <div>
                                                            <span class="font-semibold text-gray-700">Budget :</span>
                                                            <span class="text-gray-900">{{ $quote->budget_range }}</span>
                                                        </div>
                                                    @endif
                                                </div>
                                                <p class="text-gray-700 mb-3">{{ Str::limit($quote->description, 150) }}</p>
                                                <div class="flex items-center gap-2 text-xs text-gray-500">
                                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                                    </svg>
                                                    {{ $quote->created_at->diffForHumans() }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex flex-col gap-2 ml-4">
                                            <a href="{{ route('admin.quotes.show', $quote->id) }}" class="inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                                Voir détails
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-6">
                            {{ $quotes->links() }}
                        </div>
                    @else
                        <div class="text-center py-12">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">Aucune demande de devis</h3>
                            <p class="mt-1 text-sm text-gray-500">Les demandes de devis apparaîtront ici.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
