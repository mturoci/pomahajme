@extends('layouts.base-layout')
@push('styles')<link href="{{ mix('css/contact.css') }}" rel="stylesheet">@endpush
@section('content')
  <section class="contact p-2">
    <div class="contact__tile text-center p-1 m-1">
      @include('icons.contact')
      <h2 class="mb-1">OZ Podaj Pomoc</h2>
      <div class="text-left">
        <p>Okružná 142, 08212 Kapušany</p>
        <p>IČO: 53358066</p>
        <p>MV SR, číslo spisu: VVS/1-900/90-60082</p>
        <p>Tomáš Berka zakladateľ a predseda o.z.</p>
        <a href="mailto:info@pomahajme.sk">info@pomahajme.sk</a>
        <a href="tel:0949 01 22 02">0949 01 22 02</a>
        <a href="https://ib.fio.sk/ib/transparent?a=2201942415" target="_blank" rel="noopener">SK41 8330 0000 0022 0194 2423</a>
      </div>
    </div>
    <div class="contact__tile text-center p-1 m-1">
      @include('icons.cooperation')
      <h2 class="mb-1">Spolupráca</h2>
      <p>V záujme pomoci čo najväčšiemu počtu ľudí je potrebné, aby sa rozrástol aj náš tím.
        Neustále hľadáme nových ľudí, ktorí chcú venovať štipku svojho času pre dobrú vec.
        Ak teda máš záujem pomôcť, no nevieš ako, neváhaj nás kontaktovať na info@pomahajme.sk.
        Môžeš pomôcť napríklad s overovaním príbehov, údržbou stránky alebo jednoduchým zdieľaním.
        V prípade firiem taktiež neustále hľadáme sponzorov, ktorí by nám radi pomohli.</p>
    </div>
    <div class="contact__tile text-center p-1 m-1">
      @include('icons.about-us')
      <h2 class="mb-1">O nás</h2>
      <p>Sme mladý tím ľudí, ktorí sa rozhodli, že vo svojom voľnom čase budú pomáhať ľuďom,
        ktorí mali v živote menej štastia než my a sú odkázaní na pomoc druhých.
        Cieľom tohto projektu je teda poskytnúť pomoc (či už finančnú alebo materiálnu napr.
        formou zaslania nepotrebných starých vecí). Vierohodnosť je overovaná našim tímom.
        Náš portál nestrháva žiadne poplatky za poskytnutú pomoc ako to môže byť zvykom.
        Veríme, že nezištná pomoc je tá jediná správna pomoc.</p>
    </div>
  </section>
@endsection