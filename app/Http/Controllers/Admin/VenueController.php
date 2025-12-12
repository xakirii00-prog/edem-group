<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class VenueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $venues = Venue::orderBy('sort_order')->paginate(20);
        return view('admin.venues.index', compact('venues'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.venues.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:hotel,restaurant',
            'brand' => 'nullable|string|max:255',
            'description' => 'required|string',
            'short_description' => 'nullable|string',
            'address' => 'required|string|max:500',
            'city' => 'nullable|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'phone' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'website' => 'nullable|url|max:255',
            'working_hours' => 'nullable|array',
            'image' => 'nullable|image|max:5120',
            'gallery.*' => 'nullable|image|max:5120',
            'vr_images.*' => 'nullable|image|max:10240',
            'vr_tour_url' => 'nullable|url',
            'features' => 'nullable|array',
            'menu_highlights' => 'nullable|array',
            'rooms_count' => 'nullable|integer|min:0',
            'price_from' => 'nullable|numeric|min:0',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ]);

        $validated['slug'] = Str::slug($validated['name']) . '-' . Str::random(5);

        // Загрузка главного изображения
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('venues', 'public');
        }

        // Загрузка галереи
        if ($request->hasFile('gallery')) {
            $gallery = [];
            foreach ($request->file('gallery') as $file) {
                $gallery[] = $file->store('venues/gallery', 'public');
            }
            $validated['gallery'] = $gallery;
        }

        // Загрузка VR изображений (360°)
        if ($request->hasFile('vr_images')) {
            $vrImages = [];
            foreach ($request->file('vr_images') as $file) {
                $vrImages[] = $file->store('venues/vr', 'public');
            }
            $validated['vr_images'] = $vrImages;
        }

        Venue::create($validated);

        return redirect()->route('admin.venues.index')
            ->with('success', 'Заведение успешно создано!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Venue $venue)
    {
        return view('admin.venues.show', compact('venue'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Venue $venue)
    {
        return view('admin.venues.edit', compact('venue'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Venue $venue)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:hotel,restaurant',
            'brand' => 'nullable|string|max:255',
            'description' => 'required|string',
            'short_description' => 'nullable|string',
            'address' => 'required|string|max:500',
            'city' => 'nullable|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'phone' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'website' => 'nullable|url|max:255',
            'working_hours' => 'nullable|array',
            'image' => 'nullable|image|max:5120',
            'gallery.*' => 'nullable|image|max:5120',
            'vr_images.*' => 'nullable|image|max:10240',
            'vr_tour_url' => 'nullable|url',
            'features' => 'nullable|array',
            'menu_highlights' => 'nullable|array',
            'rooms_count' => 'nullable|integer|min:0',
            'price_from' => 'nullable|numeric|min:0',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ]);

        // Обновление главного изображения
        if ($request->hasFile('image')) {
            if ($venue->image) {
                Storage::disk('public')->delete($venue->image);
            }
            $validated['image'] = $request->file('image')->store('venues', 'public');
        }

        // Обновление галереи
        if ($request->hasFile('gallery')) {
            if ($venue->gallery) {
                foreach ($venue->gallery as $img) {
                    Storage::disk('public')->delete($img);
                }
            }
            $gallery = [];
            foreach ($request->file('gallery') as $file) {
                $gallery[] = $file->store('venues/gallery', 'public');
            }
            $validated['gallery'] = $gallery;
        }

        // Обновление VR изображений
        if ($request->hasFile('vr_images')) {
            if ($venue->vr_images) {
                foreach ($venue->vr_images as $img) {
                    Storage::disk('public')->delete($img);
                }
            }
            $vrImages = [];
            foreach ($request->file('vr_images') as $file) {
                $vrImages[] = $file->store('venues/vr', 'public');
            }
            $validated['vr_images'] = $vrImages;
        }

        $venue->update($validated);

        return redirect()->route('admin.venues.index')
            ->with('success', 'Заведение успешно обновлено!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Venue $venue)
    {
        // Удаление файлов
        if ($venue->image) {
            Storage::disk('public')->delete($venue->image);
        }
        if ($venue->gallery) {
            foreach ($venue->gallery as $img) {
                Storage::disk('public')->delete($img);
            }
        }
        if ($venue->vr_images) {
            foreach ($venue->vr_images as $img) {
                Storage::disk('public')->delete($img);
            }
        }

        $venue->delete();

        return redirect()->route('admin.venues.index')
            ->with('success', 'Заведение успешно удалено!');
    }
}
