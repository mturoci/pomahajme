@extends('layouts.base-layout')
@push('styles')<link href="{{ mix('css/christmas.css') }}" rel="stylesheet">@endpush
@section('content')
  <section class='christmas'>
    <img src="{{ asset('img/vianoce.jpg')}}" alt="Reklama dokonale vianoce.">
    <p>Pre viac info navštívte
       <a href="https://www.facebook.com/pomahajme.sk/" target="_blank" rel="noopener" class="fb"
        aria-label="odkaz na facebookovú stránku">náš facebook</a>.
    </p>
  </section>
@endsection