<x-public-layout :title="$service->name">
    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-sipn-blue to-sipn-blue-light text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Breadcrumb -->
            <nav class="mb-8 text-sm">
                <ol class="flex items-center gap-2 text-white/80">
                    <li><a href="{{ route('home') }}" class="hover:text-white">Accueil</a></li>
                    <li>/</li>
                    <li><a href="{{ route('services.index') }}" class="hover:text-white">Services</a></li>
                    <li>/</li>
                    <li class="text-white font-semibold">{{ $service->name }}</li>
                </ol>
            </nav>

            <div class="flex items-center gap-6">
                <!-- Icône -->
                <div class="w-20 h-20 bg-white/20 rounded-2xl flex items-center justify-center flex-shrink-0">
                    <span class="text-5xl">
                        @switch($service->icon)
                            @case('truck') 🚛 @break
                            @case('forklift') 🏗️ @break
                            @case('crane') 🏗️ @break
                            @case('compressor') ⚙️ @break
                            @case('generator') ⚡ @break
                            @case('building') 🏢 @break
                            @case('welding') 🔥 @break
                            @case('construction') 👷 @break
                            @case('spray') 🎨 @break
                            @case('users') 👥 @break
                            @case('industry') 🏭 @break
                            @case('box')
                                <!-- Vente de Grit -->
                                <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <rect x="3" y="6" width="18" height="12" rx="2"/>
                                    <path d="M3 12h18"/>
                                    <path d="M12 6v12"/>
                                    <circle cx="8" cy="9" r="1"/>
                                    <circle cx="16" cy="15" r="1"/>
                                </svg>
                            @break
                            @default 🔧
                        @endswitch
                    </span>
                </div>

                <!-- Titre -->
                <div>
                    <span class="inline-block bg-sipn-orange text-white px-4 py-1 rounded-full text-sm font-semibold mb-3">
                        {{ ucwords(str_replace('-', ' ', $service->category)) }}
                    </span>
                    <h1 class="text-4xl md:text-5xl font-heading font-bold">{{ $service->name }}</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Contenu -->
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                <!-- Contenu principal -->
                <div class="lg:col-span-2">
                    <!-- Description -->
                    <div class="bg-white rounded-xl shadow-md p-8 mb-8">
                        <h2 class="text-2xl font-heading font-bold text-sipn-blue mb-4">Description</h2>
                        <p class="text-gray-700 text-lg leading-relaxed">
                            {{ $service->description }}
                        </p>
                    </div>

                    <!-- Caractéristiques -->
                    @if($service->features)
                        @php
                            $features = is_string($service->features) 
                                ? json_decode($service->features, true) 
                                : $service->features;
                            $currentLocale = app()->getLocale();
                            $featuresList = $features[$currentLocale] ?? $features['fr'] ?? [];
                        @endphp
                        
                        @if(is_array($featuresList) && count($featuresList) > 0)
                            <div class="bg-white rounded-xl shadow-md p-8">
                                <h2 class="text-2xl font-heading font-bold text-sipn-blue mb-6">Caractéristiques</h2>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    @foreach($featuresList as $feature)
                                        <div class="flex items-start">
                                            <svg class="w-6 h-6 text-sipn-orange mr-3 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                            <span class="text-gray-700">{{ $feature }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <!-- CTA Card -->
                    <div class="bg-gradient-to-br from-sipn-orange to-sipn-orange-dark text-white rounded-xl shadow-lg p-8 mb-8 sticky top-24">
                        <h3 class="text-2xl font-bold mb-4">Intéressé ?</h3>
                        <p class="mb-6 text-white/90">
                            Contactez-nous pour plus d'informations ou pour obtenir un devis personnalisé.
                        </p>
                        <div class="space-y-3">
                            <a href="{{ route('quote.create') }}" class="block w-full bg-white text-sipn-orange text-center px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
                                Demander un devis
                            </a>
                            <a href="{{ route('contact.create') }}" class="block w-full bg-sipn-blue text-white text-center px-6 py-3 rounded-lg font-semibold hover:bg-sipn-blue-dark transition">
                                Nous contacter
                            </a>
                        </div>

                        <!-- Contact Info -->
                        <div class="mt-6 pt-6 border-t border-white/20">
                            <p class="text-sm text-white/80 mb-4 flex items-center">
                                <svg class="w-4 h-4 mr-2 text-white/60" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Besoin d'aide ?
                            </p>
                            
                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center mr-3 flex-shrink-0">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                        </svg>
                                    </div>
                                    <a href="tel:+237677373078" class="font-semibold text-white hover:text-white/80 transition-colors">
                                        +237 677 37 30 78
                                    </a>
                                </div>
                                
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center mr-3 flex-shrink-0">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <a href="mailto:sipn20022000@yahoo.fr" class="font-semibold text-white hover:text-white/80 transition-colors">
                                        sipn20022000@yahoo.fr
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services similaires -->
    @if($relatedServices->count() > 0)
        <section class="py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-heading font-bold text-sipn-blue mb-8 text-center">Services similaires</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach($relatedServices as $related)
                        <article class="bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden group">
                            <div class="bg-gradient-to-br from-sipn-blue to-sipn-blue-light p-6 text-center">
                                <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <span class="text-3xl">
                                        @switch($related->icon)
                                            @case('truck') 🚛 @break
                                            @case('forklift') 🏗️ @break
                                            @case('crane') 🏗️ @break
                                            @case('compressor') ⚙️ @break
                                            @case('generator') ⚡ @break
                                            @case('building') 🏢 @break
                                            @case('welding') 🔥 @break
                                            @case('construction') 👷 @break
                                            @case('spray') 🎨 @break
                                            @case('users') 👥 @break
                                            @case('industry') 🏭 @break
                                            @case('box')
                                                <!-- Vente de Grit -->
                                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                    <rect x="3" y="6" width="18" height="12" rx="2"/>
                                                    <path d="M3 12h18"/>
                                                    <path d="M12 6v12"/>
                                                    <circle cx="8" cy="9" r="1"/>
                                                    <circle cx="16" cy="15" r="1"/>
                                                </svg>
                                            @break
                                            @default 🔧
                                        @endswitch
                                    </span>
                                </div>
                                <h3 class="text-xl font-bold text-white">{{ $related->name }}</h3>
                            </div>

                            <div class="p-6">
                                <p class="text-gray-600 mb-4 line-clamp-2">
                                    {{ $related->description }}
                                </p>
                                <a href="{{ route('services.show', $related->slug) }}" 
                                   class="inline-flex items-center text-sipn-orange font-semibold hover:text-sipn-orange-dark transition">
                                    En savoir plus
                                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
</x-public-layout>
