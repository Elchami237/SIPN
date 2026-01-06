<x-public-layout>
    <div class="bg-gray-50 py-12 px-4">
        <div class="max-w-4xl mx-auto">
            <!-- Header -->
            <div class="text-center mb-12">
                <h1 class="font-heading font-bold text-4xl md:text-5xl text-sipn-blue mb-4">
                    Demande de Devis
                </h1>
                <p class="text-xl text-gray-600">
                    Remplissez ce formulaire pour recevoir votre devis personnalisé gratuitement
                </p>
            </div>

            <!-- Success Message -->
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded-lg mb-8" role="alert">
                    <p class="font-semibold">✓ {{ session('success') }}</p>
                </div>
            @endif

            <!-- Form -->
            <div class="bg-white rounded-xl shadow-lg p-8 md:p-12">
                <form action="{{ route('quote.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Personal Information -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                                Nom complet <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="text" 
                                id="name" 
                                name="name" 
                                value="{{ old('name') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sipn-orange focus:border-transparent @error('name') border-red-500 @enderror"
                                required
                            >
                            @error('name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                                Email <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="email" 
                                id="email" 
                                name="email" 
                                value="{{ old('email') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sipn-orange focus:border-transparent @error('email') border-red-500 @enderror"
                                required
                            >
                            @error('email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">
                                Téléphone <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="tel" 
                                id="phone" 
                                name="phone" 
                                value="{{ old('phone') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sipn-orange focus:border-transparent @error('phone') border-red-500 @enderror"
                                required
                            >
                            @error('phone')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="company" class="block text-sm font-semibold text-gray-700 mb-2">
                                Entreprise
                            </label>
                            <input 
                                type="text" 
                                id="company" 
                                name="company" 
                                value="{{ old('company') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sipn-orange focus:border-transparent @error('company') border-red-500 @enderror"
                            >
                            @error('company')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Service Type -->
                    <div>
                        <label for="service_type" class="block text-sm font-semibold text-gray-700 mb-2">
                            Type de service <span class="text-red-500">*</span>
                        </label>
                        <select 
                            id="service_type" 
                            name="service_type"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sipn-orange focus:border-transparent @error('service_type') border-red-500 @enderror"
                            required
                        >
                            <option value="">Sélectionnez un service</option>
                            <option value="location" {{ old('service_type') == 'location' ? 'selected' : '' }}>Location de matériels</option>
                            <option value="genie_civil" {{ old('service_type') == 'genie_civil' ? 'selected' : '' }}>Génie civil</option>
                            <option value="construction" {{ old('service_type') == 'construction' ? 'selected' : '' }}>Construction métallique</option>
                            <option value="tp" {{ old('service_type') == 'tp' ? 'selected' : '' }}>Travaux TP</option>
                        </select>
                        @error('service_type')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Dates -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="start_date" class="block text-sm font-semibold text-gray-700 mb-2">
                                Date de début souhaitée
                            </label>
                            <input 
                                type="date" 
                                id="start_date" 
                                name="start_date" 
                                value="{{ old('start_date') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sipn-orange focus:border-transparent @error('start_date') border-red-500 @enderror"
                            >
                            @error('start_date')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="end_date" class="block text-sm font-semibold text-gray-700 mb-2">
                                Date de fin estimée
                            </label>
                            <input 
                                type="date" 
                                id="end_date" 
                                name="end_date" 
                                value="{{ old('end_date') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sipn-orange focus:border-transparent @error('end_date') border-red-500 @enderror"
                            >
                            @error('end_date')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">
                            Description du projet <span class="text-red-500">*</span>
                        </label>
                        <textarea 
                            id="description" 
                            name="description" 
                            rows="6"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sipn-orange focus:border-transparent @error('description') border-red-500 @enderror"
                            required
                            placeholder="Décrivez votre projet en détail..."
                        >{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Budget Range -->
                    <div>
                        <label for="budget_range" class="block text-sm font-semibold text-gray-700 mb-2">
                            Gamme de budget (optionnel)
                        </label>
                        <input 
                            type="text" 
                            id="budget_range" 
                            name="budget_range" 
                            value="{{ old('budget_range') }}"
                            placeholder="Ex: 5M - 10M FCFA"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sipn-orange focus:border-transparent @error('budget_range') border-red-500 @enderror"
                        >
                        @error('budget_range')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-6">
                        <button 
                            type="submit"
                            class="bg-sipn-orange hover:bg-sipn-orange-dark text-white px-8 py-4 rounded-lg font-semibold transition shadow-lg"
                        >
                            Envoyer ma demande de devis
                        </button>
                        <a 
                            href="{{ route('home') }}"
                            class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-8 py-4 rounded-lg font-semibold transition text-center"
                        >
                            Annuler
                        </a>
                    </div>
                </form>
            </div>

            <!-- Info Section -->
            <div class="mt-12 bg-sipn-blue/5 rounded-xl p-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-12 h-12 bg-sipn-orange rounded-lg flex items-center justify-center text-white mr-4">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-sipn-blue mb-1">Réponse rapide</h3>
                            <p class="text-sm text-gray-600">Nous vous répondons sous 24h</p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-12 h-12 bg-sipn-orange rounded-lg flex items-center justify-center text-white mr-4">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                                <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-sipn-blue mb-1">Devis gratuit</h3>
                            <p class="text-sm text-gray-600">Sans engagement de votre part</p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-12 h-12 bg-sipn-orange rounded-lg flex items-center justify-center text-white mr-4">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-sipn-blue mb-1">Experts certifiés</h3>
                            <p class="text-sm text-gray-600">15+ ans d'expérience</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-public-layout>
