<x-public-layout>
    <section class="relative bg-gradient-to-r from-sipn-blue to-sipn-blue-light text-white py-20 px-4 animate-gradient">
        <div class="max-w-7xl mx-auto text-center">
            <h1 class="font-heading font-bold text-4xl md:text-5xl lg:text-6xl mb-6 animate-fade-in-up">
                Contactez-nous
            </h1>
            <p class="text-xl text-gray-200 max-w-3xl mx-auto animate-fade-in-up animation-delay-200">
                Nous sommes là pour répondre à toutes vos préoccupations
            </p>
        </div>
    </section>

    
    

    <!-- Contact form -->
<div id="contact" class="bg-neutral-900">
  <div class="max-w-5xl px-4 xl:px-0 py-10 lg:py-20 mx-auto">
    <!-- Title -->
    <div class="max-w-3xl mb-10 lg:mb-14">
      <h2 class="text-white font-semibold text-2xl md:text-4xl md:leading-tight">Contactez-nous</h2>
      <p class="mt-1 text-neutral-400">Quel que soit votre objectif - nous vous y mènerons.</p>
    </div>
    <!-- End Title -->

    <!-- Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-10 lg:gap-x-16">
      <div class="md:order-2 border-b border-neutral-800 pb-10 mb-10 md:border-b-0 md:pb-0 md:mb-0">
        <!-- Messages de succès et d'erreur -->
        @if(session('success'))
            <div class="mb-6 p-4 bg-green-900/50 border border-green-500 text-green-200 rounded-lg">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    {{ session('success') }}
                </div>
            </div>
        @endif

        @if($errors->any())
            <div class="mb-6 p-4 bg-red-900/50 border border-red-500 text-red-200 rounded-lg">
                <div class="flex items-start">
                    <svg class="w-5 h-5 mr-2 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                    </svg>
                    <div>
                        <p class="font-semibold mb-1">Veuillez corriger les erreurs suivantes :</p>
                        <ul class="list-disc list-inside text-sm">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        <form action="{{ route('contact.store') }}" method="POST">
          @csrf
          <div class="space-y-4">
            <!-- Input Nom -->
            <div class="relative">
              <input type="text" 
                     id="name" 
                     name="name" 
                     value="{{ old('name') }}"
                     class="peer p-3 sm:p-4 block w-full bg-neutral-800 border-transparent rounded-lg sm:text-sm text-white placeholder:text-transparent focus:outline-hidden focus:ring-0 focus:border-transparent disabled:opacity-50 disabled:pointer-events-none
                     focus:pt-6
                     focus:pb-2
                     not-placeholder-shown:pt-6
                     not-placeholder-shown:pb-2
                     autofill:pt-6
                     autofill:pb-2 @error('name') border-red-500 @enderror" 
                     placeholder="Nom"
                     required>
              <label for="name" class="absolute top-0 start-0 p-3 sm:p-4 h-full text-neutral-400 text-sm truncate pointer-events-none transition ease-in-out duration-100 border border-transparent peer-disabled:opacity-50 peer-disabled:pointer-events-none
                peer-focus:text-xs
                peer-focus:-translate-y-1.5
                peer-focus:text-neutral-400
                peer-not-placeholder-shown:text-xs
                peer-not-placeholder-shown:-translate-y-1.5
                peer-not-placeholder-shown:text-neutral-400">Nom complet *</label>
              @error('name')
                <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
              @enderror
            </div>
            <!-- End Input -->

            <!-- Input Email -->
            <div class="relative">
              <input type="email" 
                     id="email" 
                     name="email" 
                     value="{{ old('email') }}"
                     class="peer p-3 sm:p-4 block w-full bg-neutral-800 border-transparent rounded-lg sm:text-sm text-white placeholder:text-transparent focus:outline-hidden focus:ring-0 focus:border-transparent disabled:opacity-50 disabled:pointer-events-none
                     focus:pt-6
                     focus:pb-2
                     not-placeholder-shown:pt-6
                     not-placeholder-shown:pb-2
                     autofill:pt-6
                     autofill:pb-2 @error('email') border-red-500 @enderror" 
                     placeholder="Email"
                     required>
              <label for="email" class="absolute top-0 start-0 p-3 sm:p-4 h-full text-neutral-400 text-sm truncate pointer-events-none transition ease-in-out duration-100 border border-transparent peer-disabled:opacity-50 peer-disabled:pointer-events-none
                peer-focus:text-xs
                peer-focus:-translate-y-1.5
                peer-focus:text-neutral-400
                peer-not-placeholder-shown:text-xs
                peer-not-placeholder-shown:-translate-y-1.5
                peer-not-placeholder-shown:text-neutral-400">Adresse email *</label>
              @error('email')
                <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
              @enderror
            </div>
            <!-- End Input -->

            <!-- Input Entreprise -->
            <div class="relative">
              <input type="text" 
                     id="company" 
                     name="company" 
                     value="{{ old('company') }}"
                     class="peer p-3 sm:p-4 block w-full bg-neutral-800 border-transparent rounded-lg sm:text-sm text-white placeholder:text-transparent focus:outline-hidden focus:ring-0 focus:border-transparent disabled:opacity-50 disabled:pointer-events-none
                     focus:pt-6
                     focus:pb-2
                     not-placeholder-shown:pt-6
                     not-placeholder-shown:pb-2
                     autofill:pt-6
                     autofill:pb-2 @error('company') border-red-500 @enderror" 
                     placeholder="Entreprise">
              <label for="company" class="absolute top-0 start-0 p-3 sm:p-4 h-full text-neutral-400 text-sm truncate pointer-events-none transition ease-in-out duration-100 border border-transparent peer-disabled:opacity-50 peer-disabled:pointer-events-none
                peer-focus:text-xs
                peer-focus:-translate-y-1.5
                peer-focus:text-neutral-400
                peer-not-placeholder-shown:text-xs
                peer-not-placeholder-shown:-translate-y-1.5
                peer-not-placeholder-shown:text-neutral-400">Entreprise</label>
              @error('company')
                <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
              @enderror
            </div>
            <!-- End Input -->

            <!-- Input Téléphone -->
            <div class="relative">
              <input type="tel" 
                     id="phone" 
                     name="phone" 
                     value="{{ old('phone') }}"
                     class="peer p-3 sm:p-4 block w-full bg-neutral-800 border-transparent rounded-lg sm:text-sm text-white placeholder:text-transparent focus:outline-hidden focus:ring-0 focus:border-transparent disabled:opacity-50 disabled:pointer-events-none
                     focus:pt-6
                     focus:pb-2
                     not-placeholder-shown:pt-6
                     not-placeholder-shown:pb-2
                     autofill:pt-6
                     autofill:pb-2 @error('phone') border-red-500 @enderror" 
                     placeholder="Téléphone">
              <label for="phone" class="absolute top-0 start-0 p-3 sm:p-4 h-full text-neutral-400 text-sm truncate pointer-events-none transition ease-in-out duration-100 border border-transparent peer-disabled:opacity-50 peer-disabled:pointer-events-none
                peer-focus:text-xs
                peer-focus:-translate-y-1.5
                peer-focus:text-neutral-400
                peer-not-placeholder-shown:text-xs
                peer-not-placeholder-shown:-translate-y-1.5
                peer-not-placeholder-shown:text-neutral-400">Téléphone</label>
              @error('phone')
                <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
              @enderror
            </div>
            <!-- End Input -->

            <!-- Input Sujet -->
            <div class="relative">
              <input type="text" 
                     id="subject" 
                     name="subject" 
                     value="{{ old('subject') }}"
                     class="peer p-3 sm:p-4 block w-full bg-neutral-800 border-transparent rounded-lg sm:text-sm text-white placeholder:text-transparent focus:outline-hidden focus:ring-0 focus:border-transparent disabled:opacity-50 disabled:pointer-events-none
                     focus:pt-6
                     focus:pb-2
                     not-placeholder-shown:pt-6
                     not-placeholder-shown:pb-2
                     autofill:pt-6
                     autofill:pb-2 @error('subject') border-red-500 @enderror" 
                     placeholder="Sujet"
                     required>
              <label for="subject" class="absolute top-0 start-0 p-3 sm:p-4 h-full text-neutral-400 text-sm truncate pointer-events-none transition ease-in-out duration-100 border border-transparent peer-disabled:opacity-50 peer-disabled:pointer-events-none
                peer-focus:text-xs
                peer-focus:-translate-y-1.5
                peer-focus:text-neutral-400
                peer-not-placeholder-shown:text-xs
                peer-not-placeholder-shown:-translate-y-1.5
                peer-not-placeholder-shown:text-neutral-400">Sujet *</label>
              @error('subject')
                <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
              @enderror
            </div>
            <!-- End Input -->

            <!-- Textarea Message -->
            <div class="relative">
              <textarea id="message" 
                        name="message" 
                        rows="5"
                        class="peer p-3 sm:p-4 block w-full bg-neutral-800 border-transparent rounded-lg sm:text-sm text-white placeholder:text-transparent focus:outline-hidden focus:ring-0 focus:border-transparent disabled:opacity-50 disabled:pointer-events-none
                        focus:pt-6
                        focus:pb-2
                        not-placeholder-shown:pt-6
                        not-placeholder-shown:pb-2
                        autofill:pt-6
                        autofill:pb-2 @error('message') border-red-500 @enderror" 
                        placeholder="Parlez-nous de votre projet"
                        required>{{ old('message') }}</textarea>
              <label for="message" class="absolute top-0 start-0 p-3 sm:p-4 h-full text-neutral-400 text-sm truncate pointer-events-none transition ease-in-out duration-100 border border-transparent peer-disabled:opacity-50 peer-disabled:pointer-events-none
                peer-focus:text-xs
                peer-focus:-translate-y-1.5
                peer-focus:text-neutral-400
                peer-not-placeholder-shown:text-xs
                peer-not-placeholder-shown:-translate-y-1.5
                peer-not-placeholder-shown:text-neutral-400">Parlez-nous de votre projet *</label>
              @error('message')
                <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
              @enderror
            </div>
            <!-- End Textarea -->
          </div>

          <div class="mt-6">
            <p class="text-xs text-neutral-500 mb-4">
              Les champs marqués d'un * sont obligatoires
            </p>

            <button type="submit" class="group inline-flex items-center gap-x-2 py-3 px-6 bg-sipn-orange hover:bg-sipn-orange-dark font-medium text-sm text-white rounded-full focus:outline-hidden transition-all duration-300 shadow-lg hover:shadow-xl">
              Envoyer le message
              <svg class="shrink-0 size-4 transition group-hover:translate-x-0.5 group-focus:translate-x-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
            </button>
          </div>
        </form>
      </div>
      <!-- End Col -->

      <div class="space-y-14">
        <!-- Item -->
        <div class="flex gap-x-5">
          <svg class="shrink-0 size-6 text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
          <div class="grow">
            <h4 class="text-white font-semibold">Notre adresse :</h4>

            <address class="mt-1 text-neutral-400 text-sm not-italic">
              Zone portuaire, Base Elf <br>
              Douala, Cameroun<br>
              BP 24007
            </address>
          </div>
        </div>
        <!-- End Item -->

        <!-- Item - Appelez-nous -->
        <div class="flex gap-x-5">
          <svg class="shrink-0 size-6 text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
          <div class="grow">
            <h4 class="text-white font-semibold">Appelez-nous :</h4>
            <div class="mt-1 space-y-1">
              <a href="tel:+23733401379" class="block text-neutral-400 text-sm hover:text-neutral-200 focus:outline-hidden focus:text-neutral-200 transition-colors duration-200">
                +237 33 40 13 79
              </a>
              <a href="tel:+237677373078" class="block text-neutral-400 text-sm hover:text-neutral-200 focus:outline-hidden focus:text-neutral-200 transition-colors duration-200">
                +237 677 37 30 78
              </a>
            </div>
          </div>
        </div>
        <!-- End Item -->

        <!-- Item - Écrivez-nous -->
        <div class="flex gap-x-5">
          <svg class="shrink-0 size-6 text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21.2 8.4c.5.38.8.97.8 1.6v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V10a2 2 0 0 1 .8-1.6l8-6a2 2 0 0 1 2.4 0l8 6Z"/><path d="m22 10-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 10"/></svg>
          <div class="grow">
            <h4 class="text-white font-semibold">Écrivez-nous :</h4>

            <a class="mt-1 text-neutral-400 text-sm hover:text-neutral-200 focus:outline-hidden focus:text-neutral-200" href="mailto:sipn20022000@yahoo.fr" target="_blank">
              sipn20022000@yahoo.fr
            </a>
          </div>
        </div>
        <!-- End Item -->

        <!-- Item -->
        <div class="flex gap-x-5">
          <svg class="shrink-0 size-6 text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="m3 11 18-5v12L3 14v-3z"/><path d="M11.6 16.8a3 3 0 1 1-5.8-1.6"/></svg>
          <div class="grow">
            <h4 class="text-white font-semibold">Slogant</h4>
            <p class="mt-1 text-neutral-400">
              Nous transformons vos défis en réussites.
            </p>
          </div>
        </div>
        <!-- End Item -->
      </div>
      <!-- End Col -->
    </div>
    <!-- End Grid -->
  </div>
</div>

<!-- Nos horaires - Full Width -->
<section class="relative py-20 bg-gradient-to-br from-sipn-blue via-sipn-blue-light to-sipn-blue overflow-hidden">
    <!-- Motif de fond décoratif -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-10 left-10 w-32 h-32 bg-white rounded-full"></div>
        <div class="absolute top-40 right-20 w-24 h-24 bg-sipn-orange rounded-full"></div>
        <div class="absolute bottom-20 left-1/4 w-16 h-16 bg-white rounded-full"></div>
        <div class="absolute bottom-10 right-10 w-20 h-20 bg-sipn-orange rounded-full"></div>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- En-tête centré -->
        <div class="text-center mb-16">
            <div class="w-24 h-24 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-6 backdrop-blur-sm">
                <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10"/>
                    <polyline points="12,6 12,12 16,14"/>
                </svg>
            </div>
            <h2 class="text-4xl md:text-5xl font-heading font-bold text-white mb-4">Horaires d'ouverture</h2>
            <p class="text-xl text-white/90 max-w-2xl mx-auto">Nous sommes à votre service pour tous vos besoins BTP</p>
        </div>
        
        <!-- Contenu principal -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-stretch">
            <!-- Horaires principaux - Card centrale mise en évidence -->
            <div class="lg:col-span-1 order-2 lg:order-1">
                <div class="bg-white/10 backdrop-blur-md rounded-2xl p-8 h-full border border-white/20">
                    <h3 class="text-2xl font-bold text-white mb-6 text-center">Informations pratiques</h3>
                    <div class="space-y-6">
                        <div class="bg-white/10 rounded-lg p-4">
                            <h4 class="font-bold text-white mb-2 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-sipn-orange" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                                Service client
                            </h4>
                            <p class="text-white/80 text-sm">
                                Notre équipe est disponible pendant les heures d'ouverture pour vous accompagner.
                            </p>
                        </div>
                        
                        <div class="bg-white/10 rounded-lg p-4">
                            <h4 class="font-bold text-white mb-2 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-sipn-orange" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                                </svg>
                                Contact urgent
                            </h4>
                            <p class="text-white/80 text-sm">
                                Pour les urgences, contactez-nous par email. Réponse rapide garantie.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Card centrale - Horaires -->
            <div class="lg:col-span-1 order-1 lg:order-2">
                <div class="bg-white rounded-2xl shadow-2xl p-8 h-full transform hover:scale-105 transition-transform duration-300">
                    <div class="text-center mb-8">
                        <div class="w-16 h-16 bg-sipn-orange/10 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-sipn-orange" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-sipn-blue mb-2">Nos horaires</h3>
                    </div>
                    
                    <div class="space-y-4">
                        <!-- Horaires d'ouverture -->
                        <div class="bg-gradient-to-r from-green-50 to-green-100 rounded-xl p-6 border-l-4 border-green-500">
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex items-center space-x-3">
                                    <div class="w-4 h-4 bg-green-500 rounded-full animate-pulse"></div>
                                    <span class="font-bold text-green-800 text-lg">Lundi - Vendredi</span>
                                </div>
                                <span class="text-xs bg-green-500 text-white px-2 py-1 rounded-full">OUVERT</span>
                            </div>
                            <div class="text-center">
                                <span class="text-3xl font-bold text-green-700">08h00 - 17h00</span>
                            </div>
                        </div>
                        
                        <!-- Weekend fermé -->
                        <div class="bg-gradient-to-r from-red-50 to-red-100 rounded-xl p-6 border-l-4 border-red-400">
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex items-center space-x-3">
                                    <div class="w-4 h-4 bg-red-400 rounded-full"></div>
                                    <span class="font-bold text-red-700 text-lg">Weekend</span>
                                </div>
                                <span class="text-xs bg-red-400 text-white px-2 py-1 rounded-full">FERMÉ</span>
                            </div>
                            <div class="text-center">
                                <span class="text-2xl font-semibold text-red-600">Fermé</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Informations supplémentaires -->
            <div class="lg:col-span-1 order-3">
                <div class="bg-white/10 backdrop-blur-md rounded-2xl p-8 h-full border border-white/20">
                    <h3 class="text-2xl font-bold text-white mb-6 text-center">Disponibilité</h3>
                    <div class="space-y-6">
                        <div class="text-center">
                            <div class="w-20 h-20 bg-sipn-orange/20 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-10 h-10 text-sipn-orange" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <h4 class="text-xl font-bold text-white mb-2">9 heures par jour</h4>
                            <p class="text-white/80">de service continu</p>
                        </div>
                        
                        <div class="text-center">
                            <div class="w-20 h-20 bg-sipn-orange/20 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-10 h-10 text-sipn-orange" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                                </svg>
                            </div>
                            <h4 class="text-xl font-bold text-white mb-2">5 jours par semaine</h4>
                            <p class="text-white/80">pour vous servir</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d577.7277015212923!2d9.69720980032044!3d4.071566426607823!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sfr!2scm!4v1764739173175!5m2!1sfr!2scm" 
     height="600" style="border:0;" class="w-full" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</x-public-layout>
