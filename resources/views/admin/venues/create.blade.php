@extends('layouts.admin')

@section('title', 'Добавить заведение')
@section('page-title', 'Добавить новое заведение')

@section('content')
    <form action="{{ route('admin.venues.store') }}" method="POST" enctype="multipart/form-data" class="max-w-4xl">
        @csrf
        
        <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Основная информация</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Название *</label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Тип *</label>
                    <select name="type" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                        <option value="hotel" {{ old('type') === 'hotel' ? 'selected' : '' }}>Отель</option>
                        <option value="restaurant" {{ old('type') === 'restaurant' ? 'selected' : '' }}>Ресторан</option>
                    </select>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Бренд</label>
                    <select name="brand" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                        <option value="">Выберите бренд</option>
                        <option value="Edem" {{ old('brand') === 'Edem' ? 'selected' : '' }}>Edem</option>
                        <option value="Fake" {{ old('brand') === 'Fake' ? 'selected' : '' }}>Fake</option>
                        <option value="Wow Plov" {{ old('brand') === 'Wow Plov' ? 'selected' : '' }}>Wow Plov</option>
                    </select>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Город</label>
                    <input type="text" name="city" value="{{ old('city', 'Ваш город') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                </div>
            </div>
            
            <div class="mt-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Адрес *</label>
                <input type="text" name="address" value="{{ old('address') }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">
            </div>
            
            <div class="mt-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Краткое описание</label>
                <input type="text" name="short_description" value="{{ old('short_description') }}" maxlength="200"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent"
                    placeholder="Короткое описание для карточки (до 200 символов)">
            </div>
            
            <div class="mt-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Полное описание *</label>
                <textarea name="description" rows="5" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">{{ old('description') }}</textarea>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Контакты</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Телефон</label>
                    <input type="text" name="phone" value="{{ old('phone') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent"
                        placeholder="+7 (XXX) XXX-XX-XX">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Сайт</label>
                    <input type="url" name="website" value="{{ old('website') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent"
                        placeholder="https://...">
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Широта (latitude)</label>
                    <input type="number" name="latitude" value="{{ old('latitude') }}" step="any"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent"
                        placeholder="55.751244">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Долгота (longitude)</label>
                    <input type="number" name="longitude" value="{{ old('longitude') }}" step="any"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent"
                        placeholder="37.618423">
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Изображения</h2>
            
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Главное изображение</label>
                <input type="file" name="image" accept="image/*"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                <p class="text-sm text-gray-500 mt-1">Рекомендуемый размер: 1200x800px</p>
            </div>
            
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Галерея (несколько изображений)</label>
                <input type="file" name="gallery[]" accept="image/*" multiple
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">360° изображения для VR</label>
                <input type="file" name="vr_images[]" accept="image/*" multiple
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                <p class="text-sm text-gray-500 mt-1">Загрузите панорамные 360° изображения (equirectangular). Рекомендуемый размер: 4096x2048px или выше</p>
            </div>
            
            <div class="mt-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Ссылка на внешний VR тур</label>
                <input type="url" name="vr_tour_url" value="{{ old('vr_tour_url') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent"
                    placeholder="https://...">
                <p class="text-sm text-gray-500 mt-1">Ссылка на VR тур (Matterport, Google Street View и т.д.)</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Дополнительно</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Цена от (₸)</label>
                    <input type="number" name="price_from" value="{{ old('price_from') }}" min="0" step="0.01"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Кол-во номеров (для отелей)</label>
                    <input type="number" name="rooms_count" value="{{ old('rooms_count') }}" min="0"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Порядок сортировки</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                </div>
            </div>
            
            <div class="mt-6">
                <label class="flex items-center gap-3">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                        class="w-5 h-5 text-amber-500 border-gray-300 rounded focus:ring-amber-500">
                    <span class="text-gray-700">Активно (отображается на сайте)</span>
                </label>
            </div>
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="px-8 py-3 bg-amber-500 text-white rounded-lg hover:bg-amber-600 transition-colors font-medium">
                Создать заведение
            </button>
            <a href="{{ route('admin.venues.index') }}" class="px-8 py-3 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors font-medium">
                Отмена
            </a>
        </div>
    </form>
@endsection
