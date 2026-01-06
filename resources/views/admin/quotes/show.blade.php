<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Détail de la Demande de Devis
            </h2>
            <a href="{{ route('admin.quotes.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 text-white text-sm font-semibold rounded-lg hover:bg-gray-700 transition">
                ← Retour
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8">
                <div class="mb-6 pb-6 border-b">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center">
                            <div class="w-16 h-16 rounded-full bg-sipn-blue/10 flex items-center justify-center text-sipn-blue font-bold text-2xl mr-4">
                                {{ substr($quote->name, 0, 1) }}
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-gray-900">{{ $quote->company ?? $quote->name }}</h3>
                                <p class="text-gray-600">{{ $quote->email }}</p>
                            </div>
                        </div>
                        <div>
                            @if($quote->status === 'pending')
                                <span class="px-4 py-2 bg-orange-100 text-orange-800 rounded-lg font-semibold">
                                    ⏳ En attente
                                </span>
                            @elseif($quote->status === 'accepted')
                                <span class="px-4 py-2 bg-green-100 text-green-800 rounded-lg font-semibold">
                                    ✓ Accepté
                                </span>
                            @elseif($quote->status === 'rejected')
                                <span class="px-4 py-2 bg-red-100 text-red-800 rounded-lg font-semibold">
                                    ✗ Refusé
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nom</label>
                        <p class="text-gray-900">{{ $quote->name }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Téléphone</label>
                        <p class="text-gray-900">{{ $quote->phone }}</p>
                    </div>

                    @if($quote->company)
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Entreprise</label>
                            <p class="text-gray-900">{{ $quote->company }}</p>
                        </div>
                    @endif

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Type de service</label>
                        <p class="text-gray-900">{{ ucfirst(str_replace('_', ' ', $quote->service_type)) }}</p>
                    </div>

                    @if($quote->start_date)
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Date de début</label>
                            <p class="text-gray-900">{{ $quote->start_date->format('d/m/Y') }}</p>
                        </div>
                    @endif

                    @if($quote->end_date)
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Date de fin</label>
                            <p class="text-gray-900">{{ $quote->end_date->format('d/m/Y') }}</p>
                        </div>
                    @endif

                    @if($quote->budget_range)
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Budget</label>
                            <p class="text-gray-900">{{ $quote->budget_range }}</p>
                        </div>
                    @endif
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Description du projet</label>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-gray-900 whitespace-pre-wrap">{{ $quote->description }}</p>
                    </div>
                </div>

                @if($quote->attachments && count($quote->attachments) > 0)
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Pièces jointes</label>
                        <div class="space-y-2">
                            @foreach($quote->attachments as $attachment)
                                <a href="{{ Storage::url($attachment) }}" target="_blank" class="flex items-center p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                                    <svg class="w-5 h-5 text-gray-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="text-sm text-gray-700">{{ basename($attachment) }}</span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                <div class="pt-4 border-t mb-6">
                    <div class="flex items-center justify-between text-sm text-gray-600">
                        <span>Reçu le {{ $quote->created_at->format('d/m/Y à H:i') }}</span>
                    </div>
                </div>

                <div class="pt-6 border-t">
                    <h4 class="font-semibold text-gray-900 mb-4">Actions</h4>
                    <div class="flex gap-3">
                        <a href="mailto:{{ $quote->email }}" class="inline-flex items-center px-4 py-2 bg-sipn-blue text-white rounded-lg hover:bg-sipn-blue-light">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                            </svg>
                            Répondre par email
                        </a>
                        <a href="tel:{{ $quote->phone }}" class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                            </svg>
                            Appeler
                        </a>
                        
                        @if($quote->status === 'pending')
                            <form action="{{ route('admin.quotes.updateStatus', $quote->id) }}" method="POST" class="inline">
                                @csrf
                                <input type="hidden" name="status" value="accepted">
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                                    ✓ Accepter
                                </button>
                            </form>
                            <form action="{{ route('admin.quotes.updateStatus', $quote->id) }}" method="POST" class="inline">
                                @csrf
                                <input type="hidden" name="status" value="rejected">
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                                    ✗ Refuser
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
