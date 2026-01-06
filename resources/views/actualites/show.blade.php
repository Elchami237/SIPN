<x-public-layout>
    <!-- Header Section -->
    <section class="bg-gradient-to-r from-sipn-blue to-sipn-blue-light text-white py-12">
        <div class="max-w-4xl mx-auto px-4">
            <nav class="text-sm mb-6">
                <ol class="flex items-center space-x-2 text-gray-200">
                    <li><a href="{{ route('home') }}" class="hover:text-white transition">Accueil</a></li>
                    <li>/</li>
                    <li><a href="{{ route('actualites.index') }}" class="hover:text-white transition">Actualités</a></li>
                    <li>/</li>
                    <li class="text-white">{{ $actualite->titre }}</li>
                </ol>
            </nav>

            <div class="flex items-center gap-3 text-sm mb-4">
                @if($actualite->category)
                    <span class="bg-sipn-orange px-3 py-1 rounded-full font-medium">
                        {{ $actualite->category->name }}
                    </span>
                @endif
                <span class="text-gray-200">{{ $actualite->date_publication_formatee }}</span>
            </div>

            <h1 class="font-heading font-bold text-3xl md:text-4xl lg:text-5xl leading-tight">
                {{ $actualite->titre }}
            </h1>
        </div>
    </section>

    <!-- Article Content -->
    <article class="py-16">
        <div class="max-w-4xl mx-auto px-4">
            <!-- Image d'affiche -->
            @if($actualite->image_affiche_url)
                <div class="mb-8 rounded-xl overflow-hidden shadow-lg bg-gray-50 flex items-center justify-center">
                    <img src="{{ $actualite->image_affiche_url }}" 
                         alt="{{ $actualite->titre }}" 
                         class="w-full h-auto max-h-[50vh] sm:max-h-[60vh] md:max-h-[70vh] lg:max-h-[80vh] object-contain">
                </div>
            @endif

            <!-- Résumé -->
            <div class="bg-gray-50 border-l-4 border-sipn-orange p-6 rounded-r-lg mb-8">
                <p class="text-lg text-gray-700 leading-relaxed font-medium">
                    {{ $actualite->resume }}
                </p>
            </div>

            <!-- Contenu -->
            <div class="prose prose-lg max-w-none">
                {!! nl2br(e($actualite->contenu)) !!}
            </div>

            <!-- Galerie d'images -->
            @if($actualite->images->count() > 0)
                <div class="mt-12">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">Galerie d'images</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach($actualite->images as $index => $image)
                            <div class="group cursor-pointer" onclick="openGallery({{ $index }})">
                                <div class="aspect-video overflow-hidden rounded-lg bg-gray-100">
                                    <img src="{{ $image->image_url }}" 
                                         alt="{{ $image->alt_text }}"
                                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                </div>
                                @if($image->caption)
                                    <p class="text-sm text-gray-600 mt-2">{{ $image->caption }}</p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Modal de galerie -->
                <div id="gallery-modal" class="fixed inset-0 bg-black bg-opacity-90 z-50 hidden">
                    <div class="flex items-center justify-center min-h-screen p-4">
                        <div class="relative max-w-4xl w-full">
                            <!-- Bouton fermer -->
                            <button onclick="closeGallery()" 
                                    class="absolute top-4 right-4 text-white hover:text-gray-300 z-10">
                                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                </svg>
                            </button>

                            <!-- Navigation précédent -->
                            <button onclick="previousImage()" 
                                    class="absolute left-4 top-1/2 transform -translate-y-1/2 text-white hover:text-gray-300 z-10">
                                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                            </button>

                            <!-- Navigation suivant -->
                            <button onclick="nextImage()" 
                                    class="absolute right-4 top-1/2 transform -translate-y-1/2 text-white hover:text-gray-300 z-10">
                                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                                </svg>
                            </button>

                            <!-- Image principale -->
                            <div class="text-center">
                                <img id="gallery-image" 
                                     src="" 
                                     alt=""
                                     class="max-w-full max-h-[80vh] object-contain mx-auto">
                                <p id="gallery-caption" class="text-white mt-4 text-lg"></p>
                                <p id="gallery-counter" class="text-gray-300 mt-2 text-sm"></p>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    const galleryImages = @json($actualite->images->map(function($image) {
                        return [
                            'url' => $image->image_url,
                            'alt' => $image->alt_text,
                            'caption' => $image->caption
                        ];
                    }));
                    
                    let currentImageIndex = 0;

                    function openGallery(index) {
                        currentImageIndex = index;
                        updateGalleryImage();
                        document.getElementById('gallery-modal').classList.remove('hidden');
                        document.body.style.overflow = 'hidden';
                    }

                    function closeGallery() {
                        document.getElementById('gallery-modal').classList.add('hidden');
                        document.body.style.overflow = 'auto';
                    }

                    function nextImage() {
                        currentImageIndex = (currentImageIndex + 1) % galleryImages.length;
                        updateGalleryImage();
                    }

                    function previousImage() {
                        currentImageIndex = (currentImageIndex - 1 + galleryImages.length) % galleryImages.length;
                        updateGalleryImage();
                    }

                    function updateGalleryImage() {
                        const image = galleryImages[currentImageIndex];
                        document.getElementById('gallery-image').src = image.url;
                        document.getElementById('gallery-image').alt = image.alt;
                        document.getElementById('gallery-caption').textContent = image.caption || '';
                        document.getElementById('gallery-counter').textContent = `${currentImageIndex + 1} / ${galleryImages.length}`;
                    }

                    // Navigation au clavier
                    document.addEventListener('keydown', function(e) {
                        if (!document.getElementById('gallery-modal').classList.contains('hidden')) {
                            if (e.key === 'Escape') {
                                closeGallery();
                            } else if (e.key === 'ArrowLeft') {
                                previousImage();
                            } else if (e.key === 'ArrowRight') {
                                nextImage();
                            }
                        }
                    });

                    // Fermer en cliquant sur l'arrière-plan
                    document.getElementById('gallery-modal').addEventListener('click', function(e) {
                        if (e.target === this) {
                            closeGallery();
                        }
                    });
                </script>
            @endif

            <!-- Tags/Meta -->
            @if($actualite->meta_keywords && isset($actualite->meta_keywords['fr']))
                <div class="mt-8 pt-8 border-t border-gray-200">
                    <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-3">Mots-clés</h3>
                    <div class="flex flex-wrap gap-2">
                        @foreach(explode(',', $actualite->meta_keywords['fr']) as $keyword)
                            <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm">
                                {{ trim($keyword) }}
                            </span>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Partage -->
            <div class="mt-8 pt-8 border-t border-gray-200">
                <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-3">Partager</h3>
                <div class="flex gap-4">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" 
                       target="_blank"
                       class="flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                        Facebook
                    </a>
                    
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($actualite->titre) }}" 
                       target="_blank"
                       class="flex items-center gap-2 bg-sky-500 hover:bg-sky-600 text-white px-4 py-2 rounded-lg transition">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                        </svg>
                        Twitter
                    </a>
                    
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->fullUrl()) }}" 
                       target="_blank"
                       class="flex items-center gap-2 bg-blue-700 hover:bg-blue-800 text-white px-4 py-2 rounded-lg transition">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                        </svg>
                        LinkedIn
                    </a>
                </div>
            </div>
        </div>
    </article>

    <!-- Actualités similaires -->
    @if($actualitesSimilaires->count() > 0)
        <section class="py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4">
                <h2 class="font-heading font-bold text-3xl text-sipn-blue mb-8 text-center">
                    Actualités similaires
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach($actualitesSimilaires as $similaire)
                        <article class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                            @if($similaire->image_affiche_url)
                                <div class="aspect-video overflow-hidden">
                                    <img src="{{ $similaire->image_affiche_url }}" 
                                         alt="{{ $similaire->titre }}" 
                                         class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                                </div>
                            @else
                                <div class="aspect-video bg-gradient-to-br from-sipn-blue to-sipn-blue-light flex items-center justify-center">
                                    <svg class="w-12 h-12 text-white opacity-50" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                            @endif

                            <div class="p-6">
                                <div class="flex items-center gap-2 text-sm text-gray-500 mb-3">
                                    @if($similaire->category)
                                        <span class="bg-sipn-orange/10 text-sipn-orange px-2 py-1 rounded-full text-xs font-medium">
                                            {{ $similaire->category->name }}
                                        </span>
                                    @endif
                                    <span class="text-xs">{{ $similaire->date_publication_formatee }}</span>
                                </div>

                                <h3 class="text-lg font-bold text-sipn-blue mb-2 line-clamp-2 hover:text-sipn-orange transition">
                                    <a href="{{ $similaire->url }}">
                                        {{ $similaire->titre }}
                                    </a>
                                </h3>

                                <p class="text-gray-600 text-sm mb-3 line-clamp-2">
                                    {{ $similaire->resume_court }}
                                </p>

                                <a href="{{ $similaire->url }}" 
                                   class="inline-flex items-center text-sipn-orange font-semibold hover:text-sipn-orange-dark transition text-sm group">
                                    Lire la suite
                                    <svg class="w-3 h-3 ml-1 group-hover:translate-x-1 transition-transform" 
                                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>

                <div class="text-center mt-8">
                    <a href="{{ route('actualites.index') }}" 
                       class="inline-block bg-sipn-orange hover:bg-sipn-orange-dark text-white px-6 py-3 rounded-lg font-semibold transition">
                        Voir toutes les actualités
                    </a>
                </div>
            </div>
        </section>
    @endif
</x-public-layout>