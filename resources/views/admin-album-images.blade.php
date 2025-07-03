@extends('layouts.base-layout')
@section('content')
    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="bg-secondary rounded-lg shadow-lg p-6">
            @if ($message ?? null || session()->has('message'))
                <div class="bg-success-light text-success p-4 rounded mb-4">
                    {{ $message ?? session('message') }}
                </div>
            @endif

            <div class="mb-8">
                <div class="flex justify-between items-center mb-4">
                    <h1 class="text-2xl font-bold text-tertiary">{{ $album->title }} - Správa fotografií</h1>
                    <a href="/admin/albums">
                        <button class="bg-gray-200 hover:bg-gray-300 text-gray-800">Späť na albumy</button>
                    </a>
                </div>
                <div class="text-gray-700 mb-4">
                    <p>Dátum: {{ $album->campaign_date->format('d.m.Y') }}</p>
                    @if($album->description)
                        <p class="mt-2">{{ $album->description }}</p>
                    @endif
                </div>
            </div>

            <!-- Upload new images -->
            <div class="bg-white p-5 rounded-lg shadow-sm mb-8">
                <h2 class="text-xl font-semibold mb-4">Pridať nové fotografie</h2>
                <form method="POST" action="/admin/albums/{{ $album->id }}/images/upload" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2">Vyberte fotografie</label>
                        <input type="file" name="images[]" multiple accept="image/*" class="w-full" required>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="bg-success hover:bg-success/90 text-success-text">Nahrať fotografie</button>
                    </div>
                </form>
                @if ($errors->any())
                    <div class="bg-danger-light text-danger p-4 rounded mt-4">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Images gallery -->
            @if($album->galleryImages->count() > 0)
                <h2 class="text-xl font-semibold mb-4">Fotografie v albume ({{ $album->galleryImages->count() }})</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($album->galleryImages as $image)
                        <div class="bg-white rounded-lg overflow-hidden shadow-sm">
                            <img src="{{ asset($image->image_path) }}" alt="{{ $image->title }}" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <form method="POST" action="/admin/albums/{{ $album->id }}/images/{{ $image->id }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label class="block text-gray-700 text-sm mb-1">Názov</label>
                                        <input type="text" name="title" value="{{ $image->title }}" 
                                               class="w-full rounded border-gray-300" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="block text-gray-700 text-sm mb-1">Popis</label>
                                        <textarea name="description" rows="2" 
                                                  class="w-full rounded border-gray-300">{{ $image->description }}</textarea>
                                    </div>
                                    <div class="flex justify-between items-center mt-4">
                                        <button type="submit" class="bg-primary hover:bg-primary/90 text-primary-text text-xs px-3 py-1">
                                            Uložiť zmeny
                                        </button>
                                        <form method="POST" action="/admin/albums/{{ $album->id }}/images/{{ $image->id }}/delete" 
                                              class="inline" onsubmit="return confirm('Naozaj chcete vymazať túto fotografiu?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-danger hover:bg-danger/90 text-danger-text text-xs px-3 py-1">
                                                Vymazať
                                            </button>
                                        </form>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="bg-gray-100 p-8 rounded-lg text-center text-gray-600">
                    <p>Album zatiaľ neobsahuje žiadne fotografie.</p>
                    <p class="mt-2 text-sm">Použite formulár vyššie na pridanie fotografií do tohto albumu.</p>
                </div>
            @endif
        </div>
    </div>
@endsection