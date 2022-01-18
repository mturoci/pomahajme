<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script>window.Laravel = { csrfToken: '{{ csrf_token() }}'}</script>
        <title>Pomahajme</title>
        <meta name="description" content="Stránka je zameraná na pomoc a podporu rodinám, ktoré majú choré deti.">
        <meta name="keywords" content="pomoc, charita, deti, choroba, rakovina, obrna">
        <meta property="og:title" content="Pomahajme.sk">
        <meta property="og:url" content="http://www.pomahajme.sk/">
        <meta property="og:type" content="website" />
        <meta property="og:description" content="Stránka zameraná na pomoc a podporu rodín, ktoré majú choré deti.">
        <meta property="og:site_name" content="Pomahajme.sk">
        <meta property="og:image" content="{{ asset('/images/landingCompressed.jpg')}}">
        <meta property="og:image:type" content="image/jpeg" />
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <link href="{{ asset('/css/app.css?id=5ee7ba9a7cad1a06568b') }}" rel="stylesheet">
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-151593080-1"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-151593080-1');
        </script>
    </head>
    <body>
        <div id="app">
        <App></App>
        </div>
        <script src="{{ asset('/js/app.js?id=ce27bbe306c5a9e8ee4d') }}"></script>
    </body>
</html>
