@extends('layouts.base-layout')

@section('content')
    <div class="landing text-center">
        <h1 class="mt-1">Vyčarme spoločne úsmev na perách aj tým menej šťastným.</h1>
        <section class="stats mt-1">
            <div class="p-1">
                <h1 id='stories'></h1>
                <p>Príbehov</p>
            </div>
            <div class="p-1">
                <h1 id='donors'></h1>
                <p>Dobrých ľudí</p>
            </div>
            <div class="p-1">
                <h1 id='raised'></h1>
                <p>Vyzbieraných eur</p>
            </div>
        </section>
        <a href="/pribehy" class="btn">Začať pomáhať.</a>
    </div>

    <script>
        const periodicallyUpdate = (id, count) => {
            const selector = document.getElementById(id)
            const step = count < 50 ? 1 : Math.floor(count / 100 * 2)
            const f = i => {
                selector.innerHTML = i
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
