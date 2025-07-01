@extends('layouts.base-layout')

@section('content')
    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="mb-6">
            <a href="{{ url('/galeria/' . $campaign->id) }}" class="inline-flex items-center text-white hover:text-primary transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
                Späť
            </a>
        </div>

        <div class="bg-white/10 backdrop-blur-sm rounded-lg overflow-hidden shadow-lg">
            <div class="flex flex-col md:flex-row">
                <div class="md:w-2/3 lg:w-3/4 relative">
                    <img src="{{ asset($image->image_path) }}" 
                         alt="{{ $image->title ?? $campaign->title }}" 
                         class="w-full h-auto object-contain max-h-[80vh]">
                </div>
                
                <div class="p-6 md:w-1/3 lg:w-1/4">
                    <h1 class="text-2xl font-bold text-white mb-3">{{ $image->title ?? 'Fotografia' }}</h1>
                    <h2 class="text-lg text-primary mb-4">{{ $campaign->title }}</h2>
                    <p class="text-gray-300 mb-4">{{ $campaign->campaign_date->format('d.m.Y') }}</p>
                    
                    @if ($image->description)
                        <div class="mt-4">
                            <h3 class="text-gray-300 font-medium mb-2">Popis:</h3>
                            <p class="text-gray-200">{{ $image->description }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection