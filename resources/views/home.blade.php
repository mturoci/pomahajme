@extends('layouts.base-layout')
@section('content')
<section class="stories">
  @foreach ($stories as $story)
  <article class="story">
    <a href="/pribehy/{{ $story->id }}">
      <img class='story__img' src="{{ asset('story_images/'.explode('|', $story->serializedImageLocations)[0]) }}"
        alt="náhľad príbehu">
      <div class="p-2">
        <h2 class="story__title">{{ $story->title }}</h2>
        <p class="story__content">{{ strip_tags($story->content) }}</p>
      </div>
    </a>
  </article>
  @endforeach
</section>
{{ $stories->onEachSide(2)->links()}}
<div id="fb-root"></div>
<div id="fb-customer-chat" class="fb-customerchat" page_id='1548451518729042' attribution='page_inbox'></div>
@push('scripts')
<script crossorigin="anonymous" src="https://connect.facebook.net/sk_SK/sdk.js"></script>
<script src="{{ mix('js/messenger.js') }}"></script>
@endpush

@endsection