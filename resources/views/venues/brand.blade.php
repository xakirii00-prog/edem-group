@extends('layouts.app')

@section('title', $brand)

@section('content')
    <!-- Hero -->
    <section class="relative h-[50vh] flex items-center justify-center bg-gradient-to-br from-orange-500 to-amber-600">
        <div class="absolute inset-0 hero-overlay opacity-30"></div>
        <div class="relative z-10 text-center px-4">
            <h1 class="text-4xl md:text-6xl font-playfair font-bold text-white mb-4">{{ $brand }}</h1>
            <p class="text-xl text-white text-opacity-90">{{ $description }}</p>
        </div>
    </section>

    <!-- Список точек -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl font-playfair font-bold text-gray-900">Наши точки</h2>
                <p class="text-gray-600 mt-2">Выберите удобную для вас локацию</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($venues as $venue)
                    <div class="venue-card bg-white rounded-2xl overflow-hidden shadow-lg" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="relative h-64">
                            <img src="{{ $venue->image_url }}" alt="{{ $venue->name }}" class="w-full h-full object-cover" referrerpolicy="no-referrer">
                            @if($venue->vr_images || $venue->vr_tour_url)
                                <a href="{{ route('venues.vr', $venue->slug) }}" class="absolute top-4 right-4 w-10 h-10 bg-white bg-opacity-90 rounded-full flex items-center justify-center hover:bg-gold hover:text-white transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </a>
                            @endif
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-playfair font-bold text-gray-900 mb-2">{{ $venue->name }}</h3>
                            <p class="text-gray-600 mb-4 line-clamp-2">{{ $venue->short_description ?? Str::limit($venue->description, 100) }}</p>
                            
                            <div class="flex items-center text-gray-500 text-sm mb-4">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                </svg>
                                {{ $venue->address }}
                            </div>

                            @if($venue->phone)
                                <div class="flex items-center text-gray-500 text-sm mb-4">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                    {{ $venue->phone }}
                                </div>
                            @endif
                            
                            <a href="{{ route('venues.show', $venue->slug) }}" class="block w-full py-3 text-center border-2 border-gold text-gold rounded-full hover:bg-gold hover:text-white transition-colors font-medium">
                                Подробнее
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <p class="text-gray-500 text-lg mb-4">Заведения {{ $brand }} пока не добавлены</p>
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
