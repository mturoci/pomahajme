@extends('layouts.base-layout')
@push('meta')
    <title>{{ $story->title }}</title>
    <meta content="{{ $story->title }}" property="title" />
    <meta content="{{ strip_tags($story->content, 'br') }}" property="description" />
    <meta content="{{ $story->title }}" property="og:title" />
    <meta content="{{ strip_tags($story->content, 'br') }}" property="og:description" />
    <meta content={{ 'https://pomahajme.sk/pribehy/' . $story->id }}} property="og:url" />
    <meta content={{ 'https://pomahajme.sk/images/' . $story->serializedImageLocations[0] }} property="og:image" />
    <meta content="article" property="og:type" />
    <meta content="1119182411925760" property="fb:app_id" />
    <script defer crossorigin="anonymous"
        src="https://connect.facebook.net/sk_SK/sdk.js#xfbml=1&version=v12.0&appId=1119182411925760&autoLogAppEvents=1"
        nonce="41WSpN1a"></script>
    <script defer src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
        integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
    <script defer type="text/javascript" src="https://mapi.trustpay.eu/mapi5/Scripts/TrustPay/popup.js"></script>
@endpush
@section('content')
    <div id="fb-root"></div>
    <iframe id="TrustPayFrame" src={{ $paymentUrl }}></iframe>
    <article class="max-w-7xl mx-auto px-4 py-8">
        <div class="bg-secondary rounded-lg shadow-lg overflow-hidden">
            <div class="flex flex-col lg:flex-row">
                <div class="lg:w-72 p-6 space-y-4">
                    <img class="story__image m-1" src="{{ asset('story_images/' . $story->serializedImageLocations[0]) }}"
                        alt="Hlavný obrázok príbehu">
                    <div class="fb-share-button h-7" data-href="{{ Request::url() }}" data-layout="button_count"></div>

                    @if ($story->reference)
                        <div class="space-y-2">
                            <h3 class="font-bold text-gray-500">Variabilný symbol</h3>
                            <p class="text-primary font-bold text-xl">{{ $story->reference }}</p>
                        </div>
                    @endif
                </div>

                <div class="flex-1 p-6">
                    <h1 class="text-tertiary mt-0.5">{{ $story->title }}</h1>
                    <div class="text-text leading-8 prose max-w-full">
                        {!! $story->content !!}
                    </div>

                    <a href="https://ib.fio.sk/ib/transparent?a=2201942423" target="_blank" rel="noopener"
                        class="block w-40 text-center mx-auto mt-8 mb-4 font-black">
                        CHCEM POMÔCŤ
                    </a>

                    <div class="grid gap-5 responsive-grid">
                        @foreach ($story->serializedImageLocations as $img)
                            <img src={{ asset('story_images/' . $img) }} alt={{ 'Ďalší obrázok ' . $loop->index }}
                                class='story__image' />
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </article>
@endsection
