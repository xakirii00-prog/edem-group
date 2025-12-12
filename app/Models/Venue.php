<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Venue extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'type',
        'brand',
        'description',
        'short_description',
        'address',
        'city',
        'latitude',
        'longitude',
        'phone',
        'email',
        'website',
        'working_hours',
        'image',
        'gallery',
        'vr_tour_url',
        'vr_images',
        'features',
        'menu_highlights',
        'rooms_count',
        'price_from',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'working_hours' => 'array',
        'gallery' => 'array',
        'vr_images' => 'array',
        'features' => 'array',
        'menu_highlights' => 'array',
        'is_active' => 'boolean',
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
        'price_from' => 'decimal:2',
    ];

    // Скоупы
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeHotels($query)
    {
        return $query->where('type', 'hotel');
    }

    public function scopeRestaurants($query)
    {
        return $query->where('type', 'restaurant');
    }

    public function scopeByBrand($query, $brand)
    {
        return $query->where('brand', $brand);
    }

    // Геттеры - поддержка как локальных, так и внешних URL
    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return asset('images/placeholder.svg');
        }
        // Если это внешний URL (начинается с http)
        if (str_starts_with($this->image, 'http')) {
            return $this->image;
        }
        return asset('storage/' . $this->image);
    }

    public function getGalleryUrlsAttribute()
    {
        if (!$this->gallery) return [];
        return array_map(function($img) {
            if (str_starts_with($img, 'http')) {
                return $img;
            }
            return asset('storage/' . $img);
        }, $this->gallery);
    }

    public function getVrImagesUrlsAttribute()
    {
        if (!$this->vr_images) return [];
        return array_map(function($img) {
            if (str_starts_with($img, 'http')) {
                return $img;
            }
            return asset('storage/' . $img);
        }, $this->vr_images);
    }
}
