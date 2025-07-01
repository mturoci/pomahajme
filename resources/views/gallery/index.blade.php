@extends('layouts.base-layout')

@section('content')
    <div class="max-w-7xl mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-center text-white mb-8">Galéria fotografií</h1>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach ($campaigns as $campaign)
                <a href="{{ url('/galeria/' . $campaign->id) }}" class="block group">
                    <div class="rounded-lg overflow-hidden shadow bg-white/10 backdrop-blur-sm hover:shadow-md transition-all duration-300">
                        <div class="h-64 relative overflow-hidden">
                            @if ($campaign->thumbnail)
                                <img src="{{ asset($campaign->thumbnail) }}" 
                                     alt="{{ $campaign->title }}" 
                                     class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                                
                                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                                
                                <div class="absolute inset-x-0 bottom-0 p-4">
                                    <h3 class="text-xl font-semibold text-white group-hover:text-primary transition-colors">
                                        {{ $campaign->title }}
                                    </h3>
                                </div>
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gray-200">
                                    <span class="text-gray-400">Žiadna fotka</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $campaigns->onEachSide(2)->links('pagination') }}
        </div>
    </div>
@endsection