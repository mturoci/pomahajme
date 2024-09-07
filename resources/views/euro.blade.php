@extends('layouts.base-layout')
@push('styles')<link href="{{ mix('css/euro.css') }}" rel="stylesheet">@endpush
@section('content')
  <section class="euro p-2">
    <video autoplay muted loop>
      <source src="{{ asset('videos/euro-nadeje.mp4') }}" type="video/mp4">
      Váš prehliadač nepodporuje video.
    </video>
    <div class="euro__main">
        <img class="euro__image m-1" src="{{ asset('img/euro-nadeje.jpg')}}" alt="Hlavný obrázok príbehu">
        <div>
          <h1 class="euro__title ml-1 mb-1 mr-1">EURO Nádeje</h1>
          <p class="euro__content font-size-2 mr-1 ml-1">
            Pomáhame detičkám už viac ako 5 rokov a našim najväčším cieľom je zriadiť na východnom Slovensku rehabilitačné centrum pre detičky,
            ktoré takúto pomoc potrebujú, no bohužiaľ si to nemôžu dovoliť. Chceme ukázať ľuďom, že pravidelným príspevkom (trvalým príkazom)
            iba jediným EUROM dokážu niekomu zmeniť život. Na začiatok by sme týmto príspevkom chceli pomáhať pravidelne rodinkám, ktoré sú v núdzi.
            Ak by sa spojilo dostatočné množstvo ľudí vedeli by sme tak prevádzkovať centrum, ktoré by sme vybudovali spoločne. Ak by Ste ešte chceli
            akékoľvek info neváhajte ma kontaktovať cez email:
            <a href="mailto:info@pomahajme.sk">info@pomahajme.sk</a>
             alebo na t.č. <a href="tel:0949 01 22 02">0949 01 22 02</a> .
          </p>
        </div>
    </div>
  </section>

@endsection
