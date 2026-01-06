<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'SIPN Services & Rentals' }}</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Article Content Styles -->
    <link rel="stylesheet" href="{{ asset('css/article-content.css') }}">
    
    <!-- Animations -->
    <link rel="stylesheet" href="{{ asset('css/animations.css') }}">
    <script src="{{ asset('js/animations.js') }}" defer></script>
</head>
<body class="font-sans antialiased">
    <!-- Header -->
    <header x-data="{ mobileMenuOpen: false, servicesOpen: false }" 
        class="sticky top-0 z-50 bg-white border-b border-gray-200 shadow-sm"
        @mouseleave="servicesOpen = false">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="{{ route('home') }}" class="flex items-center group">
                        <img src="{{ asset('images/logo-sipn.jpg') }}" alt="S.I.P.N. Services & Rentals" class="h-12 w-auto transition-transform group-hover:scale-105">
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <nav  class="hidden md:flex items-center space-x-1 " >
                    <a href="{{ route('home') }}" class="inline-flex items-center px-3 py-2 text-sm font-semibold text-gray-700 hover:text-sipn-orange hover:bg-gray-50 rounded-lg transition">
                        <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                        </svg>
                        {{ __('Home') }}
                    </a>
                    
                    

                    <a href="{{ route('services.index') }}" class="inline-flex items-center px-3 py-2 text-sm font-semibold text-gray-700 hover:text-sipn-orange hover:bg-gray-50 rounded-lg transition">
                        <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Services
                    </a>

                    <a href="{{ route('actualites.index') }}" class="inline-flex items-center px-3 py-2 text-sm font-semibold text-gray-700 hover:text-sipn-orange hover:bg-gray-50 rounded-lg transition">
                        <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd"/>
                            <path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z"/>
                        </svg>
                        Actualités
                    </a>

                    <a href="{{ route('about') }}" class="inline-flex items-center px-3 py-2 text-sm font-semibold text-gray-700 hover:text-sipn-orange hover:bg-gray-50 rounded-lg transition">
                        <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                        </svg>
                        À propos
                    </a>




                    
                    <a href="{{ route('contact.create') }}" class="inline-flex items-center px-3 py-2 text-sm font-semibold text-gray-700 hover:text-sipn-orange hover:bg-gray-50 rounded-lg transition">
                        <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                        </svg>
                        {{ __('Contact') }}
                    </a>
                </nav>

                <!-- Language Switcher & CTA Button -->
                <div class="hidden md:flex items-center space-x-3">
                    <!-- Language Switcher -->
                    

                    @auth
                        <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center px-3 py-2 text-sm font-semibold text-sipn-blue hover:text-sipn-orange transition">
                            <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"/>
                            </svg>
                            Admin
                        </a>
                    @endauth
                    <a href="{{ route('contact.create') }}" class="inline-flex items-center px-4 py-2 bg-sipn-orange text-white text-sm font-semibold rounded-lg hover:bg-sipn-orange-dark transition shadow-sm">
                        
                        Nous contacter
                    </a>
                    
                </div>

                <!-- Mobile Menu Toggle -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden p-2 rounded-lg text-gray-700 hover:bg-gray-100 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        <path x-show="mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div x-show="mobileMenuOpen" x-cloak class="md:hidden py-4 border-t border-gray-200">
                <div class="space-y-1">
                    <a href="{{ route('home') }}" class="flex items-center px-3 py-2 text-gray-700 hover:bg-gray-50 hover:text-sipn-orange rounded-lg transition">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                        </svg>
                        Accueil
                    </a>
                    <a href="{{ route('services.index') }}" class="flex items-center px-3 py-2 text-gray-700 hover:bg-gray-50 hover:text-sipn-orange rounded-lg transition">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z" clip-rule="evenodd"/>
                        </svg>
                        Services
                    </a>
                    <a href="{{ route('actualites.index') }}" class="flex items-center px-3 py-2 text-gray-700 hover:bg-gray-50 hover:text-sipn-orange rounded-lg transition">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd"/>
                            <path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z"/>
                        </svg>
                        Actualités
                    </a>

                    <a href="{{ route('about') }}" class="flex items-center px-3 py-2 text-gray-700 hover:bg-gray-50 hover:text-sipn-orange rounded-lg transition">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                        </svg>
                        À propos
                    </a>


                    <a href="{{ route('contact.create') }}" class="flex items-center px-3 py-2 text-gray-700 hover:bg-gray-50 hover:text-sipn-orange rounded-lg transition">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                        </svg>
                        Contact
                    </a>
                    
                    <!-- Language Switcher Mobile -->
                    <div class="border-t border-gray-200 mt-3 pt-3">
                        <div class="px-3 py-2 text-xs font-semibold text-gray-500 uppercase">Langue / Language</div>
                        <a href="{{ route('language.switch', 'fr') }}" class="flex items-center px-3 py-2 {{ app()->getLocale() == 'fr' ? 'text-sipn-orange bg-sipn-orange/10 font-semibold' : 'text-gray-700 hover:bg-gray-50' }} rounded-lg transition">
                            <span class="mr-2">🇫🇷</span>
                            Français
                            @if(app()->getLocale() == 'fr')
                                <svg class="ml-auto w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                            @endif
                        </a>
                        <a href="{{ route('language.switch', 'en') }}" class="flex items-center px-3 py-2 {{ app()->getLocale() == 'en' ? 'text-sipn-orange bg-sipn-orange/10 font-semibold' : 'text-gray-700 hover:bg-gray-50' }} rounded-lg transition">
                            <span class="mr-2">🇬🇧</span>
                            English
                            @if(app()->getLocale() == 'en')
                                <svg class="ml-auto w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                            @endif
                        </a>
                    </div>

                    @auth
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center px-3 py-2 text-sipn-blue hover:bg-gray-50 rounded-lg transition font-semibold">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"/>
                            </svg>
                            Admin
                        </a>
                    @endauth
                    <a href="{{ route('quote.create') }}" class="flex items-center justify-center mt-3 px-4 py-3 bg-sipn-orange text-white rounded-lg font-semibold hover:bg-sipn-orange-dark transition">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                            <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                        </svg>
                        Demander un devis
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-sipn-blue text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- About -->
                <div>
                    <h3 class="text-lg font-heading font-bold mb-4">SIPN Services & Rentals</h3>
                    <p class="text-gray-300 text-sm">
                        Location d'équipements de chantier, génie civil et construction métallique, chaudronnerie, soudure et traitement de surface pour tous vos projets.
                    </p>
                </div>

                <!-- Services -->
                <div>
                    <h3 class="text-lg font-heading font-bold mb-4">Services</h3>
                    <ul class="space-y-2 text-sm">
                        @if(isset($footerServices) && $footerServices->count() > 0)
                            
                            <li>
                                <a href="{{ route('services.index') }}" class="text-sipn-orange hover:text-sipn-orange-light transition font-semibold">
                                    Voir tous les services →
                                </a>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('services.index') }}" class="text-gray-300 hover:text-sipn-orange transition">
                                    Découvrir nos services
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>

                <!-- Links -->
                <div>
                    <h3 class="text-lg font-heading font-bold mb-4">Liens rapides</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('actualites.index') }}" class="text-gray-300 hover:text-sipn-orange transition">Actualités</a></li>
                        <li><a href="{{ route('contact.create') }}" class="text-gray-300 hover:text-sipn-orange transition">{{ __('Contact') }}</a></li>
                        <li><a href="{{ route('quote.create') }}" class="text-gray-300 hover:text-sipn-orange transition">Demander un dévis</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h3 class="text-lg font-heading font-bold mb-4">Contact</h3>
                    <ul class="space-y-2 text-sm text-gray-300">
                        <li>BP 24007 Douala, Cameroun </li>
                        <li>Zone portuaire, Base Elf</li>
                        <li>Cel: +237 677 37 30 78</li>
                        <li>Tel: +237 33 40 13 79</li>
                        <li>Email: sipn20022000@yahoo.fr</li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-sm text-gray-400">
                <p>&copy; {{ date('Y') }} SIPN Services & Rentals. {{ __('All rights reserved') }}.</p>
            </div>
        </div>
    </footer>
</body>
</html>
