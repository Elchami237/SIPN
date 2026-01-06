<x-public-layout title="Nos Services">
    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-sipn-blue to-sipn-blue-light text-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-heading font-bold mb-6">Nos Services</h1>
            <p class="text-xl text-white/90 max-w-3xl mx-auto">
                Découvrez notre gamme complète de services et équipements pour vos projets
            </p>
        </div>
    </section>

    <!-- Services par catégorie -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @foreach($servicesByCategory as $category => $categoryServices)
                <div class="mb-16">
                    <!-- Titre de catégorie -->
                    <div class="mb-8">
                        <h2 class="text-3xl font-heading font-bold text-sipn-blue mb-2">
                            {{ ucwords(str_replace('-', ' ', $category)) }}
                        </h2>
                        <div class="w-24 h-1 bg-sipn-orange"></div>
                    </div>

                    <!-- Grille de services -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach($categoryServices as $service)
                            <article class="bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden group">
                                <!-- En-tête avec icône -->
                                <div  class="w-full h-48 bg-center "       @switch($service->icon)
                                                @case('truck')
                                                style="background-image: url({{ asset('images/camion.jpg') }});"
                                                 @break
                                                @case('forklift') style="background-image: url({{ asset('images/image_5.jpg') }});" @break
                                                @case('crane') style="background-image: url({{ asset('images/image_5.jpg') }});" @break
                                                @case('compressor') style="background-image: url({{ asset('images/compresseur.webp') }});" @break
                                                @case('generator') style="background-image: url({{ asset('images/image_5.jpg') }});" @break
                                                @case('building') style="background-image: url({{ asset('images/construction.webp') }});" @break
                                                @case('welding') style="background-image: url({{ asset('images/soudure.jpg') }});" @break
                                                @case('construction') style="background-image: url({{ asset('images/gc.webp') }});" @break
                                                @case('spray') style="background-image: url({{ asset('images/traite1.jpg') }});" @break
                                                @case('users') style="background-image: url({{ asset('images/main.jpg') }});" @break
                                                @case('industry') style="background-image: url({{ asset('images/chaudronnerie.jpg') }});" @break
                                                @case('box')
                                                    
                                                    <svg class="w-8 h-8 text-sipn-orange" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                        <rect x="3" y="6" width="18" height="12" rx="2"/>
                                                        <path d="M3 12h18"/>
                                                        <path d="M12 6v12"/>
                                                        <circle cx="8" cy="9" r="1"/>
                                                        <circle cx="16" cy="15" r="1"/>
                                                    </svg>
                                                @break
                                                @default 🔧
                                            @endswitch  class="bg-gradient-to-br from-sipn-blue to-sipn-blue-light p-6 text-center">
                                    
                                    <h3 class="text-xl font-bold text-sipn-blue bg-gray-100/80 p-6  ">{{ $service->name }}</h3>
                                </div>

                                <!-- Contenu -->
                                <div class="p-6">
                                    <p class="text-gray-600 mb-4 ">
                                        {{ $service->description }}
                                    </p>

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
                                            <ul class="space-y-2 mb-6">
                                                @foreach(array_slice($featuresList, 0, 3) as $feature)
                                                    <li class="flex items-start text-sm text-gray-700">
                                                        <svg class="w-5 h-5 text-sipn-orange mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                                        </svg>
                                                        <span>{{ $feature }}</span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    @endif

                                    
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-gradient-to-br from-sipn-blue to-sipn-blue-light text-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-heading font-bold mb-4">Besoin d'un devis ?</h2>
            <p class="text-xl text-white/90 mb-8">
                Contactez-nous pour obtenir un devis personnalisé pour vos besoins
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('quote.create') }}" class="bg-sipn-orange hover:bg-sipn-orange-dark text-white px-8 py-4 rounded-lg font-semibold transition shadow-lg">
                    Demander un devis
                </a>
                <a href="{{ route('contact.create') }}" class="bg-white text-sipn-blue px-8 py-4 rounded-lg font-semibold hover:bg-gray-100 transition shadow-lg">
                    Nous contacter
                </a>
            </div>
        </div>
    </section>
</x-public-layout>
