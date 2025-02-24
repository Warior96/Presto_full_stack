<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="xxx">
    <meta name="keywords" content="xxx, yyy, zzz">
    <meta name="author" content="xxx">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="xxx.ico" type="image/x-icon">

    <title>
        @if (Route::currentRouteName() == 'index')
             Homepage
        @endif
    </title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- CDN -->
    <!-- link google fonts  -->

    <!-- link CSS AOS -->
    {{-- <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> --}}
    <!-- link Swiper -->
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" /> --}}
</head>

<body>

    <!--  description: argomento della pagina -->
    <!--  keywords: parole chiave per SEO -->
    <!--  author: nome autore -->
    <!--  icon: icona del sito nella scheda broswer: favicon.ico -->
    <!--  title: titolo della pagina visuallizzato in piccolo nella scheda broswer -->
    <!--  inseririre link Google Fonts -->


    <x-navbar />


    {{ $slot }}



    <x-footer />
    <!-- CDN JavaScript -->
    <!-- script AOS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <!-- script fontAwsome -->
    <script src="https://kit.fontawesome.com/141c05eb74.js" crossorigin="anonymous"></script>

    <!-- link cdn Swiper-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</body>

</html>