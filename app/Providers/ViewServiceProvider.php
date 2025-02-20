<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        View::composer('layouts.base-layout', function ($view) {
            $partners = [
                (object) ['url' => 'https://www.mynidum.sk/', 'logo' => 'nidum.svg'],
                (object) ['url' => 'https://insempre.sk/', 'logo' => 'insempre.png'],
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
                (object) ['url' => 'https://vysokofrekvencnaterapia.zombeek.sk', 'logo' => 'vysokofrekvencnaterapia.png'],
            ];

            $awards = [(object) ['url' => 'https://www.zlatafirma.eu', 'logo' => 'zlata-firma.png']];

            $view->with(compact('partners', 'awards'));
        });
    }
}
