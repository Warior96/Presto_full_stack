<x-layout>
    @if (session()->has('errorMessage'))
        <div class="alert alert-danger text-center shadow rounded w-50">
            {{ session('errorMessage') }}
        </div>
    @endif
    <header class="container-fluid pt-4 vh-100 bg-5">
        <div class="row justify-content-center align-items-center flex-column h-100">

            {{-- titolo --}}
            <div class="col-12 c-2">

                <h1 class=" display-1 text-center dark" data-aos="fade-down" data-aos-delay="300" data-aos-duration="2000">
                    EMPORIUM <span class="c-2 shop dark">SHOP</span>
                </h1>
            </div>

            {{-- MESSAGGIO DI SUCCESSO PER LA CANDIDATURA COME REVISORE --}}
            @if (session()->has('message'))
                <div class="col-12 d-flex justify-content-center">
                    <div class="alert alert-success text-center shadow rounded w-50 mb-1 position-relative">
                        {{ session('message') }}
                        <button type="button" class="btn-close position-absolute mt-3 me-3 top-0 end-0"
                            data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif

            {{-- MESSAGGIO DI SUCCESSO GENERICO --}}
            <x-success />

            {{-- variabile con testi delle slide --}}
            @php
                $texts = array_merge(
                    ['Emporium Shop ' . __('ui.èUnMarketplaceInnovativo') . '!'],
                    Auth::check()
                        ? [
                            __('ui.ciao') .
                            ' ' .
                            Auth::user()->name .
                            '. ' .
                            '<br>' .
                            __('ui.seiProntoAFareOttimiAffariAncheOggi') .
                            '?' .
                            __('ui.haiLarmadioVuoto') .
                            '? ' .
                            '<br>' .
                            __('ui.riempiloConIProdottiDellaCategoria') .
                            ' "' .
                            __('ui.Abbigliamento') .
                            '"',
                        ]
                        : [
                            __('ui.compraEVendiProdottiNuoviEUsatiInPochiClick') .
                            '<br>' .
                            __('ui.haiLarmadioVuoto') .
                            '? ' .
                            '<br>' .
                            __('ui.riempiloConIProdottiDellaCategoria') .
                            ' "' .
                            __('ui.Abbigliamento') .
                            '"',
                        ],

                    [
                        __('ui.iDiccoliDettagliAVolteFannoLaDifferenzaCercaIlTuoStileNellaCategoria') .
                        ' "' .
                        __('ui.Accessori') .
                        '"',
                        __('ui.curaLaTuaPelleConIProdottiDellaCategoria') . ' "' . __('ui.Bellezza') . '"',
                        __('ui.laTuaLavatriceFaICapricci') .
                        '? ' .
                        '<br>' .
                        __('ui.sostituiscilaConUnaDellaCategoria') .
                        ' "' .
                        __('ui.Elettronica') .
                        '"',
                        __('ui.haiIlPolliceVerde') .
                        '? ' .
                        '<br>' .
                        __('ui.scopriLaCategoria') .
                        ' "' .
                        __('ui.Giardinaggio') .
                        '"',
                        __('ui.giochiSparsiPerCasaNonSonoAbbastanza') .
                        '? ' .
                        '<br>' .
                        __('ui.aggiungineAltriDallaCategoria') .
                        ' "' .
                        __('ui.Giocattoli') .
                        '"',
                        __('ui.trovaIlLibroDeiTuoiSogni') .
                        '! ' .
                        '<br>' .
                        __('ui.daiUnOcchiataAllaCategoria') .
                        ' "' .
                        __('ui.Libri e riviste') .
                        '"',
                        __('ui.staiVendendoIlTuoMezzoONeStaiCercandoUnAltro') .
                        '? ' .
                        '<br>' .
                        __('ui.scopriloNellaCategoriaMotori'),
                        __('ui.seiUnaPersonaAtletica') .
                        '? ' .
                        '<br>' .
                        __('ui.vuoiTenertiInForma') .
                        '? ' .
                        '<br>' .
                        __('ui.daiUnOcchiataAllaCategoria') .
                        ' "' .
                        __('ui.Sport') .
                        '"',
                        __('ui.iTuoiDispositiviSonoVecchi') .
                        '? ' .
                        '<br>' .
                        __('ui.guardaLeNostreOfferteNellaCategoriaTecnologia'),
                    ],
                );
            @endphp

            <script>
                const texts = @json($texts);
            </script>
            {{-- carosello categorie --}}
            <div class="col-12 overflow-hidden position-relative">
                <div class="z-2 d-flex flex-column justify-content-center align-items-center text-slide-header fs-header px-5"
                    data-aos="fade-left" data-aos-duration="2000">
                    <div class="c-2 h-tx d-flex align-items-center fs-header text2" id="dynamicText">
                        Emporium Shop {{ __('ui.èUnMarketplaceInnovativo') }}!
                    </div>
                    <div class="mt-3 h-sc w-100">
                        <form action="{{ route('article.search') }}" method="GET" role="search" class="d-flex w-100">
                            <div class="input-group">
                                <input type="search" name="query" class="form-control"
                                    placeholder="{{ __('ui.cerca') }}" aria-label="search" value="{{ $query }}">
                                <button class="input-group-text btn " type="submit" id="basic-addon2">
                                    <i class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <swiper-container class="mySwiper px-lg-5" thumbs-swiper=".mySwiper2-index" space-between="10"
                    loop="true" autoplay-delay="11000" autoplay-pause-on-mouse-enter="false" allow-touch-move="false"
                    simulate-touch="false">
                    <swiper-slide class="rounded-3 my-1 overflow-hidden">
                        <div class="row justify-content-center p-0">
                            <div class="col-12 container-img-card p-0 position-relative">
                                <img src="{{ Storage::url('categories-img/all.png') }}" alt="home" class="">
                            </div>
                        </div>
                    </swiper-slide>
                    @foreach ($categories as $category)
                        <swiper-slide class="rounded-3 my-1 overflow-hidden">
                            <div class="row justify-content-center p-0">
                                <div class="col-12 container-img-card p-0 position-relative">
                                    <img src="{{ Storage::url($category->img) }}"
                                        alt="immagine di {{ $category->name }}" class="radius">
                                </div>
                            </div>

                        </swiper-slide>
                    @endforeach
                </swiper-container>
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

        {{-- ULTIMI ARRIVI --}}

        <div class="row justify-content-center align-items-center vh-98 pt-2" id="lastArticles">

            {{-- TITOLO --}}
            <div class="col-12 d-flex flex-column align-items-center ">
                <h4 class="d-inline display-4 text-center mb-0 pt-5 pb-1">{{ __('ui.ultimiArrivi') }}</h4>
            </div>

            {{-- CAROSELLO EFFETTIVO --}}
            <div class="col-12 ">
                @if ($articles)
                    <swiper-container class="mySwiper swiper-container-home preview-art-container row mx-auto"
                        space-between="0" pagination="false" loop="true" autoplay-delay="5000"
                        autoplay-pause-on-mouse-enter="true"
                        breakpoints='{
                            "0": { "slidesPerView": 1 },
                            "768": { "slidesPerView": 2 },
                            "1024": { "slidesPerView": 3 }
                        }'>
                        @foreach ($articles as $article)
                            <swiper-slide class="mb-md-5 swiper-slide-home me-0 col-lg-12 col-md-4 col-3"
                                data-aos="zoom-in-up" data-aos-duration="2000" data-aos-delay="500">
                                <x-card :article="$article" />
                            </swiper-slide>
                        @endforeach
                    </swiper-container>
                @else
                    <div class="col-12">
                        <p class="text-center my-3 fs-5">Non sono ancora stati creati articoli</p>
                    </div>
                @endif
            </div>

            {{-- crea articolo --}}
            <div class="col-12 d-flex flex-column align-items-center justify-content-start mb-4 mt-3">
                <a href="{{ route('createarticle') }}" id="addArticle"
                    class="btn-cus btn-flip btn-text fs-4 w-md-25 opacity-0"
                    data-back="{{ __('ui.completaLaVendita') }}"
                    data-front="{{ __('ui.aggiungiUn') }} {{ __('ui.prodotto') }}"></a>
            </div>
        </div>

    </section>

    <x-footer></x-footer>

</x-layout>
