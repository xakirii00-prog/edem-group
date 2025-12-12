<?php

namespace App\Http\Controllers;

use App\Models\Venue;
use Illuminate\Http\Request;

class VenueController extends Controller
{
    // Главная страница
    public function home()
    {
        $venues = Venue::active()->orderBy('sort_order')->get();
        $hotel = Venue::active()->hotels()->first();
        $restaurants = Venue::active()->restaurants()->get();
        
        return view('welcome', compact('venues', 'hotel', 'restaurants'));
    }

    // Все заведения
    public function index()
    {
        $venues = Venue::active()->orderBy('sort_order')->get();
        return view('venues.index', compact('venues'));
    }

    // Отдельное заведение
    public function show($slug)
    {
        $venue = Venue::where('slug', $slug)->active()->firstOrFail();
        $relatedVenues = Venue::active()
            ->where('id', '!=', $venue->id)
            ->where('brand', $venue->brand)
            ->limit(3)
            ->get();
        
        return view('venues.show', compact('venue', 'relatedVenues'));
    }

    // VR просмотр
    public function vr($slug)
    {
        $venue = Venue::where('slug', $slug)->active()->firstOrFail();
        return view('venues.vr', compact('venue'));
    }

    // Фотогалерея
    public function gallery($slug)
    {
        $venue = Venue::where('slug', $slug)->active()->firstOrFail();
        return view('venues.gallery', compact('venue'));
    }

    // Отель Edem
    public function hotel()
    {
        $hotel = Venue::active()->hotels()->byBrand('Edem')->firstOrFail();
        return view('venues.show', ['venue' => $hotel, 'relatedVenues' => collect()]);
    }

    // Рестораны Wow Plov
    public function wowPlov()
    {
        $restaurants = Venue::active()->restaurants()->byBrand('Wow Plov')->get();
        return view('venues.brand', [
            'venues' => $restaurants,
            'brand' => 'Wow Plov',
            'description' => 'Сеть ресторанов узбекской кухни'
        ]);
    }

    // Ресторан Fake
    public function fake()
    {
        $restaurant = Venue::active()->restaurants()->byBrand('Fake')->firstOrFail();
        return view('venues.show', ['venue' => $restaurant, 'relatedVenues' => collect()]);
    }
}
