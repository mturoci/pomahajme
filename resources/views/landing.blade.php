@extends('layouts.base-layout')

@section('content')
    <div class="relative isolate overflow-hidden bg-gray-900 pb-16 pt-14 sm:pb-20">
        <picture class="mt-12">
            <source srcSet={{ asset('img/landing.avif') }} type="image/avif" />
            <source srcSet={{ asset('img/landing.webp') }} type="image/webp" />
            <img class="absolute inset-0 -z-10 size-full object-cover opacity-85" decoding="async"
                src={{ asset('img/landing.jpg') }} alt="Disabled young girl after surgery." />
        </picture>
        <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
            <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-20 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
            </div>
        </div>
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl py-32 sm:py-48 lg:py-56">
                <div class="text-center">
                    <h1 class="text-balance text-5xl font-semibold tracking-tight text-white sm:text-7xl">Vyčarme spoločne
                        úsmev na perách aj tým menej šťastným</h1>
                    <div class="stats grid grid-cols-1 sm:grid-cols-3 gap-6 my-12">

                        <article class="p-4 bg-white/30 rounded-lg">
                            <strong id='stories' class="font-bold text-5xl text-primary mb-6 text-cente"></strong>
                            <p class="text-lg leading-7 text-center">Príbehov</p>
                        </article>
                        <article class="p-4 bg-white/30 rounded-lg">
                            <strong id='donors' class="font-bold text-5xl text-primary mb-6 text-cente"></strong>
                            <p class="text-lg leading-7 text-center">Dobrých ľudí</p>
                        </article>
                        <article class="p-4 bg-white/30 rounded-lg">
                            <strong id='raised' class="font-bold text-5xl text-primary mb-6 text-cente"></strong>
                            <p class="text-lg leading-7 text-center">Vyzbieraných eur</p>
                        </article>
                    </div>
                    <a href="/pribehy" class="inline-block">
                        <button
                            class="px-6 py-3 bg-primary text-white font-bold rounded-lg shadow-lg hover:bg-primary-dark transition-colors">Začať
                            pomáhať</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]"
            aria-hidden="true">
            <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-20 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
            </div>
        </div>
    </div>

    <script>
        const periodicallyUpdate = (id, count) => {
            const selector = document.getElementById(id)
            const step = count < 50 ? 1 : Math.floor(count / 100 * 2)
            const f = i => {
                selector.innerHTML = Math.trunc(i).toString()
                if (i === Math.floor(count)) return
                return requestAnimationFrame(() => f(i + step > count ? count : i + step))
            }
            requestAnimationFrame(() => f(0))
        }

        periodicallyUpdate('stories', {!! $storyCount !!})
        periodicallyUpdate('raised', {!! $raised !!})
        periodicallyUpdate('donors', {!! $donors !!})
    </script>
@endsection
