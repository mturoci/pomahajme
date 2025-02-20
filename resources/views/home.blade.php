@extends('layouts.base-layout')
@section('content')
<section class="max-w-7xl mx-auto px-4 py-8">
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
    @foreach ($stories as $story)
    <article class="bg-secondary rounded-lg shadow-lg overflow-hidden transform hover:scale-105 transition-transform duration-300">
      <a href="/pribehy/{{ $story->id }}" class="block h-full">
        <img class='h-48 w-full object-cover' 
             src="{{ asset('story_images/'.explode('|', $story->serializedImageLocations)[0]) }}"
             alt="náhľad príbehu">
        <div class="p-4">
          <h2 class="text-xl font-bold text-tertiary -mt-1 mb-2">{{ $story->title }}</h2>
          <p class="text-text line-clamp-4">{{ strip_tags($story->content) }}</p>
        </div>
      </a>
    </article>
    @endforeach
  </div>
  
  <div class="mt-8">
    {{ $stories->onEachSide(2)->links() }}
  </div>
</section>

<div id="fb-root"></div>
<div id="fb-customer-chat" class="fb-customerchat" page_id='1548451518729042' attribution='page_inbox'></div>

@push('scripts')
<script crossorigin="anonymous" src="https://connect.facebook.net/sk_SK/sdk.js"></script>
<script src="{{ mix('js/messenger.js') }}"></script>
@endpush
@endsection