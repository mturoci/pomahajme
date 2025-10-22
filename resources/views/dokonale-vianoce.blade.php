@extends('layouts.base-layout')
@section('content')
    <section class="max-w-4xl mx-auto px-4 pt-16">
        <h1 class="text-4xl text-center font-bold text-secondary mb-6">Dokonalé Vianoce</h1>

        <img class="rounded-xl overflow-hidden shadow-2xl mb-8" src="{{ asset('img/dokonale_vianoce.jpg') }}"
            alt="Reklama dokonale vianoce" class="w-full h-full object-cover">
        <section class="px-4 py-8 text-secondary space-y-8">
            <div>
                <h2 class="text-2xl font-bold mb-4">O nás</h2>
                <p class="leading-relaxed">
                    Občianske združenie OZ Podaj Pomoc vzniklo s cieľom pomáhať chorým detičkám a rodinám v
                    ťažkých životných situáciách. Veríme, že aj malá pomoc môže priniesť veľkú zmenu. Naša
                    činnosť sa zameriava na konkrétnu a adresnú pomoc – či už formou materiálnej podpory,
                    finančnej zbierky alebo osobnej návštevy.
                </p>
            </div>
            <div>
                <h2 class="text-2xl font-bold mb-4">O projekte Dokonalé Vianoce</h2>
                <p class="leading-relaxed">
                    Projekt Dokonalé Vianoce vznikol v roku 2020 s myšlienkou priniesť pravé čaro Vianoc tým,
                    ktorí to najviac potrebujú a nemôžu si to dovoliť. Každý rok navštívime 10/12 rodín z
                    rôznych kútov Slovenska, ktoré sa ocitli v náročnej životnej situácii, tj. rodiny s ťažko
                    chorými deťmi, osamelé matky, či rodiny v hmotnej núdzi. Naším cieľom je, aby aj tieto
                    rodiny zažili chvíle pokoja, radosti a spolupatričnosti.
                </p>
            </div>
            <div>
                <h2 class="text-2xl font-bold mb-4">Ako to funguje</h2>
                <p class="leading-relaxed">
                    Každý december vyrážame so svojím tímom a krásne vyzdobeným vianočným
                    autom naprieč
                    Slovenskom. Tento rok navštívime 12 rodín.
                    Každú z nich osobne navštívime a prinesieme darčeky, potraviny, kozmetiku, oblečenie a
                    hlavne úsmev a radosť. Naša pomoc je adresná – poznáme každú rodinu, ktorú podporujeme,
                    a snažíme sa naplniť ich konkrétne potreby.
                    Vďaka partnerom a darcom, tak spoločne vytvárame nezabudnuteľné chvíle pre tých, ktorí to
                    potrebujú najviac.
                </p>
            </div>
            <div>
                <h2 class="text-2xl font-bold mb-4">Prečo sa zapojiť ako partner</h2>
                <p class="leading-relaxed">
                    Staňte sa súčasťou projektu, ktorý má skutočný zmysel. Vaša podpora pomáha meniť životy
                    rodín a prináša úsmev tam, kde ho často už niet.
                    Spoluprácou s nami získate aj možnosť charitatívnej reklamy – vaše logo bude súčasťou
                    našich materiálov, webu a sociálnych sietí. Navyše, naša zmluva o dare, či už finančnom
                    alebo
                    materiálnom, dokonca aj o charitatívnej reklame, vám umožní zahrnúť podporu do daňových
                    odpisov.
                </p>
            </div>
            <div>
                <h2 class="text-2xl font-bold mb-4">Ako nás môžete podporiť</h2>
                <p class="leading-relaxed">
                    Pomôcť môžete niekoľkými spôsobmi:
                <p>
                <ol class="list-decimal pl-5 space-y-2 my-4">
                    <li>Finančne – formou finančného príspevku na náš projekt</li>
                    <li>Materiálne – hračky, potraviny, oblečenie, kozmetika, domáce potreby</li>
                    <li>Spoluprácou – mediálne, logisticky, či formou služieb</li>
                </ol>
                <p>
                    Každý dar, malý či veľký, má pre nás obrovskú hodnotu. Všetkým partnerom poskytujeme
                    darovaciu zmluvu alebo zmluvu o charitatívnej reklame.
                </p>
            </div>
        </section>
        <video controls>
            <source src="{{ asset('videos/vianoce.mp4') }}" type="video/mp4">
            Váš prehliadač nepodporuje video.
        </video>

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


    </section>
@endsection
