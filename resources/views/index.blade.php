<x-layout>
    @if (session()->has('errorMessage'))
        <div class="alert alert-danger text-center shadow rounded w-50">
            {{ session('errorMessage') }}
        </div>
        </div>
    @endif
    <header class="container mt-5 pt-5 min-vh-100">
        <div class="row justify-content-center">
            @auth
                <div class="col-3 d-flex align-items-center justify-content-start">
                    <a href="{{ route('createarticle') }}" class="btn btn-info text-dark px-3 py-2 fs-5 rounded shadow"
                        id="addArticle">Pubblica
                        un articolo</a>
                </div>
            @endauth
            <h1 class="col-6 display-1 text-center mb-3">Emporium Shop</h1>
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
                        <h1>Sei</h1>
                        </div>
                @endif
            @endauth
            {{-- MESSAGGIO DI SUCCESSO PER LA CANDIDATURA COME REVISORE --}}

            <div class="col-12 d-flex justify-content-center">
                @if (session()->has('message'))
                    <div class="alert alert-success text-center shadow rounded w-50">
                        {{ session('message') }}
                    </div>
                @endif
            </div>

        </div>
        <x-success />

        <div class="row justify-content-center">
            <h3 class="col-12 text-center my-3">Ultimi arrivi</h3>
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
    </header>

    <x-footer></x-footer>

</x-layout>
