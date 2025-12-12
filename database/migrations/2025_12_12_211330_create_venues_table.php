<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('venues', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Название заведения
            $table->string('slug')->unique(); // URL-friendly название
            $table->enum('type', ['hotel', 'restaurant']); // Тип: отель или ресторан
            $table->string('brand')->nullable(); // Бренд (Edem, Fake, Wow Plov)
            $table->text('description'); // Описание
            $table->text('short_description')->nullable(); // Краткое описание
            $table->string('address'); // Адрес
            $table->string('city')->default('Ваш город'); // Город
            $table->decimal('latitude', 10, 8)->nullable(); // Широта
            $table->decimal('longitude', 11, 8)->nullable(); // Долгота
            $table->string('phone')->nullable(); // Телефон
            $table->string('email')->nullable(); // Email
            $table->string('website')->nullable(); // Веб-сайт
            $table->json('working_hours')->nullable(); // Часы работы
            $table->string('image')->nullable(); // Главное изображение
            $table->json('gallery')->nullable(); // Галерея изображений
            $table->string('vr_tour_url')->nullable(); // Ссылка на VR тур (панорама)
            $table->json('vr_images')->nullable(); // 360° изображения для VR
            $table->json('features')->nullable(); // Особенности/удобства
            $table->json('menu_highlights')->nullable(); // Популярные блюда (для ресторанов)
            $table->integer('rooms_count')->nullable(); // Количество номеров (для отелей)
            $table->decimal('price_from', 10, 2)->nullable(); // Цена от
            $table->boolean('is_active')->default(true); // Активно ли заведение
            $table->integer('sort_order')->default(0); // Порядок сортировки
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venues');
    }
};
