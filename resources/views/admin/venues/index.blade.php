@extends('layouts.admin')

@section('title', 'Заведения')
@section('page-title', 'Управление заведениями')

@section('content')
    <div class="mb-6 flex justify-between items-center">
        <p class="text-gray-600">Всего заведений: {{ $venues->total() }}</p>
        <a href="{{ route('admin.venues.create') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-amber-500 text-white rounded-lg hover:bg-amber-600 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Добавить заведение
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900">Заведение</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900">Тип</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900">Бренд</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900">Адрес</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900">VR</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900">Статус</th>
                    <th class="px-6 py-4 text-right text-sm font-semibold text-gray-900">Действия</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($venues as $venue)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-4">
                                <img src="{{ $venue->image_url }}" alt="{{ $venue->name }}" class="w-12 h-12 rounded-lg object-cover" referrerpolicy="no-referrer">
                                <div>
                                    <p class="font-semibold text-gray-900">{{ $venue->name }}</p>
                                    <p class="text-sm text-gray-500">{{ Str::limit($venue->short_description, 50) }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 text-sm rounded-full {{ $venue->type === 'hotel' ? 'bg-blue-100 text-blue-700' : 'bg-orange-100 text-orange-700' }}">
                                {{ $venue->type === 'hotel' ? 'Отель' : 'Ресторан' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-gray-700">{{ $venue->brand ?? '—' }}</td>
                        <td class="px-6 py-4 text-gray-700">{{ Str::limit($venue->address, 30) }}</td>
                        <td class="px-6 py-4">
                            @if($venue->vr_images || $venue->vr_tour_url)
                                <span class="text-green-600">✓</span>
                            @else
                                <span class="text-gray-400">—</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            @if($venue->is_active)
                                <span class="px-3 py-1 text-sm bg-green-100 text-green-700 rounded-full">Активно</span>
                            @else
                                <span class="px-3 py-1 text-sm bg-gray-100 text-gray-700 rounded-full">Скрыто</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('venues.show', $venue->slug) }}" target="_blank" class="p-2 text-gray-400 hover:text-gray-600" title="Просмотр">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </a>
                                <a href="{{ route('admin.venues.edit', $venue) }}" class="p-2 text-blue-400 hover:text-blue-600" title="Редактировать">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </a>
                                <form action="{{ route('admin.venues.destroy', $venue) }}" method="POST" class="inline" onsubmit="return confirm('Удалить это заведение?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 text-red-400 hover:text-red-600" title="Удалить">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-12 text-center text-gray-500">
                            <p class="mb-4">Заведения не найдены</p>
                            <a href="{{ route('admin.venues.create') }}" class="text-amber-500 hover:underline">Добавить первое заведение</a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($venues->hasPages())
        <div class="mt-6">
            {{ $venues->links() }}
        </div>
    @endif
@endsection
