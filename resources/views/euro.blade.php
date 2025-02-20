@extends('layouts.base-layout')
@section('content')
    <article class="max-w-4xl mx-auto px-4 pt-16">
        <header class="text-center mb-12">
            <h1 class="text-4xl font-bold text-secondary mb-4">Euro nádeje</h1>
            <p class="text-xl text-secondary/80 max-w-2xl mx-auto">
                Malý príspevok, ktorý dokáže zmeniť život
            </p>
        </header>


        <div class="aspect-video rounded-xl overflow-hidden relative bg-black/5">
            <video autoplay muted loop>
                <source src="{{ asset('videos/euro-nadeje.mp4') }}" type="video/mp4">
                Váš prehliadač nepodporuje video.
            </video>
        </div>

        <article class="w-full mt-12 mx-auto space-y-6 text-lg text-secondary/90 leading-relaxed">
            <p>
                Pomáhame detičkám už viac ako 5 rokov a našim najväčším cieľom je zriadiť na východnom
                Slovensku rehabilitačné centrum pre detičky, ktoré takúto pomoc potrebujú, no bohužiaľ
                si to nemôžu dovoliť.
            </p>

            <p>
                Chceme ukázať ľuďom, že pravidelným príspevkom (trvalým príkazom) iba jediným EUROM
                dokážu niekomu zmeniť život. Na začiatok by sme týmto príspevkom chceli pomáhať pravidelne
                rodinkám, ktoré sú v núdzi.
            </p>

            <p>
                Ak by sa spojilo dostatočné množstvo ľudí, vedeli by sme tak prevádzkovať centrum,
                ktoré by sme vybudovali spoločne.
            </p>

            <img src="{{ asset('img/euro-nadeje.jpg') }}" alt="Euro nadeje plagat">
            <div class="pt-4">
                <h2 class="font-medium text-center mb-2">Máte otázky? Kontaktujte nás</h2>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4 text-primary">
                    <a href="mailto:info@pomahajme.sk"
                        class="inline-flex items-center gap-2 hover:text-primary/80 transition-colors">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        info@pomahajme.sk
                    </a>
                    <a href="tel:0949012202" class="inline-flex items-center gap-2 hover:text-primary/80 transition-colors">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        0949 012 202
                    </a>
                </div>
            </div>
        </article>

    </article>
@endsection
