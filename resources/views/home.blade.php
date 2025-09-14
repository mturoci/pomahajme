@extends('layouts.base-layout')
@section('content')
    <section class="max-w-7xl mx-auto px-4 py-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($stories as $story)
                <article
                    class="bg-secondary relative rounded-lg shadow-lg overflow-hidden transform hover:scale-105 transition-transform duration-300">
                    @if ($story->is_finished)
                        <div
                            class="absolute top-1 right-1 bg-green-500 text-green-700 flex gap-2 px-2 py-1 rounded-md font-medium">
                            Ukončené
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </div>
                    @endif
                    <a href="/pribehy/{{ $story->id }}" class="block h-full">
                        <img class='h-48 w-full object-cover'
                            src="{{ asset('story_images/' . explode('|', $story->serializedImageLocations)[0]) }}"
                            alt="náhľad príbehu">
                        <div class="p-4">
                            <h2 class="text-xl font-bold text-tertiary -mt-1 mb-2">{{ $story->title }}</h2>
                            <p class="text-text line-clamp-4">{{ html_entity_decode(strip_tags($story->content)) }}</p>
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
