@extends('layouts.app')

@section('title', 'Главная')
@section('description', 'Edem Group Туркестан - Гостиница Edem, этно-ресторан Fake и сеть ресторанов WOW PLOV')

@section('content')
    <!-- HERO - Главный экран -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden bg-black">
        <!-- Video/Image Background -->
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1551882547-ff40c63fe5fa?w=1920&q=80')] bg-cover bg-center scale-110" id="hero-bg"></div>
            <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/50 to-black"></div>
        </div>
        
        <!-- Floating Elements -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="floating-orb w-96 h-96 bg-gradient-to-r from-amber-500/20 to-orange-500/20 rounded-full blur-3xl absolute -top-48 -left-48"></div>
            <div class="floating-orb w-80 h-80 bg-gradient-to-r from-purple-500/20 to-pink-500/20 rounded-full blur-3xl absolute top-1/2 -right-40" style="animation-delay: 2s;"></div>
            <div class="floating-orb w-64 h-64 bg-gradient-to-r from-cyan-500/20 to-blue-500/20 rounded-full blur-3xl absolute -bottom-32 left-1/3" style="animation-delay: 4s;"></div>
        </div>

        <!-- Main Content -->
        <div class="relative z-10 text-center px-4 max-w-6xl mx-auto">
            <!-- Animated Badge -->
            <div class="inline-flex items-center gap-3 px-6 py-3 bg-white/10 backdrop-blur-xl border border-white/20 rounded-full mb-8 animate-fade-in-up">
                <div class="flex items-center gap-1">
                    <span class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></span>
                    <span class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse" style="animation-delay: 0.2s;"></span>
                    <span class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse" style="animation-delay: 0.4s;"></span>
                </div>
                <span class="text-white/90 text-sm font-medium tracking-wider uppercase">Туркестан • Казахстан</span>
            </div>
            
            <!-- Main Title with Gradient -->
            <h1 class="text-5xl sm:text-7xl lg:text-8xl font-playfair font-bold text-white mb-6 animate-fade-in-up leading-tight" style="animation-delay: 0.2s;">
                <span class="block">Добро пожаловать</span>
                <span class="block mt-2 text-transparent bg-clip-text bg-gradient-to-r from-amber-400 via-yellow-300 to-amber-400 animate-gradient-x">
                    в Edem Group
                </span>
            </h1>
            
            <!-- Subtitle -->
            <p class="text-lg sm:text-xl lg:text-2xl text-white/70 mb-12 max-w-3xl mx-auto animate-fade-in-up leading-relaxed" style="animation-delay: 0.4s;">
                Премиальное гостеприимство в сердце древнего города.<br class="hidden sm:block">
                Отель, рестораны и незабываемые впечатления.
            </p>
            
            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center animate-fade-in-up" style="animation-delay: 0.6s;">
                <a href="#venues" class="group relative px-8 py-4 bg-gradient-to-r from-amber-500 to-orange-500 rounded-full font-semibold text-white overflow-hidden transition-all duration-300 hover:scale-105 hover:shadow-[0_0_40px_rgba(245,158,11,0.5)]">
                    <span class="relative z-10 flex items-center justify-center gap-2">
                        Наши заведения
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </span>
                    <div class="absolute inset-0 bg-gradient-to-r from-amber-600 to-orange-600 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                </a>
                <a href="#vr" class="group px-8 py-4 bg-white/10 backdrop-blur-xl border border-white/30 text-white rounded-full font-semibold hover:bg-white/20 transition-all duration-300 flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                    VR тур 360°
                </a>
            </div>
        </div>
        
        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-fade-in-up" style="animation-delay: 1s;">
            <a href="#about" class="flex flex-col items-center gap-2 text-white/50 hover:text-white/80 transition-colors">
                <span class="text-xs tracking-widest uppercase">Листайте вниз</span>
                <div class="w-6 h-10 border-2 border-current rounded-full flex justify-center pt-2">
                    <div class="w-1 h-2 bg-current rounded-full animate-bounce"></div>
                </div>
            </a>
        </div>
    </section>

    <!-- ABOUT Section -->
    <section id="about" class="py-24 lg:py-32 bg-white relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-5">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,<svg width=\"60\" height=\"60\" viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"><g fill=\"none\" fill-rule=\"evenodd\"><g fill=\"%23000000\" fill-opacity=\"1\"><path d=\"M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\"/></g></g></svg>');"></div>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <!-- Left Content -->
                <div data-aos="fade-right" data-aos-duration="1000">
                    <span class="inline-flex items-center gap-2 px-4 py-2 bg-amber-100 text-amber-700 text-sm font-semibold rounded-full mb-6">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5 2a1 1 0 011 1v1h1a1 1 0 010 2H6v1a1 1 0 01-2 0V6H3a1 1 0 010-2h1V3a1 1 0 011-1zm0 10a1 1 0 011 1v1h1a1 1 0 110 2H6v1a1 1 0 11-2 0v-1H3a1 1 0 110-2h1v-1a1 1 0 011-1zM12 2a1 1 0 01.967.744L14.146 7.2 17.5 9.134a1 1 0 010 1.732l-3.354 1.935-1.18 4.455a1 1 0 01-1.933 0L9.854 12.8 6.5 10.866a1 1 0 010-1.732l3.354-1.935 1.18-4.455A1 1 0 0112 2z" clip-rule="evenodd"/>
                        </svg>
                        О компании
                    </span>
                    
                    <h2 class="text-4xl lg:text-5xl font-playfair font-bold text-gray-900 mb-6 leading-tight">
                        Мы создаём<br>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-600 to-orange-600">незабываемые</span><br>
                        впечатления
                    </h2>
                    
                    <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                        Edem Group — это больше, чем просто отели и рестораны. Это философия гостеприимства, 
                        где каждая деталь продумана для вашего комфорта. В историческом Туркестане мы объединили 
                        лучшие традиции Востока с современным сервисом.
                    </p>
                    
                    <!-- Features -->
                    <div class="grid sm:grid-cols-2 gap-4 mb-8">
                        <div class="flex items-center gap-3 p-4 bg-gray-50 rounded-2xl">
                            <div class="w-12 h-12 bg-amber-100 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                                </svg>
                            </div>
                            <div>
                                <div class="font-semibold text-gray-900">Премиум сервис</div>
                                <div class="text-sm text-gray-500">Высший стандарт</div>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 p-4 bg-gray-50 rounded-2xl">
                            <div class="w-12 h-12 bg-emerald-100 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div>
                                <div class="font-semibold text-gray-900">24/7</div>
                                <div class="text-sm text-gray-500">Всегда на связи</div>
                            </div>
                        </div>
                    </div>
                    
                    <a href="{{ route('venues.index') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gray-900 text-white rounded-full font-semibold hover:bg-amber-600 transition-all duration-300">
                        Узнать больше
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
                
                <!-- Right - Stats -->
                <div class="grid grid-cols-2 gap-6" data-aos="fade-left" data-aos-duration="1000">
                    <div class="group p-8 bg-gradient-to-br from-gray-900 to-gray-800 rounded-3xl text-white transform hover:scale-105 transition-all duration-500 hover:shadow-2xl">
                        <div class="text-5xl font-bold text-amber-400 mb-2">5+</div>
                        <div class="text-gray-400">Заведений</div>
                    </div>
                    <div class="group p-8 bg-white border-2 border-gray-100 rounded-3xl transform hover:scale-105 transition-all duration-500 hover:shadow-2xl hover:border-amber-200 mt-8">
                        <div class="text-5xl font-bold text-gray-900 mb-2">10+</div>
                        <div class="text-gray-500">Лет опыта</div>
                    </div>
                    <div class="group p-8 bg-white border-2 border-gray-100 rounded-3xl transform hover:scale-105 transition-all duration-500 hover:shadow-2xl hover:border-amber-200">
                        <div class="text-5xl font-bold text-gray-900 mb-2">50K+</div>
                        <div class="text-gray-500">Гостей</div>
                    </div>
                    <div class="group p-8 bg-gradient-to-br from-amber-500 to-orange-500 rounded-3xl text-white transform hover:scale-105 transition-all duration-500 hover:shadow-2xl mt-8">
                        <div class="text-5xl font-bold flex items-center gap-1">
                            4.9
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        </div>
                        <div class="text-white/80">Рейтинг</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- VENUES Section -->
    <section id="venues" class="py-24 lg:py-32 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="inline-flex items-center gap-2 px-4 py-2 bg-amber-100 text-amber-700 text-sm font-semibold rounded-full mb-6">
                    🏨 Наши заведения
                </span>
                <h2 class="text-4xl lg:text-5xl font-playfair font-bold text-gray-900 mb-4">
                    Выберите своё место
                </h2>
                <p class="text-xl text-gray-500 max-w-2xl mx-auto">
                    Каждое заведение создано с любовью к деталям
                </p>
            </div>
            
            <!-- Venues Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($venues ?? [] as $venue)
                    <div class="group" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                            <!-- Image -->
                            <div class="relative h-64 overflow-hidden">
                                <img src="{{ $venue->image_url }}" alt="{{ $venue->name }}" 
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                                     referrerpolicy="no-referrer">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
                                
                                <!-- Type Badge -->
                                <div class="absolute top-4 left-4">
                                    <span class="px-3 py-1.5 bg-white/90 backdrop-blur-sm text-gray-900 text-sm font-semibold rounded-full">
                                        {{ $venue->type === 'hotel' ? '🏨 Отель' : '🍽️ Ресторан' }}
                                    </span>
                                </div>
                                
                                <!-- VR Button -->
                                @if($venue->vr_images || $venue->vr_tour_url)
                                    <a href="{{ route('venues.vr', $venue->slug) }}" 
                                       class="absolute top-4 right-4 w-10 h-10 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center shadow-lg hover:scale-110 transition-transform">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                    </a>
                                @endif
                                
                                <!-- Rating -->
                                @if($venue->rating)
                                    <div class="absolute bottom-4 left-4 flex items-center gap-1.5 px-3 py-1.5 bg-black/50 backdrop-blur-sm rounded-full">
                                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                        <span class="text-white text-sm font-semibold">{{ $venue->rating }}</span>
                                    </div>
                                @endif
                            </div>
                            
                            <!-- Content -->
                            <div class="p-6">
                                <div class="text-amber-600 text-sm font-semibold mb-2">{{ $venue->brand }}</div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-amber-600 transition-colors">
                                    {{ $venue->name }}
                                </h3>
                                <p class="text-gray-500 text-sm mb-4 line-clamp-2">
                                    {{ $venue->short_description ?? Str::limit($venue->description, 80) }}
                                </p>
                                
                                <div class="flex items-center text-gray-400 text-sm mb-4">
                                    <svg class="w-4 h-4 mr-1.5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    </svg>
                                    {{ Str::limit($venue->address, 35) }}
                                </div>
                                
                                <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                    @if($venue->price_from)
                                        <span class="text-lg font-bold text-gray-900">
                                            от <span class="text-amber-600">{{ number_format($venue->price_from, 0, '', ' ') }}</span> ₸
                                        </span>
                                    @else
                                        <span></span>
                                    @endif
                                    <a href="{{ route('venues.show', $venue->slug) }}" 
                                       class="flex items-center gap-1 px-4 py-2 bg-gray-900 text-white text-sm rounded-full hover:bg-amber-600 transition-colors">
                                        Подробнее
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-16">
                        <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                        <p class="text-gray-500">Заведения пока не добавлены</p>
                    </div>
                @endforelse
            </div>
            
            @if(count($venues ?? []) > 0)
                <div class="text-center mt-12" data-aos="fade-up">
                    <a href="{{ route('venues.index') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-amber-500 to-orange-500 text-white rounded-full font-semibold hover:shadow-lg hover:shadow-amber-500/30 transition-all duration-300">
                        Все заведения
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
            @endif
        </div>
    </section>

    <!-- VR Section -->
    <section id="vr" class="py-24 lg:py-32 bg-gradient-to-br from-gray-900 via-purple-900 to-gray-900 relative overflow-hidden">
        <!-- Background Effects -->
        <div class="absolute inset-0">
            <div class="absolute top-0 left-1/4 w-96 h-96 bg-purple-500/20 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-amber-500/20 rounded-full blur-3xl"></div>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div data-aos="fade-right">
                    <span class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 backdrop-blur-sm text-white text-sm font-semibold rounded-full mb-6">
                        🥽 Виртуальная реальность
                    </span>
                    <h2 class="text-4xl lg:text-5xl font-playfair font-bold text-white mb-6 leading-tight">
                        Посетите нас<br>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-400 to-orange-400">не выходя из дома</span>
                    </h2>
                    <p class="text-xl text-gray-300 mb-8">
                        Совершите виртуальный тур по нашим заведениям в формате 360°. 
                        Оцените интерьер и атмосферу до визита.
                    </p>
                    
                    <div class="flex flex-wrap gap-3 mb-8">
                        <span class="px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full text-white text-sm">✓ 360° панорамы</span>
                        <span class="px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full text-white text-sm">✓ VR очки</span>
                        <span class="px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full text-white text-sm">✓ Бесплатно</span>
                    </div>
                </div>
                
                <div data-aos="fade-left" class="relative">
                    <div class="relative rounded-3xl overflow-hidden shadow-2xl bg-gradient-to-br from-purple-600 to-pink-600 aspect-video flex items-center justify-center">
                        <div class="text-center">
                            <div class="w-20 h-20 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center mx-auto mb-4 cursor-pointer hover:scale-110 transition-transform hover:bg-white/30">
                                <svg class="w-10 h-10 text-white ml-1" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z"/>
                                </svg>
                            </div>
                            <p class="text-white text-lg font-semibold">Начать VR-тур</p>
                        </div>
                    </div>
                    <!-- Badge -->
                    <div class="absolute -top-4 -right-4 w-16 h-16 bg-amber-500 rounded-2xl rotate-12 flex items-center justify-center shadow-xl">
                        <span class="text-white font-bold">360°</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-24 lg:py-32 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center" data-aos="zoom-in">
            <span class="inline-flex items-center gap-2 px-4 py-2 bg-amber-100 text-amber-700 text-sm font-semibold rounded-full mb-6">
                📞 Свяжитесь с нами
            </span>
            <h2 class="text-4xl lg:text-5xl font-playfair font-bold text-gray-900 mb-6">
                Готовы забронировать?
            </h2>
            <p class="text-xl text-gray-500 mb-10">
                Позвоните нам или выберите заведение для бронирования
            </p>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="tel:+77020009066" class="flex items-center justify-center gap-2 px-8 py-4 bg-gray-900 text-white rounded-full font-semibold hover:bg-amber-600 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                    +7 702 000 90 66
                </a>
                <a href="{{ route('venues.index') }}" class="flex items-center justify-center gap-2 px-8 py-4 bg-gradient-to-r from-amber-500 to-orange-500 text-white rounded-full font-semibold hover:shadow-lg transition-all">
                    Выбрать заведение
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>
@endsection

@push('styles')
<style>
    /* Animations */
    @keyframes fade-in-up {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @keyframes gradient-x {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(0) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(5deg); }
    }
    
    .animate-fade-in-up {
        animation: fade-in-up 0.8s ease-out forwards;
        opacity: 0;
    }
    
    .animate-gradient-x {
        background-size: 200% 200%;
        animation: gradient-x 3s ease infinite;
    }
    
    .floating-orb {
        animation: float 8s ease-in-out infinite;
    }
    
    /* Line clamp */
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
@endpush

@push('scripts')
<script>
    // Parallax effect for hero background
    window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        const heroBg = document.getElementById('hero-bg');
        if (heroBg && scrolled < window.innerHeight) {
            heroBg.style.transform = `scale(1.1) translateY(${scrolled * 0.3}px)`;
        }
    });
</script>
@endpush
