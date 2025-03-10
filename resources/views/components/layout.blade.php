<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="xxx">
    <meta name="keywords" content="xxx, yyy, zzz">
    <meta name="author" content="The Final Commit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>
        Emporium Shop
    </title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- CDN -->
    <!-- link google fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">
    <!-- link CSS AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>

    <!--  description: argomento della pagina -->
    <!--  keywords: parole chiave per SEO -->
    <!--  icon: icona del sito nella scheda broswer: favicon.ico -->


    <x-navbar />


    {{ $slot }}



    {{-- <x-footer /> --}}

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
