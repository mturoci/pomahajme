<!DOCTYPE html>
<html lang="sk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Stránka zameraná na zbierku peňazí pre rodiny s chorými deťmi, ktoré majú finančné ťažkosti.">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @stack('meta')
    <title>Pomahajme.sk</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"
        as="style" onload="this.onload=null;this.rel='stylesheet'" />
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    @stack('styles')
    @stack('scripts')
</head>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-T5TX4P5G8Z"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'G-T5TX4P5G8Z');
</script>

<body class="flex flex-col min-h-screen bg-gradient-primary font-sans text-secondary">
    <header class="bg-white/5 backdrop-blur-sm sticky top-0 z-50 border-b border-white/10">
        <div class="max-w-7xl mx-auto px-4 relative">
            <div class="flex items-center justify-between h-nav">
                <a href='/' aria-label='logo' class="flex-shrink-0">
                    @include('icons.logo')
                </a>

                <button id="menu" class="md:hidden p-2 hover:bg-white/10 rounded-lg transition-colors">
                    <span class="sr-only">Mobile menu</span>
                    @include('icons.menu')
                </button>

                <nav id="nav"
                    class="fixed md:static inset-y-0 left-0 w-3/4 md:w-auto transform -translate-x-full md:translate-x-0
                            md:bg-transparent transition-all duration-300 ease-in-out md:transition-none
                            shadow-2xl md:shadow-none">
                    <ul
                        class="flex bg-gradient-primary h-[100vh] md:h-auto md:bg-none flex-col md:flex-row items-stretch md:items-center space-y-1 md:space-y-0 md:space-x-2 p-6 md:p-0">
                        @php
                            $navItems = [
                                ['url' => '/pribehy', 'text' => 'Príbehy'],
                                ['url' => '/galeria', 'text' => 'Galéria'],
                                ['url' => '/euro-nadeje', 'text' => 'Euro nádeje'],
                                ['url' => '/dokonale-vianoce', 'text' => 'Dokonalé Vianoce'],
                                ['url' => '/o-nas', 'text' => 'O nás'],
                                ['url' => '/dokumenty', 'text' => 'Dokumenty'],
                            ];
                        @endphp

                        @foreach ($navItems as $item)
                            @php
                                $isActive = request()->is(trim($item['url'], '/'));
                            @endphp
                            <li>
                                <a href="{{ $item['url'] }}"
                                    class="block px-4 py-2 text-sm font-medium tracking-wide uppercase
                          {{ $isActive
                              ? 'text-primary bg-white/10 lg:bg-transparent lg:text-primary lg:after:block lg:after:h-0.5 lg:after:bg-primary lg:after:transition-transform lg:after:scale-x-100'
                              : 'text-secondary hover:text-primary hover:bg-white/5 lg:hover:bg-transparent lg:after:block lg:after:h-0.5 lg:after:bg-primary lg:after:transition-transform lg:after:scale-x-0 lg:hover:after:scale-x-100' }}
                          rounded lg:rounded-none transition-all">
                                    {{ $item['text'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </nav>

                <a href="https://www.facebook.com/pomahajme.sk/" target="_blank" rel="noopener"
                    class="hidden md:block text-secondary hover:text-primary p-2 hover:bg-white/10 rounded-lg transition-all flex-shrink-0"
                    aria-label="odkaz na facebookovú stránku">
                    @include('icons.fb')
                </a>
            </div>
        </div>
    </header>

    <main class="flex-grow">
        @yield('content')
    </main>

    <footer class="backdrop-blur-sm mt-32 py-12 max-w-7xl mx-auto px-6 lg:px-8">
        @php
            $partners = [
                (object) ['url' => 'https://www.mynidum.sk/', 'logo' => 'nidum.svg'],
                (object) ['url' => 'https://www.chiptuningpro.sk/', 'logo' => 'chiptuningpro.png'],
                (object) ['url' => 'https://www.mojadm.sk/', 'logo' => 'dm.png'],
                (object) ['url' => 'https://fitshaker.sk/', 'logo' => 'fitshaker.svg'],
                (object) ['url' => 'https://www.golftatry.sk/', 'logo' => 'blackstorck.svg'],
                (object) ['url' => 'https://www.trustpay.sk/', 'logo' => 'trustpay.svg'],
                (object) ['url' => 'https://www.facebook.com/progress.truskavets', 'logo' => 'progress.png'],
                (object) ['url' => 'https://www.lconsultingsk.sk/', 'logo' => 'lconsulting.png'],
                (object) ['url' => 'https://novumpresov.sk/', 'logo' => 'novum.svg'],
                (object) ['url' => 'https://delfinoterapiask.eu/', 'logo' => 'delfinoterapia.png'],
                (object) ['url' => 'https://eshop.rdmgaraz.sk/', 'logo' => 'rdm.png'],
                (object) ['url' => 'https://www.macosro.sk/', 'logo' => 'maco.png'],
                (object) ['url' => 'http://pkauto.sk/', 'logo' => 'pkauto.svg'],
                (object) [
                    'url' => 'https://www.facebook.com/people/Centrum-V%C3%B4%C4%BEa-%C5%BEi%C5%A5/100079550524517',
                    'logo' => 'volazit.png',
                ],
                (object) [
                    'url' => 'https://vysokofrekvencnaterapia.zombeek.sk',
                    'logo' => 'vysokofrekvencnaterapia.png',
                ],
            ];

            $awards = [(object) ['url' => 'https://www.zlatafirma.eu', 'logo' => 'zlata-firma.png']];
        @endphp
        <h2 class="text-center text-white text-4xl font-semibold">Partneri</h2>
        <div class="flex flex-wrap gap-8 mt-8">
            @foreach ($partners as $p)
                <a href={{ $p->url }} target="_blank" rel="noopener" class="hover:opacity-80 transition-opacity">
                    <img class="min-h-[50px] max-h-[50px] object-contain w-auto" src={{ asset('img/' . $p->logo) }}
                        alt={{ $p->url }} />
                </a>
            @endforeach
        </div>


        <div class="grid grid-cols-1 gap-10 mt-40 lg:grid-cols-3">
            <div class='flex flex-col justify-between'>
                <section>
                    <h2 class="text-pretty text-4xl font-semibold tracking-tight text-white">o.z. Podaj Pomoc</h2>
                    <p class="mt-4 text-base/7 text-white">MV SR, číslo spisu: VVS/1-900/90-60082</p>
                </section>
                <section class="mt-6">
                    @foreach ($awards as $a)
                        <a href={{ $a->url }} target="_blank" rel="noopener"
                            class="hover:opacity-80 transition-opacity">
                            <img class="h-12 w-auto mx-auto object-contain" src={{ asset('img/' . $a->logo) }}
                                alt={{ $a->url }} />
                        </a>
                    @endforeach
                </section>
                <p class="mt-12 font-normal">
                    {{ date('Y') }} © pomahajme.sk / Všetky práva vyhradené.
                </p>
            </div>
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:col-span-2 lg:gap-8">
                <div class="rounded-2xl bg-gray-50 p-10">
                    <h3 class="text-base/7 font-semibold text-gray-900">Zakladateľ</h3>
                    <dl class="mt-3 space-y-1 text-sm/6 text-gray-600">
                        <div>
                            <dt class="sr-only">Zakladateľ</dt>
                            <dd>Tomáš Berka</dd>
                        </div>
                        <dd>IČO: 53358066</dd>
                    </dl>
                </div>
                <div class="rounded-2xl bg-gray-50 p-10">
                    <h3 class="text-base/7 font-semibold text-gray-900">Sídlo</h3>
                    <dl class="mt-3 space-y-1 text-sm/6 text-gray-600">
                        <div>
                            <dt class="sr-only">Ulica</dt>
                            <dd>Okružná 142</dd>
                        </div>
                        <div class="mt-1">
                            <dt class="sr-only">Mesto a PSČ</dt>
                            <dd>08212 Kapušany</dd>
                        </div>
                    </dl>
                </div>
                <div class="rounded-2xl bg-gray-50 p-10">
                    <h3 class="text-base/7 font-semibold text-gray-900">Kontakt</h3>
                    <dl class="mt-3 space-y-1 text-sm/6 text-gray-600">
                        <div>
                            <dt class="sr-only">Email</dt>
                            <dd>
                                <a href="mailto:info@pomahajme.sk"
                                    class="block text-primary transition-colors">info@pomahajme.sk</a>
                            </dd>
                        </div>
                        <div class="mt-1">
                            <dt class="sr-only">Telefónny kontakt</dt>
                            <dd>
                                <a href="tel:0949 01 22 02" class="block text-primary transition-colors">+412 949 012
                                    202</a>
                            </dd>
                        </div>
                    </dl>
                </div>
                <div class="rounded-2xl bg-gray-50 p-10">
                    <h3 class="text-base/7 font-semibold text-gray-900">Bankové spojenie</h3>
                    <dl class="mt-3 space-y-1 text-sm/6 text-gray-600">
                        <div>
                            <dd>Transparentný účet</dd>
                        </div>
                        <div class="mt-1">
                            <dt class="sr-only">Transparentný účet</dt>
                            <dd>
                                <a href="https://ib.fio.sk/ib/transparent?a=2201942423" target="_blank" rel="noopener"
                                    class="block text-primary transition-colors">
                                    SK41 8330 0000 0022 0194 2423
                                </a>
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>



    </footer>

    <script>
        let isMenuOpen = false;
        document.getElementById('menu').onclick = () => {
            const nav = document.getElementById('nav');
            nav.classList.toggle('-translate-x-full', isMenuOpen);
            isMenuOpen = !isMenuOpen
        }
    </script>
</body>

</html>
