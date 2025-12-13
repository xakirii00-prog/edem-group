<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edem Group — Премиум гостеприимство в Туркестане</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; background: #0a0a0a; color: #fff; overflow-x: hidden; }
        .font-playfair { font-family: 'Playfair Display', serif; }
        
        .gradient-text {
            background: linear-gradient(135deg, #f59e0b 0%, #fbbf24 50%, #f59e0b 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .hero-overlay {
            background: linear-gradient(180deg, rgba(0,0,0,0.4) 0%, rgba(0,0,0,0.8) 100%);
        }
        
        .gradient-border {
            position: relative;
            background: linear-gradient(135deg, #1a1a1a, #0a0a0a);
            border-radius: 24px;
        }
        .gradient-border::before {
            content: '';
            position: absolute;
            inset: -2px;
            border-radius: 26px;
            background: linear-gradient(135deg, #f59e0b, #fbbf24, #f59e0b);
            z-index: -1;
            opacity: 0;
            transition: opacity 0.5s;
        }
        .gradient-border:hover::before { opacity: 1; }
        
        html { scroll-behavior: smooth; }
        
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #0a0a0a; }
        ::-webkit-scrollbar-thumb { background: #f59e0b; border-radius: 4px; }
        
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }
        .animate-float { animation: float 6s ease-in-out infinite; }
        
        .glow { box-shadow: 0 0 60px rgba(245, 158, 11, 0.3); }
        
        .venue-card { transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1); }
        .venue-card:hover {
            transform: translateY(-12px) scale(1.02);
            box-shadow: 0 40px 80px rgba(0,0,0,0.5);
        }
        
        .btn-shine { position: relative; overflow: hidden; }
        .btn-shine::after {
            content: '';
            position: absolute;
            top: -50%; left: -50%;
            width: 200%; height: 200%;
            background: linear-gradient(45deg, transparent 30%, rgba(255,255,255,0.3) 50%, transparent 70%);
            transform: translateX(-100%);
            transition: transform 0.6s;
        }
        .btn-shine:hover::after { transform: translateX(100%); }
        
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="fixed w-full z-50 transition-all duration-500" id="navbar">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex justify-between items-center h-20 lg:h-24">
                <a href="/" class="flex items-center gap-3 group">
                    <div class="w-12 h-12 bg-gradient-to-br from-amber-500 to-orange-600 rounded-xl flex items-center justify-center transform group-hover:rotate-6 transition-transform shadow-lg">
                        <span class="text-white font-bold text-xl font-playfair">E</span>
                    </div>
                    <div>
                        <span class="text-xl font-bold text-white">Edem Group</span>
                        <span class="hidden sm:block text-xs text-amber-500 tracking-[0.2em] uppercase">Туркестан</span>
                    </div>
                </a>
                
                <div class="hidden lg:flex items-center gap-8">
                    <a href="#venues" class="text-gray-300 hover:text-white transition-colors text-sm tracking-wide">Заведения</a>
                    <a href="#about" class="text-gray-300 hover:text-white transition-colors text-sm tracking-wide">О нас</a>
                    <a href="#contact" class="text-gray-300 hover:text-white transition-colors text-sm tracking-wide">Контакты</a>
                </div>
                
                <a href="tel:+77020009066" class="hidden lg:flex items-center gap-3 px-6 py-3 bg-gradient-to-r from-amber-500 to-orange-600 rounded-full text-white font-medium btn-shine">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    Позвонить
                </a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?w=1920&q=80" 
                 class="w-full h-full object-cover scale-110" id="hero-bg" alt="">
            <div class="absolute inset-0 hero-overlay"></div>
        </div>
        
        <div class="absolute top-1/4 left-10 w-72 h-72 bg-amber-500/10 rounded-full blur-[100px] animate-float"></div>
        <div class="absolute bottom-1/4 right-10 w-96 h-96 bg-orange-500/10 rounded-full blur-[120px] animate-float" style="animation-delay: -3s;"></div>
        
        <div class="relative z-10 text-center px-6 max-w-5xl mx-auto">
            <div class="inline-flex items-center gap-2 px-5 py-2 bg-white/10 backdrop-blur-md rounded-full mb-8 border border-white/10" data-aos="fade-down">
                <span class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></span>
                <span class="text-white/80 text-sm">Работаем для вас 24/7</span>
            </div>
            
            <h1 class="text-4xl sm:text-6xl lg:text-7xl xl:text-8xl font-playfair font-bold text-white mb-6 leading-[1.1]" data-aos="fade-up" data-aos-delay="100">
                Искусство<br>
                <span class="gradient-text">гостеприимства</span>
            </h1>
            
            <p class="text-lg sm:text-xl text-gray-300 mb-10 max-w-2xl mx-auto leading-relaxed" data-aos="fade-up" data-aos-delay="200">
                Откройте мир премиального сервиса в историческом Туркестане. 
                Отель, рестораны и незабываемые впечатления.
            </p>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center" data-aos="fade-up" data-aos-delay="300">
                <a href="#venues" class="group px-8 py-4 bg-gradient-to-r from-amber-500 to-orange-600 rounded-full text-white font-semibold btn-shine flex items-center justify-center gap-2 shadow-lg shadow-amber-500/25 hover:shadow-amber-500/40 transition-shadow">
                    Наши заведения
                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
                <a href="#about" class="px-8 py-4 bg-white/5 backdrop-blur-md border border-white/20 rounded-full text-white font-semibold hover:bg-white/10 transition-all flex items-center justify-center gap-2">
                    Узнать больше
                </a>
            </div>
        </div>
        
        <div class="absolute bottom-10 left-1/2 -translate-x-1/2" data-aos="fade-up" data-aos-delay="500">
            <a href="#venues" class="flex flex-col items-center gap-2 text-white/50 hover:text-white/80 transition-colors">
                <span class="text-xs tracking-[0.2em] uppercase">Scroll</span>
                <div class="w-6 h-10 border-2 border-current rounded-full flex justify-center pt-2">
                    <div class="w-1 h-2 bg-current rounded-full animate-bounce"></div>
                </div>
            </a>
        </div>
    </section>

    <!-- Stats -->
    <section class="py-16 bg-gradient-to-b from-black to-zinc-900 border-y border-white/5">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12">
                <div class="text-center" data-aos="fade-up">
                    <div class="text-4xl lg:text-5xl font-bold gradient-text mb-2">5+</div>
                    <div class="text-gray-400 text-sm">Заведений</div>
                </div>
                <div class="text-center" data-aos="fade-up" data-aos-delay="100">
                    <div class="text-4xl lg:text-5xl font-bold gradient-text mb-2">10К+</div>
                    <div class="text-gray-400 text-sm">Довольных гостей</div>
                </div>
                <div class="text-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="text-4xl lg:text-5xl font-bold gradient-text mb-2">4.9</div>
                    <div class="text-gray-400 text-sm">Рейтинг на 2GIS</div>
                </div>
                <div class="text-center" data-aos="fade-up" data-aos-delay="300">
                    <div class="text-4xl lg:text-5xl font-bold gradient-text mb-2">24/7</div>
                    <div class="text-gray-400 text-sm">Время работы</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Venues -->
    <section id="venues" class="py-24 lg:py-32 bg-zinc-900">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between mb-16">
                <div data-aos="fade-right">
                    <span class="text-amber-500 text-sm tracking-[0.2em] uppercase mb-4 block">Наши заведения</span>
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-playfair font-bold text-white">
                        Выберите своё<br><span class="gradient-text">идеальное место</span>
                    </h2>
                </div>
                <p class="text-gray-400 max-w-md mt-6 lg:mt-0 lg:text-right" data-aos="fade-left">
                    Каждое заведение создано с любовью к деталям
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($venues ?? [] as $venue)
                <div class="venue-card gradient-border p-1" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="bg-zinc-900 rounded-[20px] overflow-hidden">
                        <div class="relative h-64 overflow-hidden">
                            <img src="{{ $venue->image_url }}" alt="{{ $venue->name }}" 
                                 class="w-full h-full object-cover hover:scale-110 transition-transform duration-700"
                                 referrerpolicy="no-referrer">
                            <div class="absolute inset-0 bg-gradient-to-t from-zinc-900 via-transparent to-transparent"></div>
                            <div class="absolute top-4 left-4">
                                <span class="px-4 py-1.5 bg-white/10 backdrop-blur-md rounded-full text-white text-sm border border-white/10">
                                    {{ $venue->type === 'hotel' ? '🏨 Отель' : '🍽️ Ресторан' }}
                                </span>
                            </div>
                            @if($venue->rating)
                            <div class="absolute top-4 right-4 flex items-center gap-1 px-3 py-1.5 bg-black/50 backdrop-blur-md rounded-full">
                                <svg class="w-4 h-4 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <span class="text-white text-sm font-medium">{{ $venue->rating }}</span>
                            </div>
                            @endif
                        </div>
                        <div class="p-6">
                            <div class="text-amber-500 text-sm font-medium mb-2">{{ $venue->brand }}</div>
                            <h3 class="text-xl font-bold text-white mb-3">{{ $venue->name }}</h3>
                            <p class="text-gray-400 text-sm mb-4 line-clamp-2">{{ Str::limit($venue->description, 80) }}</p>
                            <div class="flex items-center text-gray-500 text-sm mb-6">
                                <svg class="w-4 h-4 mr-2 text-amber-500/50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                                {{ Str::limit($venue->address, 30) }}
                            </div>
                            <a href="{{ route('venues.show', $venue->slug) }}" 
                               class="flex items-center justify-between w-full px-5 py-3 bg-white/5 rounded-xl text-white hover:bg-amber-500 transition-all group">
                                <span class="font-medium">Подробнее</span>
                                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-12">
                    <p class="text-gray-500">Загрузка заведений...</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- About -->
    <section id="about" class="py-24 lg:py-32 bg-black relative overflow-hidden">
        <div class="absolute inset-0 opacity-30">
            <div class="absolute top-0 right-0 w-1/2 h-full bg-gradient-to-l from-amber-500/10 to-transparent"></div>
        </div>
        
        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div data-aos="fade-right">
                    <span class="text-amber-500 text-sm tracking-[0.2em] uppercase mb-4 block">О компании</span>
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-playfair font-bold text-white mb-6">
                        Создаём <span class="gradient-text">незабываемые</span> впечатления
                    </h2>
                    <p class="text-gray-400 text-lg leading-relaxed mb-8">
                        Edem Group — это философия гостеприимства, где каждая деталь продумана для вашего комфорта. 
                        В историческом Туркестане мы объединили лучшие традиции Востока с современным сервисом.
                    </p>
                    
                    <div class="grid grid-cols-2 gap-6 mb-8">
                        <div class="p-5 bg-white/5 rounded-2xl border border-white/10">
                            <div class="w-12 h-12 bg-amber-500/10 rounded-xl flex items-center justify-center mb-4">
                                <svg class="w-6 h-6 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                            </div>
                            <div class="text-white font-semibold mb-1">Премиум качество</div>
                            <div class="text-gray-500 text-sm">Высший стандарт</div>
                        </div>
                        <div class="p-5 bg-white/5 rounded-2xl border border-white/10">
                            <div class="w-12 h-12 bg-amber-500/10 rounded-xl flex items-center justify-center mb-4">
                                <svg class="w-6 h-6 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                            </div>
                            <div class="text-white font-semibold mb-1">Забота о госте</div>
                            <div class="text-gray-500 text-sm">Индивидуальный подход</div>
                        </div>
                    </div>
                </div>
                
                <div class="relative" data-aos="fade-left">
                    <div class="relative rounded-3xl overflow-hidden glow">
                        <img src="https://images.unsplash.com/photo-1551882547-ff40c63fe5fa?w=800&q=80" 
                             class="w-full h-[500px] object-cover" alt="">
                    </div>
                    <div class="absolute -bottom-6 -left-6 p-6 bg-zinc-900/90 backdrop-blur-xl rounded-2xl border border-white/10 shadow-2xl" data-aos="fade-up" data-aos-delay="200">
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 bg-gradient-to-br from-amber-500 to-orange-600 rounded-xl flex items-center justify-center">
                                <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            </div>
                            <div>
                                <div class="text-2xl font-bold text-white">4.9</div>
                                <div class="text-gray-400 text-sm">Рейтинг на 2GIS</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section id="contact" class="py-24 lg:py-32 bg-gradient-to-b from-zinc-900 to-black relative overflow-hidden">
        <div class="absolute inset-0">
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-amber-500/5 rounded-full blur-[150px]"></div>
        </div>
        
        <div class="max-w-4xl mx-auto px-6 lg:px-8 text-center relative" data-aos="zoom-in">
            <span class="text-amber-500 text-sm tracking-[0.2em] uppercase mb-4 block">Бронирование</span>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-playfair font-bold text-white mb-6">
                Готовы к незабываемому отдыху?
            </h2>
            <p class="text-gray-400 text-lg mb-10 max-w-2xl mx-auto">
                Позвоните нам или напишите в WhatsApp
            </p>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="tel:+77020009066" class="group px-8 py-4 bg-gradient-to-r from-amber-500 to-orange-600 rounded-full text-white font-semibold btn-shine flex items-center justify-center gap-3 shadow-lg shadow-amber-500/25">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    +7 702 000 90 66
                </a>
                <a href="https://wa.me/77020009066" target="_blank" class="px-8 py-4 bg-emerald-600 rounded-full text-white font-semibold hover:bg-emerald-500 transition-colors flex items-center justify-center gap-3">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    WhatsApp
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-12 bg-black border-t border-white/5">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-amber-500 to-orange-600 rounded-xl flex items-center justify-center">
                        <span class="text-white font-bold font-playfair">E</span>
                    </div>
                    <span class="text-white font-bold">Edem Group</span>
                </div>
                <div class="text-gray-500 text-sm">© {{ date('Y') }} Edem Group. Все права защищены.</div>
            </div>
        </div>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800, easing: 'ease-out-cubic', once: true });
        
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('bg-black/80', 'backdrop-blur-xl', 'border-b', 'border-white/5');
            } else {
                navbar.classList.remove('bg-black/80', 'backdrop-blur-xl', 'border-b', 'border-white/5');
            }
        });
        
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const heroBg = document.getElementById('hero-bg');
            if (heroBg && scrolled < window.innerHeight) {
                heroBg.style.transform = `scale(1.1) translateY(${scrolled * 0.4}px)`;
            }
        });
    </script>
</body>
</html>
