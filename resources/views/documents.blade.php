@extends('layouts.base-layout')
@section('content')
<div class="max-w-2xl mx-auto px-4 py-12">
  <h1 class="text-3xl font-bold text-secondary text-center mb-8">Dokumenty</h1>
  <div class="space-y-4">
    @php
      $documents = [
        [
          'url' => '/files/vyrocna_sprava_2024.docx',
          'title' => 'Výročná správa 2024',
        ],
        [
          'url' => '/files/vyrocna_sprava_2023.docx',
          'title' => 'Výročná správa 2023',
        ],
        [
          'url' => '/files/vyrocna_sprava_2022.docx',
          'title' => 'Výročná správa 2022',
        ],
        [
          'url' => '/files/pomahajme_2_percenta.pdf',
          'title' => 'Formulár na 2%',
        ],
      ];
    @endphp

    @foreach($documents as $doc)
      <a href="{{ $doc['url'] }}" 
         download
         class="group block bg-white/5 hover:bg-white/10 rounded-lg p-4 transition-all
                border border-white/10 hover:border-primary/30">
        <div class="flex items-center gap-8">
          <div class="w-12 h-12 flex items-center justify-center rounded-lg 
                      bg-primary/10 text-primary group-hover:scale-110 transition-transform">
 
          <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
          </svg>
          </div>
          <div class="flex-grow">
            <h2 class="text-lg font-normal text-secondary group-hover:text-primary transition-colors mb-0">
              {{ $doc['title'] }}
            </h2>
          </div>
          <div class="text-secondary/60 group-hover:text-primary transition-colors pt-3">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
            </svg>
          </div>
        </div>
      </a>
    @endforeach
  </div>
</div>
@endsection
