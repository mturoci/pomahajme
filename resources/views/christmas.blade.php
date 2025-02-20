@extends('layouts.base-layout')
@section('content')
<section class="max-w-4xl mx-auto px-4 py-8 text-center text-secondary">
  <img src="{{ asset('img/vianoce.jpg')}}" 
       alt="Reklama dokonale vianoce"
       class="max-w-full rounded-lg shadow-lg">
       
  <p class="mt-8 text-lg">
    Pre viac info navštívte
    <a href="https://www.facebook.com/pomahajme.sk/" 
       target="_blank" 
       rel="noopener"
       class="text-primary font-semibold hover:text-primary/80 transition-colors">
      náš facebook
    </a>.
  </p>
</section>
@endsection 