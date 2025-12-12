@extends('layouts.app')

@section('title', 'Все заведения')

@section('content')
    <!-- Hero -->
    <section class="relative h-[60vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=1920&q=80')] bg-cover bg-center"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/40 to-black"></div>
        <div class="relative z-10 text-center px-4 max-w-4xl mx-auto">
            <span class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 backdrop-blur-sm text-white text-sm font-semibold rounded-full mb-6" data-aos="fade-up">
                <span class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></span>
                5 заведений в Туркестане
            </span>
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-playfair font-bold text-white mb-6" data-aos="fade-up" data-aos-delay="100">
                Наши <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-400 to-orange-400">заведения</span>
            </h1>
            <p class="text-xl text-white/70 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="200">
                Отель премиум-класса, этно-ресторан и сеть ресторанов восточной кухни — выберите своё место
            </p>
        </div>
        <!-- Scroll indicator -->
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2" data-aos="fade-up" data-aos-delay="300">
            <div class="w-6 h-10 border-2 border-white/30 rounded-full flex justify-center pt-2">
                <div class="w-1 h-2 bg-white/50 rounded-full animate-bounce"></div>
            </div>
        </div>
    </section>

    <!-- Список заведений -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Фильтры -->
            <div class="flex flex-wrap gap-4 mb-12 justify-center" data-aos="fade-up">
                <button class="filter-btn active px-6 py-2 rounded-full bg-gold text-white font-medium" data-filter="all">
                    Все
                </button>
                <button class="filter-btn px-6 py-2 rounded-full bg-white text-gray-700 font-medium border border-gray-200 hover:border-gold hover:text-gold" data-filter="hotel">
                    Отели
                </button>
                <button class="filter-btn px-6 py-2 rounded-full bg-white text-gray-700 font-medium border border-gray-200 hover:border-gold hover:text-gold" data-filter="restaurant">
                    Рестораны
                </button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="venues-grid">
                @forelse($venues as $venue)
                    <div class="venue-card bg-white rounded-2xl overflow-hidden shadow-lg" data-type="{{ $venue->type }}" data-aos="fade-up">
                        <div class="relative h-64">
                            <img src="{{ $venue->image_url }}" alt="{{ $venue->name }}" class="w-full h-full object-cover" referrerpolicy="no-referrer">
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1 bg-gold text-white text-sm rounded-full">
                                    {{ $venue->type === 'hotel' ? 'Отель' : 'Ресторан' }}
                                </span>
                            </div>
                            @if($venue->vr_images || $venue->vr_tour_url)
                                <a href="{{ route('venues.vr', $venue->slug) }}" class="absolute top-4 right-4 w-10 h-10 bg-white bg-opacity-90 rounded-full flex items-center justify-center hover:bg-gold hover:text-white transition-colors" title="VR тур">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </a>
                            @endif
                        </div>
                        <div class="p-6">
                            <div class="flex items-center gap-2 mb-2">
                                <span class="text-sm text-gold font-medium">{{ $venue->brand }}</span>
                            </div>
                            <h3 class="text-xl font-playfair font-bold text-gray-900 mb-2">{{ $venue->name }}</h3>
                            <p class="text-gray-600 mb-4 line-clamp-2">{{ $venue->short_description ?? Str::limit($venue->description, 100) }}</p>
                            
                            <div class="flex items-center text-gray-500 text-sm mb-4">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                </svg>
                                {{ $venue->address }}
                            </div>
                            
                            <div class="flex justify-between items-center">
                                @if($venue->price_from)
                                    <span class="text-gold font-semibold">от {{ number_format($venue->price_from, 0, '', ' ') }} ₸</span>
                                @else
                                    <span></span>
                                @endif
                                <a href="{{ route('venues.show', $venue->slug) }}" class="px-4 py-2 border-2 border-gold text-gold rounded-full hover:bg-gold hover:text-white transition-colors font-medium">
                                    Подробнее
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <p class="text-gray-500 text-lg mb-4">Заведения пока не добавлены</p>
                        <a href="{{ route('admin.venues.create') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gold text-white rounded-full">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                            Добавить заведение
                        </a>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    // Фильтрация
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            document.querySelectorAll('.filter-btn').forEach(b => {
                b.classList.remove('active', 'bg-gold', 'text-white');
                b.classList.add('bg-white', 'text-gray-700');
            });
            btn.classList.add('active', 'bg-gold', 'text-white');
            btn.classList.remove('bg-white', 'text-gray-700');
            
            const filter = btn.dataset.filter;
            document.querySelectorAll('.venue-card').forEach(card => {
                if (filter === 'all' || card.dataset.type === filter) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
</script>
@endpush
