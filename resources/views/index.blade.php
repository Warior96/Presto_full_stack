<x-layout>
    @if (session()->has('errorMessage'))
        <div class="alert alert-danger text-center shadow rounded w-50">
            {{ session('errorMessage') }}
        </div>
        </div>
    @endif
    <header class="container-fluid bg-header pt-5 vh-100">
        <div class="row justify-content-evenly align-items-center flex-column h-100 py-5 position-relative text-white">

            <div class="col-12">
                <h1 class=" display-1 text-center mb-3 pb-4">Emporium Shop</h1>
                <h4 class="text-center">
                    Lorem ipsum dolor sit amet consectetur <br>adipisicing elit. Aliquam labore voluptatibus
                    iusto eos ducimus tempora nisi!
                </h4>
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

            @auth
                <div class="col-12 d-flex flex-column align-items-center justify-content-start ">
                    <h3 class="mb-3">Crea subito il tuo articolo</h3>
                    <a href="{{ route('createarticle') }}"
                        class="btn btn-info text-dark px-3 py-3 fs-3 rounded-4 shadow w-25" id="addArticle">
                        Crea
                    </a>
                </div>
            @endauth

            <a href="#lastArticles"
                class="d-inline-flex position-absolute text-center text-decoration-none d-flex justify-content-center align-items-center"
                id="caret">
                <i class="fa-solid fa-angle-down text-white cssanimation hu__hu__" id="caret-icon"></i>
            </a>


        </div>
    </header>

    <section class="container mt-5 pt-5 min-vh-100">
        <div class="row justify-content-center">
            {{-- Bottone + modale lavora con noi --}}
            @auth
                @if (Auth::user()->is_revisor != true)
                    <div class="col-3 d-flex justify-content-end align-content-center ">
                        <button type="button" class="btn btn-primary  my-4 fs-5 rounded shadow" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">
                            Lavora con noi
                        </button>

                        <!-- Modal -->
                        <div class="modal fade " id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered ">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5 w-100 pt-3" id="staticBackdropLabel">
                                            {{ Auth::user()->name }}, vuoi lavorare con noi?
                                        </h1>
                                        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body px-4">
                                        <p>I tuoi dati:</p>
                                        <ul>
                                            <li>nome: {{ Auth::user()->name }}</li>
                                            <li>email: {{ Auth::user()->email }}</li>
                                        </ul>
                                    </div>
                                    <div class="modal-footer d-flex justify-content-between align-items-center pb-2">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No,
                                            annulla</button>
                                        <a href="{{ route('become.revisor') }}"
                                            class="btn btn-primary px-3 py-2  rounded shadow">Candidati</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-3 d-flex justify-content-end align-content-center">
                        {{-- <h4>Ora sei un revisore</h4> --}}
                    </div>
                @endif
            @endauth



        </div>

        <div class="row justify-content-center" id="lastArticles">
            <h3 class="col-12 text-center mt-5 mb-3">Ultimi arrivi</h3>
            @if ($articles)
                <swiper-container class="mySwiper" space-between="15" slides-per-view="3" pagination="false"
                    loop="true" autoplay-delay="5000" autoplay-pause-on-mouse-enter="true">
                    @foreach ($articles as $article)
                        <swiper-slide class="my-1">
                            <div class="row justify-content-center p-0">
                                <x-card :article="$article" />
                            </div>
                        </swiper-slide>
                    @endforeach
                </swiper-container>
            @else
                <div class="col-12">
                    <p class="text-center my-3 fs-5"> Non sono ancora stati creati articoli </p>
                </div>

            @endif
        </div>
    </section>

    <x-footer></x-footer>

</x-layout>
