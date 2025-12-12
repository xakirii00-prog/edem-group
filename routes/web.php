<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VenueController;
use App\Http\Controllers\Admin\VenueController as AdminVenueController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;

// Публичные маршруты
Route::get('/', [VenueController::class, 'home'])->name('home');
Route::get('/venues', [VenueController::class, 'index'])->name('venues.index');
Route::get('/hotel-edem', [VenueController::class, 'hotel'])->name('hotel.edem');
Route::get('/restaurant-fake', [VenueController::class, 'fake'])->name('restaurant.fake');
Route::get('/wow-plov', [VenueController::class, 'wowPlov'])->name('wow-plov');
Route::get('/venue/{slug}', [VenueController::class, 'show'])->name('venues.show');
Route::get('/venue/{slug}/vr', [VenueController::class, 'vr'])->name('venues.vr');
Route::get('/venue/{slug}/gallery', [VenueController::class, 'gallery'])->name('venues.gallery');

// Админ авторизация
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
});

// Админ панель (защищённая)
Route::prefix('admin')->name('admin.')->middleware('admin.auth')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.venues.index');
    });
    Route::resource('venues', AdminVenueController::class);
});
