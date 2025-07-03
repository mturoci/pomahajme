@extends('layouts.base-layout')
@section('content')
    <div class="max-w-7xl mx-auto px-4 py-8">
        <!-- Admin navigation tabs -->
        <div class="mb-6 flex border-b border-gray-200">
            <a href="/admin" class="px-6 py-3 bg-gray-100 text-gray-600 hover:bg-gray-200 rounded-t-lg font-medium">Príbehy</a>
            <a href="/admin/albums" class="px-6 py-3 bg-primary text-primary-text rounded-t-lg font-medium ml-2">Galéria</a>
        </div>
        
        <div class="bg-secondary rounded-lg shadow-lg p-6">
            @if ($message ?? null || session()->has('message'))
                <div class="bg-success-light text-success p-4 rounded mb-4">
                    {{ $message ?? session('message') }}
                </div>
            @endif

            <div class="flex justify-between items-center mb-4">
                <h1 class="text-2xl font-bold text-tertiary">Správa albumov</h1>
                <a href="/admin/album/create">
                    <button class="bg-success hover:bg-success/90 text-success-text">Pridať album</button>
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-gray-700">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Náhľad</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Názov</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dátum</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fotografie</th>
                            <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Akcie</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($albums as $album)
                            <tr class="odd:bg-white even:bg-gray-50">
                                <td class="px-6 py-4">
                                    @if ($album->thumbnail)
                                        <img src="{{ asset($album->thumbnail) }}" alt="{{ $album->title }}" class="w-16 h-16 object-cover rounded">
                                    @else
                                        <div class="w-16 h-16 bg-gray-200 flex items-center justify-center rounded">
                                            <span class="text-sm text-gray-500">No image</span>
                                        </div>
                                    @endif
                                </td>
                                <td class="px-6 py-4">{{ $album->title }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $album->campaign_date->format('d.m.Y') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $album->galleryImages->count() }} fotiek
                                </td>
                                <td class="px-6 py-4 flex items-center justify-end gap-2">
                                    <a href="/admin/albums/{{ $album->id }}/images" class="block">
                                        <button class="bg-primary hover:bg-primary/90 text-primary-text">FOTOGRAFIE</button>
                                    </a>
                                    <a href="/admin/albums/edit?id={{ $album->id }}" class="block">
                                        <button class="bg-warning hover:bg-warning/90 text-warning-text">UPRAVIŤ</button>
                                    </a>
                                    <form method="POST" action="/admin/albums/delete">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <input type="hidden" name="id" value="{{ $album->id }}">
                                        <button type="submit" onclick="return confirm('Naozaj chcete vymazať tento album? Budú vymazané aj všetky fotografie v tomto albume.');"
                                            class="bg-danger hover:bg-danger/90 text-danger-text">VYMAZAŤ</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-6 text-right">
                <a href="/admin" class="inline-block text-gray-600 hover:text-gray-800">
                    <button class="bg-gray-200 hover:bg-gray-300 text-gray-800 py-2 px-4 rounded">Späť na správu príbehov</button>
                </a>
            </div>
        </div>
    </div>
@endsection