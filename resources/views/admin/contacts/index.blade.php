<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Messages de Contact
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
                    @if($contacts->count() > 0)
                        <div class="space-y-4">
                            @foreach($contacts as $contact)
                                <div class="border rounded-lg p-4 hover:bg-gray-50 transition {{ !$contact->is_read ? 'border-sipn-orange bg-orange-50' : 'border-gray-200' }}">
                                    <div class="flex items-start justify-between">
                                        <div class="flex items-start flex-1">
                                            <div class="flex-shrink-0 w-12 h-12 rounded-full bg-sipn-orange/10 flex items-center justify-center text-sipn-orange font-bold text-lg">
                                                {{ substr($contact->name, 0, 1) }}
                                            </div>
                                            <div class="ml-4 flex-1">
                                                <div class="flex items-center gap-3 mb-2">
                                                    <h3 class="text-lg font-bold text-gray-900">{{ $contact->name }}</h3>
                                                    @if(!$contact->is_read)
                                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">
                                                            Nouveau
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="flex items-center gap-4 text-sm text-gray-600 mb-2">
                                                    <span class="flex items-center">
                                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                                                        </svg>
                                                        {{ $contact->email }}
                                                    </span>
                                                    @if($contact->phone)
                                                        <span class="flex items-center">
                                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                                                            </svg>
                                                            {{ $contact->phone }}
                                                        </span>
                                                    @endif
                                                    @if($contact->company)
                                                        <span class="flex items-center">
                                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z" clip-rule="evenodd"/>
                                                            </svg>
                                                            {{ $contact->company }}
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="mb-2">
                                                    <span class="font-semibold text-gray-700">Sujet :</span>
                                                    <span class="text-gray-900">{{ $contact->subject }}</span>
                                                </div>
                                                <p class="text-gray-700 mb-3">{{ Str::limit($contact->message, 200) }}</p>
                                                <div class="flex items-center gap-2 text-xs text-gray-500">
                                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                                    </svg>
                                                    {{ $contact->created_at->diffForHumans() }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex flex-col gap-2 ml-4">
                                            <a href="{{ route('admin.contacts.show', $contact->id) }}" class="inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                                Voir détails
                                            </a>
                                            @if(!$contact->is_read)
                                                <form action="{{ route('admin.contacts.markAsRead', $contact->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="w-full inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-sipn-orange hover:bg-sipn-orange-dark">
                                                        Marquer lu
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-6">
                            {{ $contacts->links() }}
                        </div>
                    @else
                        <div class="text-center py-12">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">Aucun message</h3>
                            <p class="mt-1 text-sm text-gray-500">Les messages de contact apparaîtront ici.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
