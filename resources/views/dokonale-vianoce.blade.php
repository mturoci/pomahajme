@extends('layouts.base-layout')
@section('content')
    <section class="max-w-4xl mx-auto px-4 pt-16">
        <h1 class="text-4xl text-center font-bold text-secondary mb-6">Dokonalé Vianoce</h1>

        <div class="p-6 md:p-12">

            <img class="aspect-video rounded-xl overflow-hidden shadow-2xl mb-8" src="{{ asset('img/vianoce.jpg') }}"
                alt="Reklama dokonale vianoce" class="w-full h-full object-cover">

            <div class="mx-auto">
                <p class="text-lg text-secondary/90 leading-relaxed">
                    Každý z nás túži po dokonalých Vianociach. Pre niekoho sú dokonalé Vianoce o darčekoch,
                    pre iného o rodine a pre ďalšieho o jedle. My v Pomahajme.sk veríme, že dokonalé Vianoce
                    sú o pomoci druhým a rozdávaní radosti tam, kde je to najviac potrebné.
                </p>

                <p class="mt-12 text-lg font-normal text-secondary text-center">
                    Sledujte náš projekt
                    <a href="https://www.facebook.com/pomahajme.sk/" target="_blank" rel="noopener"
                        class="inline-flex items-center gap-3 ml-2 text-primary hover:text-primary/80 transition-colors">
                        <span>na Facebooku</span>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                        </svg>
                    </a>
                </p>
            </div>
        </div>
    </section>
@endsection
