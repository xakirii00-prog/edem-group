@extends('layouts.app')

@section('title', $venue->name)
@section('description', $venue->short_description ?? Str::limit($venue->description, 160))

@section('content')
    <!-- Hero -->
    <section class="relative h-[70vh] min-h-[500px] flex items-end overflow-hidden">
        <div class="absolute inset-0">
            <img src="{{ $venue->image_url }}" alt="{{ $venue->name }}" class="w-full h-full object-cover scale-105" referrerpolicy="no-referrer" id="hero-image">
            <div class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-transparent"></div>
        </div>
        
        <!-- Floating decorative elements -->
        <div class="absolute top-20 right-10 w-32 h-32 bg-amber-500/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-40 left-10 w-40 h-40 bg-purple-500/10 rounded-full blur-3xl"></div>
        
        <div class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-16">
            <div class="flex flex-wrap items-center gap-3 mb-6" data-aos="fade-up">
                <span class="px-4 py-2 bg-gradient-to-r from-amber-500 to-orange-500 text-white rounded-full text-sm font-semibold shadow-lg">
                    {{ $venue->type === 'hotel' ? '🏨 Отель' : '🍽️ Ресторан' }}
                </span>
                @if($venue->brand)
                    <span class="px-4 py-2 bg-white/10 backdrop-blur-sm text-white rounded-full text-sm font-medium">{{ $venue->brand }}</span>
                @endif
                @if($venue->rating)
                    <span class="px-4 py-2 bg-white/10 backdrop-blur-sm text-white rounded-full text-sm font-medium flex items-center gap-1">
                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        {{ $venue->rating }}
                    </span>
                @endif
            </div>
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-playfair font-bold text-white mb-6" data-aos="fade-up" data-aos-delay="100">{{ $venue->name }}</h1>
            <p class="text-xl text-white/80 flex items-center gap-3" data-aos="fade-up" data-aos-delay="200">
                <span class="w-10 h-10 bg-white/10 backdrop-blur-sm rounded-full flex items-center justify-center">
                    <svg class="w-5 h-5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    </svg>
                </span>
                {{ $venue->address }}
            </p>
        </div>
    </section>

    <!-- Действия -->
    <section class="bg-white/95 backdrop-blur-xl border-b border-gray-100 sticky top-20 z-40 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between py-4 gap-4 overflow-x-auto">
                <div class="flex items-center gap-4 flex-shrink-0">
                    @if($venue->phone)
                        <a href="tel:{{ $venue->phone }}" class="flex items-center gap-2 px-4 py-2 text-gray-700 hover:text-amber-600 hover:bg-amber-50 rounded-full transition-all">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <span class="font-medium">{{ $venue->phone }}</span>
                        </a>
                    @endif
                </div>
                <div class="flex items-center gap-3 flex-shrink-0">
                    @if($venue->gallery)
                        <a href="{{ route('venues.gallery', $venue->slug) }}" class="px-5 py-2.5 bg-gray-100 text-gray-800 rounded-full font-medium flex items-center gap-2 hover:bg-gray-200 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            Фото ({{ count($venue->gallery) }})
                        </a>
                    @endif
                    @if($venue->vr_images || $venue->vr_tour_url)
                        <a href="{{ route('venues.vr', $venue->slug) }}" class="px-5 py-2.5 bg-gradient-to-r from-purple-500 to-pink-500 text-white rounded-full font-medium flex items-center gap-2 hover:shadow-lg hover:shadow-purple-500/30 transition-all">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            VR тур 360°
                        </a>
                    @endif
                    <a href="#contact" class="px-5 py-2.5 bg-gradient-to-r from-amber-500 to-orange-500 text-white rounded-full font-medium hover:shadow-lg hover:shadow-amber-500/30 transition-all">
                        Забронировать
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Основной контент -->
    <section class="py-16 lg:py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                <!-- Левая колонка - описание -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-3xl p-8 lg:p-10 shadow-sm mb-8" data-aos="fade-up">
                        <h2 class="text-3xl font-playfair font-bold text-gray-900 mb-6 flex items-center gap-3">
                            <span class="w-12 h-12 bg-amber-100 rounded-2xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </span>
                            О заведении
                        </h2>
                        <div class="prose prose-lg max-w-none text-gray-600 leading-relaxed">
                            {!! nl2br(e($venue->description)) !!}
                        </div>
                    </div>

                    <!-- Особенности -->
                    @if($venue->features)
                        <div class="bg-white rounded-3xl p-8 lg:p-10 shadow-sm mb-8" data-aos="fade-up" data-aos-delay="100">
                            <h3 class="text-2xl font-playfair font-bold text-gray-900 mb-6 flex items-center gap-3">
                                <span class="w-12 h-12 bg-emerald-100 rounded-2xl flex items-center justify-center">
                                    <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </span>
                                Особенности
                            </h3>
                            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                                @foreach($venue->features as $feature)
                                    <div class="flex items-center gap-3 p-4 bg-gray-50 rounded-2xl hover:bg-amber-50 transition-colors group">
                                        <svg class="w-5 h-5 text-amber-500 flex-shrink-0 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        <span class="text-gray-700 font-medium">{{ $feature }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Меню (для ресторанов) -->
                    @if($venue->type === 'restaurant' && $venue->menu_highlights)
                        <div class="bg-white rounded-3xl p-8 lg:p-10 shadow-sm" data-aos="fade-up" data-aos-delay="200">
                            <h3 class="text-2xl font-playfair font-bold text-gray-900 mb-6 flex items-center gap-3">
                                <span class="w-12 h-12 bg-orange-100 rounded-2xl flex items-center justify-center">
                                    <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                    </svg>
                                </span>
                                Популярные блюда
                            </h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach($venue->menu_highlights as $item)
                                <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-xl hover:bg-amber-50 transition-colors">
                                    <span class="text-2xl">🍽️</span>
                                    <span class="text-gray-700 font-medium">{{ $item }}</span>
                                </div>
                            @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Галерея -->
                    @if($venue->gallery)
                        <div class="bg-white rounded-3xl p-8 lg:p-10 shadow-sm" data-aos="fade-up" data-aos-delay="300">
                            <h3 class="text-2xl font-playfair font-bold text-gray-900 mb-6 flex items-center gap-3">
                                <span class="w-12 h-12 bg-purple-100 rounded-2xl flex items-center justify-center">
                                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </span>
                                Галерея
                            </h3>
                            <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-6">
                                @foreach(array_slice($venue->gallery_urls, 0, 6) as $index => $image)
                                    <a href="{{ route('venues.gallery', $venue->slug) }}" class="block aspect-square rounded-2xl overflow-hidden group relative shadow-sm hover:shadow-lg transition-shadow">
                                        <img src="{{ $image }}" alt="Галерея {{ $index + 1 }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" referrerpolicy="no-referrer">
                                        @if($index === 5 && count($venue->gallery) > 6)
                                            <div class="absolute inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center">
                                                <span class="text-white text-2xl font-bold">+{{ count($venue->gallery) - 6 }}</span>
                                            </div>
                                        @endif
                                    </a>
                                @endforeach
                            </div>
                            <a href="{{ route('venues.gallery', $venue->slug) }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gray-900 text-white rounded-full font-medium hover:bg-amber-600 transition-colors">
                                Смотреть все фото
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                </svg>
                            </a>
                        </div>
                    @endif
                </div>

                <!-- Правая колонка - информация -->
                <div class="lg:col-span-1">
                    <div class="sticky top-40 space-y-6">
                        <!-- Карточка информации -->
                        <div class="bg-white rounded-3xl p-6 shadow-sm" data-aos="fade-left">
                            <h3 class="text-xl font-playfair font-bold text-gray-900 mb-6 flex items-center gap-2">
                                <span class="w-2 h-2 bg-amber-500 rounded-full"></span>
                                Информация
                            </h3>
                            
                            @if($venue->price_from)
                                <div class="flex items-center justify-between py-4 border-b border-gray-100">
                                    <span class="text-gray-500">Цена от</span>
                                    <span class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-amber-600 to-orange-600">{{ number_format($venue->price_from, 0, '', ' ') }} ₸</span>
                                </div>
                            @endif

                            @if($venue->rooms_count)
                                <div class="flex items-center justify-between py-4 border-b border-gray-100">
                                    <span class="text-gray-500">Номеров</span>
                                    <span class="font-semibold text-gray-900">{{ $venue->rooms_count }}</span>
                                </div>
                            @endif

                            <div class="flex items-center justify-between py-4 border-b border-gray-100">
                                <span class="text-gray-500">Город</span>
                                <span class="font-semibold text-gray-900">{{ $venue->city }}</span>
                            </div>

                            @if($venue->phone)
                                <div class="flex items-center justify-between py-4 border-b border-gray-100">
                                    <span class="text-gray-500">Телефон</span>
                                    <a href="tel:{{ $venue->phone }}" class="font-semibold text-amber-600 hover:underline">{{ $venue->phone }}</a>
                                </div>
                            @endif

                            @if($venue->email)
                                <div class="flex items-center justify-between py-4">
                                    <span class="text-gray-500">Email</span>
                                    <a href="mailto:{{ $venue->email }}" class="font-semibold text-amber-600 hover:underline">{{ $venue->email }}</a>
                                </div>
                            @endif
                        </div>

                        <!-- Часы работы -->
                        @if($venue->working_hours)
                            <div class="bg-white rounded-3xl p-6 shadow-sm" data-aos="fade-left" data-aos-delay="100">
                                <h3 class="text-xl font-playfair font-bold text-gray-900 mb-6 flex items-center gap-2">
                                    <span class="w-2 h-2 bg-emerald-500 rounded-full"></span>
                                    Часы работы
                                </h3>
                                @foreach($venue->working_hours as $day => $hours)
                                    <div class="flex items-center justify-between py-2">
                                        <span class="text-gray-500">{{ $day }}</span>
                                        <span class="font-semibold text-gray-900">{{ $hours }}</span>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        <!-- Карта -->
                        @if($venue->latitude && $venue->longitude)
                            <div class="bg-white rounded-3xl p-6 shadow-sm" data-aos="fade-left" data-aos-delay="200">
                                <h3 class="text-xl font-playfair font-bold text-gray-900 mb-6 flex items-center gap-2">
                                    <span class="w-2 h-2 bg-blue-500 rounded-full"></span>
                                    На карте
                                </h3>
                                <div class="aspect-video rounded-2xl overflow-hidden">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1000!2d{{ $venue->longitude }}!3d{{ $venue->latitude }}!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1"
                                        width="100%"
                                        height="100%"
                                        style="border:0;"
                                        allowfullscreen=""
                                        loading="lazy">
                                    </iframe>
                                </div>
                            </div>
                        @endif

                        <!-- VR тур -->
                        @if($venue->vr_images || $venue->vr_tour_url)
                            <div class="bg-gradient-to-br from-purple-600 to-pink-600 rounded-3xl p-6 text-white shadow-xl" data-aos="fade-left" data-aos-delay="300">
                                <div class="flex items-center gap-2 mb-4">
                                    <span class="w-10 h-10 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                    </span>
                                    <h3 class="text-xl font-playfair font-bold">VR тур 360°</h3>
                                </div>
                                <p class="text-purple-100 mb-6">Совершите виртуальный тур по заведению не выходя из дома</p>
                                <a href="{{ route('venues.vr', $venue->slug) }}" class="block w-full py-4 bg-white text-purple-700 rounded-2xl font-bold text-center hover:bg-gray-100 transition-colors shadow-lg">
                                    🥽 Начать VR тур
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Похожие заведения -->
    @if($relatedVenues->count() > 0)
        <section class="py-16 lg:py-24 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl lg:text-4xl font-playfair font-bold text-gray-900 mb-10" data-aos="fade-up">
                    Другие заведения <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-600 to-orange-600">{{ $venue->brand }}</span>
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach($relatedVenues as $index => $related)
                        <div class="group" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                            <div class="bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 border border-gray-100">
                                <div class="relative h-52 overflow-hidden">
                                    <img src="{{ $related->image_url }}" alt="{{ $related->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" referrerpolicy="no-referrer">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                                </div>
                                <div class="p-6">
                                    <h3 class="text-xl font-playfair font-bold text-gray-900 mb-2 group-hover:text-amber-600 transition-colors">{{ $related->name }}</h3>
                                    <p class="text-gray-500 mb-4 flex items-center gap-2">
                                        <svg class="w-4 h-4 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        </svg>
                                        {{ $related->address }}
                                    </p>
                                    <a href="{{ route('venues.show', $related->slug) }}" class="inline-flex items-center gap-2 text-amber-600 font-semibold hover:text-amber-700 transition-colors">
                                        Подробнее
                                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection

@push('styles')
<style>
    #hero-image {
        transition: transform 0.1s ease-out;
    }
</style>
@endpush

@push('scripts')
<script>
    // Parallax effect for hero image
    window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        const heroImage = document.getElementById('hero-image');
        if (heroImage && scrolled < window.innerHeight) {
            heroImage.style.transform = `scale(1.05) translateY(${scrolled * 0.2}px)`;
        }
    });
</script>
@endpush
