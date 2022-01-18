@extends('layouts.base-layout')
@push('styles')
<link href="{{ mix('css/story.css') }}" rel="stylesheet">@endpush
@push('meta')
<title>{{ $story->title }}</title>
<meta content="{{ $story->title }}" property="title" />
<meta content="{{ strip_tags($story->content, 'br')}}" property="description" />
<meta content="{{ $story->title }}" property="og:title" />
<meta content="{{ strip_tags($story->content, 'br')}}" property="og:description" />
<meta content={{ 'https://pomahajme.sk/pribehy/' .$story->id }}} property="og:url" />
<meta content={{ 'https://pomahajme.sk/images/' .$story->serializedImageLocations[0] }} property="og:image" />
<meta content="article" property="og:type" />
<meta content="1119182411925760" property="fb:app_id" />
@endpush
@section('content')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous"
  src="https://connect.facebook.net/sk_SK/sdk.js#xfbml=1&version=v12.0&appId=1119182411925760&autoLogAppEvents=1"
  nonce="41WSpN1a"></script>
<article class="story p-2">
  <div class="story__main">
    <div class="story__lhs">
      <img class="story__image m-1" src="{{ asset('story_images/'.$story->serializedImageLocations[0]) }}"
        alt="Hlavný obrázok príbehu">
      <div class="text-center fb-share-button" data-href="{{ Request::url() }}" data-layout="button_count"
        data-size="large">
        <a target="_blank"
          href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::url()) }}&amp;src=sdkpreparse"
          class="fb-xfbml-parse-ignore">Zdieľať</a>
      </div>
    </div>
    <div class="story__text">
      <h1 class="story__title ml-1 mb-1 mr-1">{{ $story->title }}</h1>
      <div class="story__content font-size-2 mr-1 ml-1">{!! $story->content !!}</div>
    </div>
  </div>
  <h2 class="mt-1 mb-1">Ďalšie obrázky</h2>
  <div class="story__images">
    @foreach ($story->serializedImageLocations as $img)
    <img src={{ asset('story_images/'.$img) }} alt={{ 'Ďalší obrázok ' .$loop->index }} class='story__image' />
    @endforeach
  </div>
</article>
@endsection