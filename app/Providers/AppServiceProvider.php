<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Создаём админа если его нет (для Render)
        try {
            if (Schema::hasTable('admins') && Admin::count() === 0) {
                Admin::create([
                    'name' => 'Администратор',
                    'email' => 'admin@fake.kz',
                    'password' => Hash::make('admin123'),
                ]);
            }
        } catch (\Exception $e) {
            // Игнорируем ошибки при первом запуске
        }
    }
}
