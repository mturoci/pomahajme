@extends('layouts.base-layout')
@section('content')
    <div class="max-w-4xl mx-auto px-4 py-8">
        <form method="POST" class="bg-secondary space-y-6 text-gray-600 rounded-lg shadow-lg p-6" 
              enctype="multipart/form-data" action="{{ $method == 'PUT' ? '/admin/albums/edit' : '/admin/album' }}">
            @csrf
            @if($method == 'PUT')
                @method('POST')
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="id" value="{{ $album->id }}">
            @endif
            
            <h2 class="text-2xl font-bold text-tertiary">{{ $title }}</h2>
            
            @if ($errors->any())
                <div class="bg-danger-light text-danger p-4 rounded mb-4">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif
            
            <div class="grid grid-cols-1 gap-6">
                <label class="block">
                    <span class="font-medium">Názov albumu</span>
                    <input type="text" name="title" class="mt-1 block w-full rounded-md" 
                           value="{{ $album->title ?? '' }}" required
                           oninvalid="this.setCustomValidity('Pole názov je povinné.')" 
                           oninput="this.setCustomValidity('')">
                </label>
                
                <label class="block">
                    <span class="font-medium">Dátum</span>
                    <input type="date" name="campaign_date" class="mt-1 block w-full rounded-md" 
                           value="{{ $album->campaign_date ? $album->campaign_date->format('Y-m-d') : '' }}" required
                           oninvalid="this.setCustomValidity('Pole dátum je povinné.')" 
                           oninput="this.setCustomValidity('')">
                </label>
                
                <label class="block">
                    <span class="font-medium">Popis albumu</span>
                    <textarea name="description" rows="4" class="mt-1 block w-full rounded-md">{{ $album->description ?? '' }}</textarea>
                </label>
                
                <label class="block">
                    <span class="font-medium">Náhľadový obrázok</span>
                    <input type="file" name="thumbnail" class="mt-1 block w-full" accept="image/*">
                    @if($album->thumbnail ?? false)
                        <div class="mt-2">
                            <p class="text-sm">Aktuálny náhľad:</p>
                            <img src="{{ asset($album->thumbnail) }}" class="mt-1 h-32 object-cover rounded" alt="Thumbnail">
                        </div>
                    @endif
                </label>
            </div>
            
            <div class="flex justify-between pt-4">
                <a href="/admin/albums" class="block">
                    <button type="button" class="bg-gray-200 hover:bg-gray-300 text-gray-800">Zrušiť</button>
                </a>
                <button type="submit" class="bg-success hover:bg-success/90 text-success-text">{{ $btn }}</button>
            </div>
        </form>
    </div>
@endsection