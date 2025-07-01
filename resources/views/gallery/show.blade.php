@extends('layouts.base-layout')

@section('content')
    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="mb-6">
            <a href="{{ url('/galeria') }}" class="inline-flex items-center text-white hover:text-primary transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
                Späť na galériu
            </a>
        </div>

        <div class="mb-8 bg-white/10 backdrop-blur-sm rounded-lg p-6">
            <h1 class="text-3xl font-bold text-white mb-2">{{ $campaign->title }}</h1>
            <p class="text-gray-300 mb-4">{{ $campaign->campaign_date->format('d.m.Y') }}</p>
            @if ($campaign->description)
                <p class="text-gray-200">{{ $campaign->description }}</p>
            @endif
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($campaign->galleryImages as $image)
                <a href="{{ url('/galeria/' . $campaign->id . '/image/' . $image->id) }}" class="block group">
                    <div class="rounded-lg overflow-hidden shadow-xs bg-white/10 backdrop-blur-sm hover:shadow-md transition-all duration-300">
                        <div class="aspect-square relative overflow-hidden">
                            <img src="{{ asset($image->image_path) }}" 
                                 alt="{{ $image->title ?? $campaign->title }}" 
                                 class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                            
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                            
                            @if ($image->title)
                                <div class="absolute inset-x-0 bottom-0 p-3">
                                    <h3 class="text-md font-medium text-white">{{ $image->title }}</h3>
                                </div>
                            @endif
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection