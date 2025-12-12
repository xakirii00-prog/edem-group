<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Фотогалерея - {{ $venue->name }}</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        gold: '#D4AF37',
                    },
                    fontFamily: {
                        'playfair': ['Playfair Display', 'serif'],
                        'inter': ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            background: #0a0a0a;
            color: white;
            overflow-x: hidden;
        }
        
        .gallery-container {
            min-height: 100vh;
        }
        
        /* Main Swiper */
        .main-swiper {
            width: 100%;
            height: 70vh;
        }
        
        .main-swiper .swiper-slide {
            display: flex;
            align-items: center;
            justify-content: center;
            background: #111;
        }
        
        .main-swiper .swiper-slide img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }
        
        /* Thumbs Swiper */
        .thumbs-swiper {
            height: 100px;
            padding: 10px 0;
        }
        
        .thumbs-swiper .swiper-slide {
            width: 120px !important;
            height: 80px;
            opacity: 0.5;
            cursor: pointer;
            border-radius: 8px;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        
        .thumbs-swiper .swiper-slide-thumb-active {
            opacity: 1;
            border: 2px solid #D4AF37;
        }
        
        .thumbs-swiper .swiper-slide:hover {
            opacity: 0.8;
        }
        
        .thumbs-swiper .swiper-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        /* Fullscreen mode */
        .fullscreen-mode {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: 9999;
            background: black;
        }
        
        .fullscreen-mode .main-swiper {
            height: 85vh;
        }
        
        /* Navigation buttons */
        .swiper-button-next,
        .swiper-button-prev {
            color: #D4AF37 !important;
            background: rgba(0,0,0,0.5);
            width: 50px !important;
            height: 50px !important;
            border-radius: 50%;
        }
        
        .swiper-button-next:after,
        .swiper-button-prev:after {
            font-size: 20px !important;
        }
        
        .swiper-pagination-bullet {
            background: #D4AF37 !important;
        }
        
        /* Lightbox overlay */
        .lightbox {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.95);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 10000;
        }
        
        .lightbox.active {
            display: flex;
        }
        
        .lightbox img {
            max-width: 95%;
            max-height: 95%;
            object-fit: contain;
        }
        
        .lightbox-close {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 40px;
            cursor: pointer;
            color: white;
            z-index: 10001;
        }
        
        /* Photo counter */
        .photo-counter {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            background: rgba(0,0,0,0.7);
            padding: 8px 20px;
            border-radius: 20px;
            font-size: 14px;
        }
        
        /* Animated gradient */
        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        .animated-gradient {
            background: linear-gradient(-45deg, #D4AF37, #b8941f, #D4AF37, #f0d47a);
            background-size: 400% 400%;
            animation: gradientShift 3s ease infinite;
        }
    </style>
</head>
<body>
    <div class="gallery-container" id="gallery">
        <!-- Header -->
        <header class="fixed top-0 left-0 right-0 z-50 bg-black/80 backdrop-blur-md">
            <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <a href="{{ route('venues.show', $venue->slug) }}" class="text-white hover:text-gold transition-colors">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                    </a>
                    <div>
                        <h1 class="text-xl font-playfair font-bold">{{ $venue->name }}</h1>
                        <p class="text-sm text-gray-400">Фотогалерея</p>
                    </div>
                </div>
                
                <div class="flex items-center gap-4">
                    <button id="fullscreen-btn" class="p-2 rounded-full hover:bg-white/10 transition-colors" title="Полноэкранный режим">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/>
                        </svg>
                    </button>
                    <a href="{{ route('home') }}" class="px-4 py-2 bg-gold text-white rounded-full text-sm font-medium hover:bg-opacity-90 transition-colors">
                        На главную
                    </a>
                </div>
            </div>
        </header>
        
        <!-- Main Gallery -->
        <main class="pt-20">
            @php
                $allImages = $venue->gallery_urls ?: [];
                if(empty($allImages) && $venue->image_url && !str_contains($venue->image_url, 'placeholder')) {
                    $allImages = [$venue->image_url];
                }
            @endphp
            
            @if(count($allImages) > 0)
                <!-- Main Slider -->
                <div class="swiper main-swiper">
                    <div class="swiper-wrapper">
                        @foreach($allImages as $index => $image)
                            <div class="swiper-slide" data-index="{{ $index }}">
                                <img src="{{ $image }}" alt="{{ $venue->name }} - фото {{ $index + 1 }}" loading="lazy" onclick="openLightbox('{{ $image }}')" referrerpolicy="no-referrer">
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="photo-counter">
                        <span id="current-photo">1</span> / {{ count($allImages) }}
                    </div>
                </div>
                
                <!-- Thumbnails -->
                <div class="max-w-6xl mx-auto px-4 py-4">
                    <div class="swiper thumbs-swiper">
                        <div class="swiper-wrapper">
                            @foreach($allImages as $index => $image)
                                <div class="swiper-slide">
                                    <img src="{{ $image }}" alt="Миниатюра {{ $index + 1 }}" referrerpolicy="no-referrer">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @else
                <div class="flex flex-col items-center justify-center h-[60vh] text-center">
                    <svg class="w-24 h-24 text-gray-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <h2 class="text-2xl font-playfair mb-2">Фотографии скоро появятся</h2>
                    <p class="text-gray-400 mb-6">Мы работаем над добавлением фотогалереи</p>
                    <a href="{{ route('venues.show', $venue->slug) }}" class="px-6 py-3 bg-gold text-white rounded-full">
                        Вернуться к заведению
                    </a>
                </div>
            @endif
        </main>
        
        <!-- Venue Info Panel -->
        <section class="bg-gray-900 py-8">
            <div class="max-w-4xl mx-auto px-4">
                <div class="grid md:grid-cols-2 gap-8">
                    <div>
                        <h2 class="text-2xl font-playfair font-bold mb-4">{{ $venue->name }}</h2>
                        <p class="text-gray-400 mb-4">{{ $venue->short_description ?? Str::limit($venue->description, 200) }}</p>
                        
                        <div class="flex flex-wrap gap-2 mb-4">
                            @foreach($venue->features ?? [] as $feature)
                                <span class="px-3 py-1 bg-white/10 rounded-full text-sm">{{ $feature }}</span>
                            @endforeach
                        </div>
                    </div>
                    
                    <div class="space-y-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-gold/20 rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                </svg>
                            </div>
                            <span class="text-gray-300">{{ $venue->address }}, {{ $venue->city }}</span>
                        </div>
                        
                        @if($venue->phone)
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-gold/20 rounded-full flex items-center justify-center">
                                    <svg class="w-5 h-5 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                </div>
                                <a href="tel:{{ $venue->phone }}" class="text-gold hover:underline">{{ $venue->phone }}</a>
                            </div>
                        @endif
                        
                        <a href="{{ route('venues.show', $venue->slug) }}" class="inline-flex items-center gap-2 px-6 py-3 animated-gradient text-white rounded-full font-medium hover:opacity-90 transition-opacity">
                            Подробнее о заведении
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Source Attribution -->
        <footer class="bg-black py-4 text-center text-gray-500 text-sm">
            <p>Фотографии предоставлены сервисом 2GIS</p>
        </footer>
    </div>
    
    <!-- Lightbox -->
    <div class="lightbox" id="lightbox">
        <span class="lightbox-close" onclick="closeLightbox()">&times;</span>
        <img src="" alt="Full size" id="lightbox-img">
    </div>
    
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    
    <script>
        // Initialize Swiper
        const thumbsSwiper = new Swiper('.thumbs-swiper', {
            spaceBetween: 10,
            slidesPerView: 'auto',
            freeMode: true,
            watchSlidesProgress: true,
            centeredSlides: false,
        });
        
        const mainSwiper = new Swiper('.main-swiper', {
            spaceBetween: 10,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            thumbs: {
                swiper: thumbsSwiper,
            },
            keyboard: {
                enabled: true,
            },
            on: {
                slideChange: function() {
                    document.getElementById('current-photo').textContent = this.activeIndex + 1;
                }
            }
        });
        
        // Fullscreen toggle
        const fullscreenBtn = document.getElementById('fullscreen-btn');
        const gallery = document.getElementById('gallery');
        
        fullscreenBtn.addEventListener('click', function() {
            if (!document.fullscreenElement) {
                gallery.requestFullscreen().catch(err => {
                    console.log('Fullscreen error:', err);
                });
                gallery.classList.add('fullscreen-mode');
            } else {
                document.exitFullscreen();
                gallery.classList.remove('fullscreen-mode');
            }
        });
        
        document.addEventListener('fullscreenchange', function() {
            if (!document.fullscreenElement) {
                gallery.classList.remove('fullscreen-mode');
            }
        });
        
        // Lightbox
        function openLightbox(src) {
            document.getElementById('lightbox-img').src = src;
            document.getElementById('lightbox').classList.add('active');
            document.body.style.overflow = 'hidden';
        }
        
        function closeLightbox() {
            document.getElementById('lightbox').classList.remove('active');
            document.body.style.overflow = '';
        }
        
        // Close lightbox on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeLightbox();
            }
        });
        
        // Close lightbox on click outside image
        document.getElementById('lightbox').addEventListener('click', function(e) {
            if (e.target === this) {
                closeLightbox();
            }
        });
    </script>
</body>
</html>
