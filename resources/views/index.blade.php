<x-layout>
    @if (session()->has('errorMessage'))
        <div class="alert alert-danger text-center shadow rounded w-50">
            {{ session('errorMessage') }}
        </div>
        </div>
    @endif
    <header class="container mt-5 pt-4 min-vh-100">
        <div class="row justify-content-center">
            <h1 class="col-12 display-1 text-center mb-3 position-relative">Presto.it</h1>
            @auth

                    <a href="{{ route('createarticle') }}" class="btn btn-outline-info position-absolute text-dark d-inline-flex  p-3 fs-5 rounded shadow"id="addArticle">Pubblica un
                        articolo</a>

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
            <h3 class="col-12 text-center mt-3">Ultimi arrivi</h3>
            @if ($articles)
                <swiper-container class="mySwiper" space-between="30" slides-per-view="3" pagination="false"
                    loop="true" autoplay-delay="5000" autoplay-pause-on-mouse-enter="true">
                    @foreach ($articles as $article)
                        <swiper-slide class="my-3">
                            <x-card :article="$article" />
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
