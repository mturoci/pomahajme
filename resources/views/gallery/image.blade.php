@extends('layouts.base-layout')

@section('content')
    <div class="max-w-full">
        <!-- Main container with image and metadata -->
        <div class="flex flex-col md:flex-row h-screen">
            <!-- Image section (fills most of the screen) -->
            <div class="relative flex-grow bg-black md:w-3/4">
                <div class="absolute inset-0 flex justify-center items-center">
                    <img src="{{ asset($image->image_path) }}" 
                         alt="{{ $image->title ?? $campaign->title }}" 
                         class="max-w-full max-h-full object-contain">
                </div>
                
                <div class="absolute inset-y-0 left-0 flex items-center">
                    @if ($prevImage)
                        <a href="{{ url('/galeria/' . $campaign->id . '/image/' . $prevImage->id) }}" 
                           class="bg-black/30 hover:bg-black/60 transition-colors text-white p-3 rounded-r-lg focus:outline-none focus:ring-2 focus:ring-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                            <span class="sr-only">Predchádzajúci obrázok</span>
                        </a>
                    @endif
                </div>
                
                <div class="absolute inset-y-0 right-0 flex items-center">
                    @if ($nextImage)
                        <a href="{{ url('/galeria/' . $campaign->id . '/image/' . $nextImage->id) }}" 
                           class="bg-black/30 hover:bg-black/60 transition-colors text-white p-3 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                            <span class="sr-only">Ďalší obrázok</span>
                        </a>
                    @endif
                </div>
            </div>
            
            <div class="md:w-1/4 bg-white/10 backdrop-blur-sm p-6 overflow-y-auto">
                <div class="mb-2 flex items-center">
                    <a href="{{ url('/galeria/' . $campaign->id) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <h1 class="text-2xl m-0 font-bold text-white">{{ $image->title ?? 'Fotografia' }}</h1>

                </div>
                @if ($image->description)
                    <p class="text-gray-200 ml-6">{{ $image->description }}</p>
                @endif
                <div class="flex items-center mt-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd" />
                    </svg>
                    <span class="text-gray-100 mr-2">Album:</span>
                    <a href="{{ url('/galeria/' . $campaign->id) }}" class="text-primary hover:underline">
                        {{ $campaign->title }}
                    </a>
                </div>
                
                <div class="flex items-center mt-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                    </svg>
                    <span class="text-gray-200">{{ $campaign->campaign_date->format('d.m.Y') }}</span>
                </div>
                
            </div>
        </div>
    </div>
@endsection