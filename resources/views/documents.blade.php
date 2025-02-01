@extends('layouts.base-layout')
@push('styles')<link href="{{ mix('css/documents.css') }}" rel="stylesheet">@endpush
@section('content')
<ul class="documents__list">
  <li>
    <a href="/files/vyrocna_sprava_2024.docx" download>Výročná správa 2024</a>
  </li>
  <li>
    <a href="/files/vyrocna_sprava_2023.docx" download>Výročná správa 2023</a>
  </li>
  <li>
    <a href="/files/vyrocna_sprava_2022.docx" download>Výročná správa 2022</a>
  </li>
  <li>
    <a href="/files/pomahajme_2_percenta.pdf" download>Formulár na 2%</a>
  </li>
</ul>
@endsection
