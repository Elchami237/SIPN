<x-public-layout>
    <!-- Hero Section -->
    
    <section  class="bg-white dark:bg-gray-900 splide__slide__container ">
        <div  class="relative bg-gradient-to-r from-sipn-blue to-sipn-blue-light text-white h-full px-4">
            <div class="max-w-7xl mx-auto py-20">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div>
                        <h1 class="font-heading font-bold text-4xl md:text-5xl lg:text-6xl mb-6 leading-tight">
                            La force de l’expérience, au service de vos ambitions
                        </h1>
                        <p class="text-xl mb-8 text-gray-200">
                            Location d'équipements de chantier, génie civil et construction métallique, chaudronnerie, soudure et traitement de surface pour tous vos projets.
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4">
                            <a href="{{ route('contact.create') }}" class="bg-sipn-orange hover:bg-sipn-orange-dark text-white px-8 py-4 rounded-lg font-semibold transition text-center shadow-lg">
                                Contactez-nous
                            </a>
                            <a href="{{ route('services.index') }}" class="bg-white text-sipn-blue hover:bg-gray-100 px-8 py-4 rounded-lg font-semibold transition text-center shadow-lg">
                                Découvrir nos services
                            </a>
                                

                        </div>
                    </div>
                    <div class="hidden lg:block">
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8 ">
                            
                            <img  class=" h-96 mx-auto rounded-2xl"  src="{{ asset('images/btp.jpg') }} " alt="KYSA BTP">
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>



    <!-- Stats Section -->
    <section class="py-20 px-4 bg-sipn-blue text-white animate-gradient">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 text-center">
                <div class="stats-item animate-on-scroll" 
                     data-stats-counter="35" 
                     data-stats-suffix="+"
                     data-stats-duration="2000">
                    <!-- Icône Expérience -->
                    <div class="w-20 h-20 mx-auto mb-6 bg-sipn-orange/20 rounded-full flex items-center justify-center hover:bg-sipn-orange/30 transition-all duration-300 hover:scale-110">
                        <svg class="w-10 h-10 text-sipn-orange" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.94-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/>
                        </svg>
                    </div>
                    <div class="text-5xl font-heading font-bold text-sipn-orange mb-2 stats-number">
                        <span class="counter-value stats-glow">0+</span>
                    </div>
                    <div class="text-xl text-gray-300">Années d'expérience</div>
                </div>
                
                <div class="stats-item animate-on-scroll" 
                     style="animation-delay: 0.2s"
                     data-stats-counter="126" 
                     data-stats-suffix="+"
                     data-stats-duration="2500">
                    <!-- Icône Projets -->
                    <div class="w-20 h-20 mx-auto mb-6 bg-sipn-orange/20 rounded-full flex items-center justify-center hover:bg-sipn-orange/30 transition-all duration-300 hover:scale-110">
                        <svg class="w-10 h-10 text-sipn-orange" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 3c.55 0 1 .45 1 1v2h2c.55 0 1 .45 1 1s-.45 1-1 1h-2v2c0 .55-.45 1-1 1s-1-.45-1-1v-2H9c-.55 0-1-.45-1-1s.45-1 1-1h2V7c0-.55.45-1 1-1z"/>
                            <path d="M14 2H6c-1.1 0-2 .9-2 2v16c0 1.1.89 2 2 2h12c1.1 0 2-.9 2-2V8l-6-6zm4 18H6V4h7v5h5v11z" opacity="0.7"/>
                        </svg>
                    </div>
                    <div class="text-5xl font-heading font-bold text-sipn-orange mb-2 stats-number">
                        <span class="counter-value stats-glow">0+</span>
                    </div>
                    <div class="text-xl text-gray-300">Projets réalisés</div>
                </div>
                
                <div class="stats-item animate-on-scroll" 
                     style="animation-delay: 0.4s"
                     data-stats-counter="100" 
                     data-stats-suffix="%"
                     data-stats-duration="2200">
                    <!-- Icône Validation -->
                    <div class="w-20 h-20 mx-auto mb-6 bg-sipn-orange/20 rounded-full flex items-center justify-center hover:bg-sipn-orange/30 transition-all duration-300 hover:scale-110">
                        <svg class="w-10 h-10 text-sipn-orange" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                        </svg>
                    </div>
                    <div class="text-5xl font-heading font-bold text-sipn-orange mb-2 stats-number">
                        <span class="counter-value stats-glow">0%</span>
                    </div>
                    <div class="text-xl text-gray-300">Clients satisfaits</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-20 px-4 bg-gray-50">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12 animate-on-scroll">
                <h2 class="font-heading font-bold text-3xl md:text-4xl text-sipn-blue mb-4">Nos domaines de compétences</h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                    Solutions complètes pour tous vos projets
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($featuredServices as $service)
                    <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition p-6 group animate-on-scroll hover-lift" style="animation-delay: {{ $loop->index * 0.1 }}s">
                        <div class="w-16 h-16 bg-sipn-orange/10 rounded-lg flex items-center justify-center mb-4 group-hover:bg-sipn-orange/20 transition group-hover:scale-110 duration-300">
                            @switch($service->icon)
                                @case('truck')
                                    <!-- Location de Matériels Roulants -->
                                    <svg class="w-10 h-10 text-sipn-orange" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path d="M3 17h2c0 1.66 1.34 3 3 3s3-1.34 3-3h6c0 1.66 1.34 3 3 3s3-1.34 3-3h2v-5l-3-4h-3V4H3v13z"/>
                                        <circle cx="8" cy="17" r="2"/>
                                        <circle cx="18" cy="17" r="2"/>
                                        <path d="M15 8h4l2 3v3"/>
                                    </svg>
                                @break
                                @case('forklift')
                                    <!-- Location de Matériels de Chantier -->
                                    <svg class="w-10 h-10 text-sipn-orange" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <rect x="3" y="6" width="16" height="10" rx="2"/>
                                        <rect x="7" y="17" width="8" height="3" rx="1"/>
                                        <circle cx="9" cy="10" r="1"/>
                                        <circle cx="15" cy="10" r="1"/>
                                        <path d="M8 14h8"/>
                                        <path d="M3 8h2M17 8h2"/>
                                    </svg>
                                @break
                                @case('crane')
                                    <!-- Grue et équipements lourds -->
                                    <svg class="w-10 h-10 text-sipn-orange" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path d="M3 21h18"/>
                                        <path d="M5 21V7l6-4 6 4v14"/>
                                        <path d="M9 9h6"/>
                                        <path d="M9 12h6"/>
                                        <path d="M9 15h6"/>
                                        <path d="M9 18h6"/>
                                    </svg>
                                @break
                                @case('compressor')
                                    <!-- Compresseurs d'air -->
                                    <svg class="w-10 h-10 text-sipn-orange" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <rect x="4" y="6" width="16" height="10" rx="2"/>
                                        <rect x="8" y="17" width="8" height="3" rx="1"/>
                                        <circle cx="10" cy="11" r="2"/>
                                        <circle cx="14" cy="11" r="1"/>
                                        <path d="M4 8h2M18 8h2"/>
                                        <path d="M4 10h2M18 10h2"/>
                                    </svg>
                                @break
                                @case('generator')
                                    <!-- Générateurs -->
                                    <svg class="w-10 h-10 text-sipn-orange" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <rect x="4" y="4" width="16" height="12" rx="2"/>
                                        <rect x="7" y="17" width="10" height="3" rx="1"/>
                                        <circle cx="12" cy="10" r="3"/>
                                        <path d="M12 7v6"/>
                                        <path d="M9 10h6"/>
                                        <path d="M6 6h2M16 6h2"/>
                                    </svg>
                                @break
                                @case('building')
                                    <!-- Construction Métallique -->
                                    <svg class="w-10 h-10 text-sipn-orange" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path d="M3 21h18"/>
                                        <path d="M6 21V9"/>
                                        <path d="M10 21V9"/>
                                        <path d="M14 21V9"/>
                                        <path d="M18 21V9"/>
                                        <path d="M4 9h16"/>
                                        <path d="M4 13h16"/>
                                        <circle cx="8" cy="6" r="1"/>
                                        <path d="M8 7v2"/>
                                    </svg>
                                @break
                                @case('welding')
                                    <!-- Soudure Industrielle -->
                                    <svg class="w-10 h-10 text-sipn-orange" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path d="M3 21h18"/>
                                        <path d="M6 21V9l6-6 6 6v12"/>
                                        <path d="M9 12h6"/>
                                        <path d="M12 9v6"/>
                                        <circle cx="8" cy="15" r="1"/>
                                        <circle cx="16" cy="15" r="1"/>
                                        <path d="M10 18h4"/>
                                    </svg>
                                @break
                                @case('construction')
                                    <!-- Génie Civil et Travaux Publics -->
                                    <svg class="w-10 h-10 text-sipn-orange" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path d="M2 20h20"/>
                                        <path d="M4 20V8l8-6 8 6v12"/>
                                        <rect x="9" y="13" width="6" height="7"/>
                                        <path d="M9 9h6"/>
                                        <circle cx="12" cy="6" r="1"/>
                                        <path d="M16 10h2M6 10h2"/>
                                    </svg>
                                @break
                                @case('spray')
                                    <!-- Traitement de Surface -->
                                    <svg class="w-10 h-10 text-sipn-orange" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path d="M3 12h7l3-3 3 3h5"/>
                                        <circle cx="18" cy="8" r="2"/>
                                        <path d="M18 10v8"/>
                                        <circle cx="6" cy="16" r="1"/>
                                        <circle cx="10" cy="16" r="1"/>
                                        <circle cx="14" cy="16" r="1"/>
                                        <path d="M16 6l2 2"/>
                                    </svg>
                                @break
                                @case('users')
                                    <!-- Équipe/Personnel -->
                                    <svg class="w-10 h-10 text-sipn-orange" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                                        <circle cx="12" cy="7" r="4"/>
                                        <circle cx="12" cy="17" r="2"/>
                                        <path d="M8 21h8"/>
                                    </svg>
                                @break
                                @case('industry')
                                    <!-- Industrie -->
                                    <svg class="w-10 h-10 text-sipn-orange" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path d="M2 20h20"/>
                                        <path d="M7 20V10l5-5 5 5v10"/>
                                        <rect x="9" y="13" width="6" height="7"/>
                                        <path d="M9 9h6"/>
                                        <circle cx="12" cy="6" r="1"/>
                                    </svg>
                                @break
                                @case('box')
                                    <!-- Stockage/Logistique -->
                                    <svg class="w-10 h-10 text-sipn-orange" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <rect x="3" y="6" width="18" height="12" rx="2"/>
                                        <path d="M3 12h18"/>
                                        <path d="M12 6v12"/>
                                        <circle cx="8" cy="9" r="1"/>
                                        <circle cx="16" cy="15" r="1"/>
                                    </svg>
                                @break
                                @default
                                    <!-- Icône par défaut -->
                                    <svg class="w-10 h-10 text-sipn-orange" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                    </svg>
                            @endswitch
                        </div>
                        <h3 class="text-xl font-bold text-sipn-blue mb-2">{{ $service->name }}</h3>
                        <p class="text-gray-600 mb-4 line-clamp-2">{{ $service->description }}</p>
                        
                    </div>
                @endforeach
            </div>

            <!-- Bouton voir tous les services -->
            <div class="text-center mt-12 animate-on-scroll">
                <a href="{{ route('services.index') }}" class="inline-block bg-sipn-orange hover:bg-sipn-orange-dark text-white px-8 py-4 rounded-lg font-semibold transition shadow-lg hover-scale">
                    Voir tous nos services
                </a>
            </div>
        </div>
    </section>

    <!-- Section Nos Atouts -->
    <section class="py-20 px-4 bg-white">
        <div class="max-w-7xl mx-auto">
            <!-- En-tête de section -->
            <div class="text-center mb-16 animate-on-scroll">
                <span class="inline-block bg-sipn-orange/10 text-sipn-orange px-6 py-2 rounded-full text-sm font-semibold mb-4">
                    Nos Forces
                </span>
                <h2 class="font-heading font-bold text-3xl md:text-4xl text-sipn-blue mb-6">
                    Nos Atouts
                </h2>
                <p class="text-gray-600 text-lg max-w-3xl mx-auto">
                    Découvrez les atouts qui font de SIPN votre partenaire de confiance pour tous vos projets BTP
                </p>
            </div>

            <!-- Grille des atouts -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Atout 1: Site de transformation -->
                <div class="bg-gradient-to-br from-sipn-blue/5 to-sipn-blue/10 rounded-2xl p-8 hover:shadow-xl transition-all duration-500 hover:-translate-y-2 animate-on-scroll group">
                    <div class="w-16 h-16 bg-gradient-to-br from-sipn-blue to-sipn-blue-light rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-500">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M3 21h18M3 7v1a3 3 0 003 3h12a3 3 0 003-3V7M3 7a2 2 0 012-2h14a2 2 0 012 2M3 7h18M5 21V10h3v11M12 21V10h3v11M19 21V10h-3v11"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-sipn-blue mb-4">Notre Site de Transformation</h3>
                    <div class="space-y-3 text-gray-700 text-sm leading-relaxed">
                        <p class="font-semibold text-sipn-orange">8500 m² de surface répartie sur 03 sites couverts incluant :</p>
                        <ul class="space-y-2 ml-4">
                            <li class="flex items-start">
                                <span class="text-sipn-orange mr-2">•</span>
                                <span>02 ateliers de construction mécanique, chaudronnerie & tuyauterie industrielle ; dont un équipé d'un pont roulant de capacité 05 tonnes</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-sipn-orange mr-2">•</span>
                                <span>01 aire de sablage & application peinture</span>
                            </li>
                        </ul>
                        <p class="text-sipn-blue font-medium mt-4">
                            Ce qui nous permet de façonner des ouvrages aux envergures les plus ambitieuses.
                        </p>
                    </div>
                </div>

                <!-- Atout 2: Équipements -->
                <div class="bg-gradient-to-br from-sipn-orange/5 to-sipn-orange/10 rounded-2xl p-8 hover:shadow-xl transition-all duration-500 hover:-translate-y-2 animate-on-scroll animation-delay-200 group">
                    <div class="w-16 h-16 bg-gradient-to-br from-sipn-orange to-sipn-orange-dark rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-500">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M3 17h2c0 1.66 1.34 3 3 3s3-1.34 3-3h6c0 1.66 1.34 3 3 3s3-1.34 3-3h2v-5l-3-4h-3V4H3v13z"/>
                            <circle cx="8" cy="17" r="2"/>
                            <circle cx="18" cy="17" r="2"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-sipn-blue mb-4">Nos Équipements</h3>
                    <div class="space-y-3 text-gray-700 text-sm leading-relaxed">
                        <p>
                            Équipements <strong class="text-sipn-orange">fixes et mobiles</strong> pour satisfaire aussi bien les travaux d'atelier que les réalisations in situ.
                        </p>
                        <div class="bg-white/50 rounded-lg p-4 mt-4">
                            <div class="flex items-center space-x-2 text-sipn-blue font-semibold">
                                <svg class="w-5 h-5 text-sipn-orange" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>Polyvalence maximale</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Atout 3: Moyens logistiques -->
                <div class="bg-gradient-to-br from-green-500/5 to-green-500/10 rounded-2xl p-8 hover:shadow-xl transition-all duration-500 hover:-translate-y-2 animate-on-scroll animation-delay-400 group">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-500">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20 8h-3V4H3c-1.1 0-2 .9-2 2v11h2c0 1.66 1.34 3 3 3s3-1.34 3-3h6c0 1.66 1.34 3 3 3s3-1.34 3-3h2v-5l-3-4zM6 18.5c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zm13.5-9l1.96 2.5H17V9.5h2.5zm-1.5 9c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-sipn-blue mb-4">Nos Moyens Logistiques</h3>
                    <div class="space-y-3 text-gray-700 text-sm leading-relaxed">
                        <p class="font-semibold text-green-600">Transport & Manutention</p>
                        <p>
                            Pour une <strong class="text-sipn-blue">totale autonomie</strong> dans l'exécution de nos prestations ce qui nous confère :
                        </p>
                        <div class="space-y-2 mt-4">
                            <div class="flex items-center space-x-2">
                                <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                <span class="text-sipn-blue font-medium">Maîtrise des délais</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                <span class="text-sipn-blue font-medium">Flexibilité des coûts</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Atout 4: Expérience -->
                <div class="bg-gradient-to-br from-purple-500/5 to-purple-500/10 rounded-2xl p-8 hover:shadow-xl transition-all duration-500 hover:-translate-y-2 animate-on-scroll animation-delay-600 group">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-500">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.94-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-sipn-blue mb-4">Nos Expériences</h3>
                    <div class="space-y-3 text-gray-700 text-sm leading-relaxed">
                        <p>
                            Plus de <strong class="text-sipn-orange">35 années d'expertise</strong> dans le secteur du BTP et de la construction métallique au Cameroun.
                        </p>
                        <div class="bg-white/50 rounded-lg p-4 mt-4">
                            <div class="text-center">
                                <div class="text-3xl font-bold text-purple-600 mb-1">120+</div>
                                <div class="text-sm text-gray-600">Projets réalisés avec succès</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Atout 5: Politique HSSE -->
                <div class="bg-gradient-to-br from-red-500/5 to-red-500/10 rounded-2xl p-8 hover:shadow-xl transition-all duration-500 hover:-translate-y-2 animate-on-scroll animation-delay-800 group md:col-span-2 lg:col-span-1">
                    <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-red-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-500">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-sipn-blue mb-4">Notre Politique HSSE</h3>
                    <div class="space-y-3 text-gray-700 text-sm leading-relaxed">
                        <p>
                            Notre engagement à nous approprier et nous conformer aux <strong class="text-red-600">exigences HSSE</strong> de nos clients en matière de sécurité (procédure HSE, PTW, ...).
                        </p>
                        <p class="text-sipn-blue font-medium">
                            Nous permet de nous améliorer continuellement et de maintenir leurs performances ainsi que les nôtres à leur meilleur niveau.
                        </p>
                        <div class="bg-white/50 rounded-lg p-4 mt-4">
                            <div class="flex items-center justify-center space-x-2 text-red-600 font-bold">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>ZÉRO ACCIDENT</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Résumé des atouts -->
            <div class="mt-16 bg-gradient-to-r from-sipn-blue to-sipn-orange text-white rounded-2xl p-12 shadow-2xl animate-on-scroll animation-delay-1000">
                <div class="text-center">
                    <h3 class="text-3xl font-bold mb-6">Pourquoi Choisir SIPN ?</h3>
                    <p class="text-xl leading-relaxed max-w-4xl mx-auto mb-8">
                        Nos atouts combinés font de SIPN le partenaire idéal pour vos projets les plus ambitieux. 
                        De l'infrastructure moderne à l'expertise éprouvée, nous mettons tout en œuvre pour garantir votre succès.
                    </p>
                    <div class="flex flex-wrap justify-center gap-4">
                        <div class="bg-white/20 backdrop-blur-sm rounded-full px-6 py-3 text-sm font-semibold">
                            Infrastructure Moderne
                        </div>
                        <div class="bg-white/20 backdrop-blur-sm rounded-full px-6 py-3 text-sm font-semibold">
                            Logistique Autonome
                        </div>
                        <div class="bg-white/20 backdrop-blur-sm rounded-full px-6 py-3 text-sm font-semibold">
                            Sécurité Maximale
                        </div>
                        <div class="bg-white/20 backdrop-blur-sm rounded-full px-6 py-3 text-sm font-semibold">
                            35+ Ans d'Expérience
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Actualités Section -->
    @if($actualitesRecentes->count() > 0)
    <section class="py-20 px-4">
        <div class="max-w-7xl mx-auto">
            <div class="flex justify-between items-baseline mb-12 animate-on-scroll">
                <h2 class="font-heading font-bold text-3xl md:text-4xl text-sipn-blue">Dernières Actualités</h2>
                <a href="{{ route('actualites.index') }}" class="text-sipn-orange font-semibold hover:text-sipn-orange-dark smooth-transition">
                    Voir toutes les actualités →
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($actualitesRecentes as $actualite)
                    <article class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition animate-on-scroll hover-lift" style="animation-delay: {{ $loop->index * 0.15 }}s">
                        @if($actualite->image_affiche_url)
                            <img src="{{ $actualite->image_affiche_url }}" alt="{{ $actualite->titre }}" class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gradient-to-br from-sipn-blue to-sipn-blue-light flex items-center justify-center">
                                <svg class="w-16 h-16 text-white opacity-50" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                        @endif
                        <div class="p-6">
                            <div class="flex items-center gap-2 text-sm text-gray-500 mb-2">
                                @if($actualite->category)
                                    <span class="bg-sipn-orange/10 text-sipn-orange px-3 py-1 rounded-full">
                                        {{ $actualite->category->name }}
                                    </span>
                                @endif
                                <span>{{ $actualite->date_publication_formatee }}</span>
                            </div>
                            <h3 class="text-xl font-bold text-sipn-blue mb-2 line-clamp-2">
                                {{ $actualite->titre }}
                            </h3>
                            <p class="text-gray-600 mb-4 line-clamp-3">
                                {{ $actualite->resume_court }}
                            </p>
                            <a href="{{ $actualite->url }}" class="text-sipn-orange font-semibold hover:text-sipn-orange-dark">
                                Lire la suite →
                            </a>
                        </div>
                    </article>  
                @endforeach
            </div>
        </div>
    </section>
    @endif

    

    





    <!-- CTA Section -->
    <section class="py-20 px-4 bg-gradient-to-r from-sipn-orange to-sipn-orange-light text-white animate-gradient">
        <div class="max-w-4xl mx-auto text-center animate-on-scroll">
            <h2 class="font-heading font-bold text-3xl md:text-4xl mb-6">
                Prêt à démarrer votre projet ?
            </h2>
            <p class="text-xl mb-8">
                Obtenez un devis gratuit et personnalisé pour vos besoins de construction et de location d'équipements.
            </p>
            <a href="{{ route('quote.create') }}" class="inline-block bg-white text-sipn-orange px-8 py-4 rounded-lg font-semibold hover:bg-gray-100 transition shadow-lg hover-scale">
                Demander votre devis gratuit
            </a>
        </div>
    </section>


    <!-- section partenaire -->
    <section class="bg-white py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <h2 class="text-center text-2xl md:text-3xl font-bold text-gray-900 mb-12">Ils nous ont déjà faire confiance</h2>
            
            <!-- Carrousel de partenaires avec effet de glissement -->
            <div class="partners-carousel-wrapper relative overflow-hidden">
                <div class="partners-carousel-track flex transition-transform duration-700 ease-in-out" id="partners-track">
                    <!-- Slide 1 - 4 logos -->
                    <div class="partners-slide flex-shrink-0 w-full">
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 items-center justify-items-center px-4">
                            <div class="flex items-center justify-center h-24 w-full">
                                <img src="{{ asset('images/partenaire/perenco.png')}}" alt="Perenco" class="max-h-20 w-auto object-contain partner-logo" />
                            </div>
                            <div class="flex items-center justify-center h-24 w-full">
                                <img src="{{ asset('images/partenaire/sonara.jpg')}}" alt="Sonara" class="max-h-20 w-auto object-contain partner-logo" />
                            </div>
                            <div class="flex items-center justify-center h-24 w-full">
                                <img src="{{ asset('images/partenaire/total.svg')}}" alt="Total" class="max-h-20 w-auto object-contain partner-logo" />
                            </div>
                            <div class="flex items-center justify-center h-24 w-full">
                                <img src="{{ asset('images/partenaire/addax.jpg')}}" alt="Addax" class="max-h-20 w-auto object-contain partner-logo" />
                            </div>
                        </div>
                    </div>
                    
                    <!-- Slide 2 - 4 logos -->
                    <div class="partners-slide flex-shrink-0 w-full">
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 items-center justify-items-center px-4">
                            <div class="flex items-center justify-center h-24 w-full">
                                <img src="{{ asset('images/partenaire/camrail.png')}}" alt="Camrail" class="max-h-20 w-auto object-contain partner-logo" />
                            </div>
                            <div class="flex items-center justify-center h-24 w-full">
                                <img src="{{ asset('images/partenaire/baker.jpg')}}" alt="Baker" class="max-h-20 w-auto object-contain partner-logo" />
                            </div>
                            <div class="flex items-center justify-center h-24 w-full">
                                <img src="{{ asset('images/partenaire/bollore.gif')}}" alt="Bolloré" class="max-h-20 w-auto object-contain partner-logo" />
                            </div>
                            <div class="flex items-center justify-center h-24 w-full">
                                <img src="{{ asset('images/partenaire/cimencam.png')}}" alt="Cimencam" class="max-h-20 w-auto object-contain partner-logo" />
                            </div>
                        </div>
                    </div>
                    
                    <!-- Slide 3 - 4 logos -->
                    <div class="partners-slide flex-shrink-0 w-full">
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 items-center justify-items-center px-4">
                            <div class="flex items-center justify-center h-24 w-full">
                                <img src="{{ asset('images/partenaire/dhl.png')}}" alt="DHL" class="max-h-20 w-auto object-contain partner-logo" />
                            </div>
                            <div class="flex items-center justify-center h-24 w-full">
                                <img src="{{ asset('images/partenaire/la-pasta.png')}}" alt="La Pasta" class="max-h-20 w-auto object-contain partner-logo" />
                            </div>
                            <div class="flex items-center justify-center h-24 w-full">
                                <img src="{{ asset('images/partenaire/olam.png')}}" alt="Olam" class="max-h-20 w-auto object-contain partner-logo" />
                            </div>
                            <div class="flex items-center justify-center h-24 w-full">
                                <img src="{{ asset('images/partenaire/petrofor.jpg')}}" alt="Petrofor" class="max-h-20 w-auto object-contain partner-logo" />
                            </div>
                        </div>
                    </div>
                    
                    <!-- Slide 4 - 2 logos (derniers) -->
                    <div class="partners-slide flex-shrink-0 w-full">
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 items-center justify-items-center px-4">
                            <div class="flex items-center justify-center h-24 w-full md:col-start-2">
                                <img src="{{ asset('images/partenaire/sogea.png')}}" alt="Sogea" class="max-h-20 w-auto object-contain partner-logo" />
                            </div>
                            <div class="flex items-center justify-center h-24 w-full">
                                <img src="{{ asset('images/partenaire/TPF.jpg')}}" alt="TPF" class="max-h-20 w-auto object-contain partner-logo" />
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Indicateurs de pagination -->
                <div class="partners-pagination flex justify-center gap-2 mt-8">
                    <button class="pagination-dot active" data-slide="0"></button>
                    <button class="pagination-dot" data-slide="1"></button>
                    <button class="pagination-dot" data-slide="2"></button>
                    <button class="pagination-dot" data-slide="3"></button>
                </div>
            </div>
        </div>
    </section>

    <!-- Script pour le carrousel des partenaires avec effet de glissement -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const track = document.getElementById('partners-track');
            const slides = document.querySelectorAll('.partners-slide');
            const dots = document.querySelectorAll('.pagination-dot');
            let currentSlide = 0;
            let autoplayInterval;

            function showSlide(index, instant = false) {
                // Calculer le décalage
                const offset = -index * 100;
                
                // Appliquer la transformation avec ou sans transition
                if (instant) {
                    track.style.transition = 'none';
                } else {
                    track.style.transition = 'transform 0.7s ease-in-out';
                }
                
                track.style.transform = `translateX(${offset}%)`;

                // Mettre à jour les dots
                dots.forEach(dot => dot.classList.remove('active'));
                dots[index].classList.add('active');

                currentSlide = index;
            }

            function nextSlide() {
                let next = (currentSlide + 1) % slides.length;
                showSlide(next);
            }

            function startAutoplay() {
                autoplayInterval = setInterval(nextSlide, 3000);
            }

            function stopAutoplay() {
                clearInterval(autoplayInterval);
            }

            // Gestion des clics sur les dots
            dots.forEach((dot, index) => {
                dot.addEventListener('click', () => {
                    stopAutoplay();
                    showSlide(index);
                    startAutoplay();
                });
            });

            // Pause au survol
            track.addEventListener('mouseenter', stopAutoplay);
            track.addEventListener('mouseleave', startAutoplay);

            // Démarrer l'autoplay
            startAutoplay();
        });
    </script>

    <style>
        /* Styles pour le carrousel des partenaires avec glissement */
        .partners-carousel-wrapper {
            position: relative;
            min-height: 200px;
            overflow: hidden;
        }

        .partners-carousel-track {
            display: flex;
            transition: transform 0.7s ease-in-out;
        }

        .partners-slide {
            flex-shrink: 0;
            width: 100%;
        }

        /* Styles des logos */
        .partner-logo {
            filter: grayscale(100%);
            opacity: 0.7;
            transition: all 0.3s ease;
        }

        .partner-logo:hover {
            filter: grayscale(0%);
            opacity: 1;
            transform: scale(1.1);
        }

        /* Styles de la pagination */
        .partners-pagination {
            margin-top: 2rem;
        }

        .pagination-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #cbd5e0;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            padding: 0;
        }

        .pagination-dot:hover {
            background: #94a3b8;
            transform: scale(1.2);
        }

        .pagination-dot.active {
            background: #f97316;
            transform: scale(1.3);
        }
    </style>
</x-public-layout>
