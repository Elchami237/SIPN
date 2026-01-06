<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Détail du Message
            </h2>
            <a href="{{ route('admin.contacts.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 text-white text-sm font-semibold rounded-lg hover:bg-gray-700 transition">
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
                            <div class="w-16 h-16 rounded-full bg-sipn-orange/10 flex items-center justify-center text-sipn-orange font-bold text-2xl mr-4">
                                {{ substr($contact->name, 0, 1) }}
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-gray-900">{{ $contact->name }}</h3>
                                <p class="text-gray-600">{{ $contact->email }}</p>
                            </div>
                        </div>
                        @if(!$contact->is_read)
                            <form action="{{ route('admin.contacts.markAsRead', $contact->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="px-4 py-2 bg-sipn-orange text-white rounded-lg hover:bg-sipn-orange-dark">
                                    Marquer comme lu
                                </button>
                            </form>
                        @else
                            <span class="px-4 py-2 bg-green-100 text-green-800 rounded-lg font-semibold">
                                ✓ Lu
                            </span>
                        @endif
                    </div>
                </div>

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Téléphone</label>
                        <p class="text-gray-900">{{ $contact->phone ?? 'Non renseigné' }}</p>
                    </div>

                    @if($contact->company)
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Entreprise</label>
                            <p class="text-gray-900">{{ $contact->company }}</p>
                        </div>
                    @endif

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Sujet</label>
                        <p class="text-lg font-semibold text-gray-900">{{ $contact->subject }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Message</label>
                        <div class="bg-gray-50 rounded-lg p-4">
                            <p class="text-gray-900 whitespace-pre-wrap">{{ $contact->message }}</p>
                        </div>
                    </div>

                    <div class="pt-4 border-t">
                        <div class="flex items-center justify-between text-sm text-gray-600">
                            <span>Reçu le {{ $contact->created_at->format('d/m/Y à H:i') }}</span>
                            @if($contact->read_at)
                                <span>Lu le {{ $contact->read_at->format('d/m/Y à H:i') }}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="mt-8 pt-6 border-t">
                    <h4 class="font-semibold text-gray-900 mb-4">Actions rapides</h4>
                    <div class="flex gap-3">
                        <a href="mailto:{{ $contact->email }}" class="inline-flex items-center px-4 py-2 bg-sipn-blue text-white rounded-lg hover:bg-sipn-blue-light">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                            </svg>
                            Répondre par email
                        </a>
                        @if($contact->phone)
                            <a href="tel:{{ $contact->phone }}" class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                                </svg>
                                Appeler
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
