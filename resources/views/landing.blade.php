@extends('layouts.base-layout')

@section('content')
<section class="landing">
  <div class="text-container">
    <h1 class="mt-1">Vyčarme spoločne úsmev na perách aj tým menej šťastným</h1>
    <div class="stats mb-1">
      <article class="p-1">
        <strong id='stories'></strong>
        <p>Príbehov</p>
      </article>
      <article class="p-1">
        <strong id='donors'></strong>
        <p>Dobrých ľudí</p>
      </article>
      <article class="p-1">
        <strong id='raised'></strong>
        <p>Vyzbieraných eur</p>
      </article>
    </div>
    <a href="/pribehy"><button class="mb-1">Začať pomáhať.</button></a>
  </div>

  <picture>
    <source srcSet={{ asset('img/landing.avif') }} type="image/avif" />
    <source srcSet={{ asset('img/landing.webp') }} type="image/webp" />
    <img height="450" decoding="async" src={{ asset('img/landing.jpg')}} alt="Disabled young girl after surgery." />
  </picture>
</section>

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