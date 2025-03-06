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
        <div class="row justify-content-evenly align-items-center flex-column w-100 h-100 py-4 position-relative">

            <div class="col-12 c-2">
                <h1 class=" display-1 text-center pb-3" data-aos="fade-down" data-aos-delay="300" data-aos-duration="2000">
                    Emporium Shop</h1>
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

            {{-- carosello categorie --}}
            <div class="col-12 ">
                <swiper-container class="mySwiper" thumbs-swiper=".mySwiper2-index" space-between="10" loop="true"
                    autoplay-delay="12000" autoplay-pause-on-mouse-enter="true">
                    @foreach ($categories as $category)
                        <swiper-slide class="my-1">
                            <div class="row justify-content-center p-0">
                                <div class="col-12 container-img-card p-0">
                                    <img src="{{ Storage::url($category->img) }}" alt="" class="radius">
                                    <div
                                        class="black-opacity radius d-flex flex-column justify-content-center align-items-center">
                                        @auth
                                            <h4 class="typewriter c-2" id="typewriter-text">
                                                Ciao {{ Auth::user()->name }}, sei pronto a fare l'offerta giusta anche
                                                oggi?
                                            </h4>
                                        @else
                                            <h4 class="typewriter c-2" id="typewriter-text">
                                                Compra e vendi qualsiasi prodotto, nuovo o usato, in pochi click.
                                            </h4>
                                        @endauth
                                        @switch($category->name)
                                            @case('Elettronica')
                                                <h5 class="c-2 " id="typewriter-text2">La tua lavatrice fa i
                                                    capricci?
                                                    Sostituiscila con una della categoria "{{ __("ui.$category->name") }}"</h5>
                                            @break

                                            @case('Abbigliamento')
                                                <h5 class="c-2 " id="typewriter-text2">Hai l'armadio vuoto?
                                                    Riempilo con gli articoli della
                                                    categoria "{{ __("ui.$category->name") }}"</h5>
                                            @break

                                            @case('Bellezza')
                                                <h5 class="c-2 " id="typewriter-text2">Cura la tua pelle con i
                                                    prodotti della categoria
                                                    "{{ __("ui.$category->name") }}"</h5>
                                            @break

                                            @case('Giardinaggio')
                                                <h5 class="c-2 " id="typewriter-text2">Hai il pollice verde? Dai
                                                    sfogo alla tua fantasia con la categoria "{{ __("ui.$category->name") }}"
                                                </h5>
                                            @break

                                            @case('Giocattoli')
                                                <h5 class="c-2 " id="typewriter-text2">Giochi sparsi per casa
                                                    non sono abbastanza? Aggiungine
                                                    altri dalla categoria "{{ __("ui.$category->name") }}"</h5>
                                            @break

                                            @case('Sport')
                                                <h5 class="c-2 " id="typewriter-text2">Sei un tipo atletico? Dai
                                                    un'occhiata alla categoria
                                                    "{{ __("ui.$category->name") }}"</h5>
                                            @break

                                            @case('Tecnologia')
                                                <h5 class="c-2 " id="typewriter-text2">Dispositivo vecchio?
                                                    Guarda le nostre offerte nella
                                                    categoria "{{ __("ui.$category->name") }}"</h5>
                                            @break

                                            @case('Libri e riviste')
                                                <h5 class="c-2 " id="typewriter-text2">Trova il libro dei tuoi
                                                    sogni! Dai un occhiata alla
                                                    categoria "{{ __("ui.$category->name") }}"</h5>
                                            @break

                                            @case('Accessori')
                                                <h5 class="c-2 " id="typewriter-text2">
                                                    I piccoli dettagli a volte fanno la differenza, cerca il
                                                    tuo stile nella categoria "{{ __("ui.$category->name") }}"</h5>
                                            @break

                                            @case('Motori')
                                                <h5 class="c-2 " id="typewriter-text2">Stai vendendo il tuo
                                                    catorcio o ne stai cercando un altro?
                                                    Scoprilo nella categoria "{{ __("ui.$category->name") }}"</h5>
                                            @break
                                        @endswitch

                                        {{-- search --}}
                                        <form action="{{ route('article.search') }}" method="GET" role="search"
                                            class="d-flex w-75">
                                            <div class="input-group">
                                                <input type="search" name="query" class="form-control"
                                                    placeholder="{{ __('ui.cerca') }}" aria-label="search"
                                                    value="{{ $query }}">
                                                <button class="input-group-text btn " type="submit" id="basic-addon2">
                                                    <i class="fa-solid fa-magnifying-glass"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </swiper-slide>
                    @endforeach
                </swiper-container>

                <swiper-container class="mySwiper2-index" space-between="10" slides-per-view="5" free-mode="true"
                    watch-slides-progress="true">
                    @foreach ($categories as $category)
                        <swiper-slide class="my-1" id="point">
                            <div class="row justify-content-center p-0 position-relative">
                                <div class="col-12 container-little-img-card p-0">
                                    <img src="{{ Storage::url($category->img) }}" alt="" class="radius">
                                    <div class="little-black-opacity p-0 radius">
                                        <h6 class="c-2 position-absolute top-50 start-50 translate-middle text-center">
                                            {{ __("ui.$category->name") }}</h5>
                                    </div>
                                </div>
                            </div>
                        </swiper-slide>
                    @endforeach
                </swiper-container>
            </div>


            {{-- crea articolo --}}
            <div class="col-12 d-flex flex-column align-items-center justify-content-start mb-4 mt-3">
                {{-- <a href="{{ route('createarticle') }}"
                    class="btn bg-4 btn-cus text-dark px-3 py-3 fs-4 rounded-4 w-md-25 " id="addArticle">
                    {{ __('ui.aggiungiProdotto') }}
                </a> --}}
                <a href="{{ route('createarticle') }}" id="addArticle"
                    class="btn-cus btn-flip btn-text fs-4 w-md-25 opacity-0{{-- opacity-0 --}}"
                    data-back="{{ __('ui.aggiungiProdotto2') }}" data-front="{{ __('ui.aggiungiUn')}} {{__('ui.prodotto') }}"></a>
            </div>

            {{-- caret --}}
            <a href="#lastArticles"
                class="d-inline-flex position-absolute text-center text-decoration-none d-flex justify-content-center align-items-center mt-5"
                id="caret">
                <i class="fa-solid fa-angle-down" id="caret-icon"></i>
            </a>


        </div>
    </header>

    <section class="container">

        {{-- ultimi arrivi --}}
        <div class="row justify-content-center vh-95 pt-5" id="lastArticles">
            <h3 class="col-12 text-center mb-0 mt-5">{{ __('ui.ultimiArrivi') }}</h3>
            <div class="col-12">

                @if ($articles)
                    <swiper-container class="mySwiper swiper-container-home" space-between="15" slides-per-view="3"
                        pagination="false" loop="true" autoplay-delay="5000" autoplay-pause-on-mouse-enter="true">
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
