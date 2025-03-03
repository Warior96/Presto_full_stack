<x-layout>
    @if (session()->has('errorMessage'))
        <div class="alert alert-danger text-center shadow rounded w-50">
            {{ session('errorMessage') }}
        </div>
        </div>
    @endif
    <header class="container-fluid bg-header pt-5 vh-100"
        style="background: linear-gradient(45deg, rgba(0, 0, 0, 0.275), rgba(0, 0, 0, 0.451)),
            url({{ asset('storage/background/header1.jpeg') }}); background-repeat: no-repeat;
            background-size: cover; background-position: center;">
        <div class="row justify-content-evenly align-items-center flex-column h-100 py-5 position-relative">

            <div class="col-12 c-2">
                <h1 class=" display-1 text-center mb-4 pb-4" data-aos="fade-down" data-aos-delay="300"
                    data-aos-duration="2000">Emporium Shop</h1>
                @auth
                    <h4 class="text-center typewriter1 invisible mb-2">
                        Ciao {{ Auth::user()->name }}, sei pronto a fare l'offerta giusta anche oggi?
                    </h4>
                    <h4 class="text-center typewriter2 invisible mb-2">
                        Non perdere tempo e buttati nel mondo del mercato!
                    </h4>
                @else
                    <h4 class="text-center typewriter1 invisible mb-2">
                        Compra e vendi qualsiasi prodotto, nuovo o usato, in pochi click.
                    </h4>
                    <h4 class="text-center typewriter2 invisible mb-2">
                        Unisciti a Emporium Shop e trova l'affare perfetto!
                    </h4>
                @endauth
            </div>

            {{-- MESSAGGIO DI SUCCESSO PER LA CANDIDATURA COME REVISORE --}}
            <div class="col-12 d-flex justify-content-center">
                @if (session()->has('message'))
                    <div class="alert alert-success text-center shadow rounded w-50">
                        {{ session('message') }}
                    </div>
                @endif
            </div>

            {{-- MESSAGGIO DI SUCCESSO GENERICO --}}
            <x-success />

            {{-- crea articolo --}}
            <div class="col-12 d-flex flex-column align-items-center justify-content-start">
                <a href="{{ route('createarticle') }}" class="btn bg-4 btn-cus text-dark px-3 py-3 fs-4 rounded-4 w-25 opacity-0"
                    id="addArticle">
                    {{ __('ui.aggiungiProdotto') }}
                </a>
            </div>

            <a href="#lastArticles"
                class="d-inline-flex position-absolute text-center text-decoration-none d-flex justify-content-center align-items-center"
                id="caret">
                <i class="fa-solid fa-angle-down c-4" id="caret-icon"></i>
            </a>


        </div>
    </header>

    <section class="container">

        {{-- ultimi arrivi --}}
        <div class="row justify-content-center vh-95 pt-5" id="lastArticles">
            <h3 class="col-12 text-center mb-0 mt-5">{{ __('ui.ultimiArrivi') }}</h3>
            <div class="col-12">

                @if ($articles)
                    <swiper-container class="mySwiper swiper-container-home" space-between="15" slides-per-view="3" pagination="false"
                        loop="true" autoplay-delay="5000" autoplay-pause-on-mouse-enter="true">
                        @foreach ($articles as $article)
                            <swiper-slide class="my-1 swiper-slide-home">
                                <div class="row justify-content-center p-0">
                                    <x-card :article="$article" />
                                </div>
                            </swiper-slide>
                        @endforeach
                    </swiper-container>
                @else
                    <div class="col-12">
                        <p class="text-center my-3 fs-5">Non sono ancora stati creati articoli</p>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <x-footer></x-footer>

</x-layout>
