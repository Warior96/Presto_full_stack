<x-layout>
    <header class="container mt-5 pt-4">
        <div class="row justify-content-center">
            <h1 class="col-12 display-5 text-center mt-3 mb-1">
                Articoli da revisionare
            </h1>
        </div>
    </header>

    <div class="container-fluid">
        @if ($article_to_check)
            <div class="row justify-content-center pt-4 mx-5">
                <div class="col-md-9 ">
                    <div class="row justify-content-center me-2">
                        @if ($article_to_check->images->count())
                            <swiper-container class="mySwiper-revisor swiper-container-revisor"
                                thumbs-swiper=".mySwiper2-revisor" space-between="10" free-mode="true"
                                slides-per-view="2.4">
                                @foreach ($article_to_check->images as $key => $image)
                                    <swiper-slide class="swiper-slide-revisor rounded">
                                        <img src="{{ $image->getUrl(600, 600) }}" class=""
                                            alt="Immagine {{ $key + 1 }} dell'articolo '{{ $article_to_check->title }}'">
                                        <div class="card-body">
                                            <h5>Labels</h5>
                                            @if ($image->labels)
                                                @foreach ($image->labels as $label)
                                                    #{{ $label }},
                                                @endforeach
                                            @else
                                                <p class="fst-italic">No labels</p>
                                            @endif
                                        </div>
                                        <div class="card-body">
                                            <h5>Ratings</h5>
                                            <div class="row justify-content-center">
                                                <div class="col-2">
                                                    <div class="text-center mx-auto {{ $image->adult }}"></div>
                                                </div>
                                                <div class="col-10">adult</div>
                                            </div>
                                            <div class="row justify-content-center">
                                                <div class="col-2">
                                                    <div class="text-center mx-auto {{ $image->violence }}"></div>
                                                </div>
                                                <div class="col-10">violence</div>
                                            </div>
                                            <div class="row justify-content-center">
                                                <div class="col-2">
                                                    <div class="text-center mx-auto {{ $image->spoof }}"></div>
                                                </div>
                                                <div class="col-10">spoof</div>
                                            </div>
                                            <div class="row justify-content-center">
                                                <div class="col-2">
                                                    <div class="text-center mx-auto {{ $image->racy }}"></div>
                                                </div>
                                                <div class="col-10">racy</div>
                                            </div>
                                            <div class="row justify-content-center">
                                                <div class="col-2">
                                                    <div class="text-center mx-auto {{ $image->medical }}"></div>
                                                </div>
                                                <div class="col-10">medical</div>
                                            </div>
                                        </div>
                                    </swiper-slide>
                                @endforeach
                            </swiper-container>

                            <swiper-container class="mySwiper2-revisor swiper-container-revisor" space-between="8"
                                slides-per-view="10" free-mode="true" watch-slides-progress="true">
                                @foreach ($article_to_check->images as $key => $image)
                                    <swiper-slide
                                        class="swiper-slide-revisor rounded 
                                        @if ($loop->first) ms-auto @endif
                                        @if ($loop->last) me-auto @endif">
                                        <img src="{{ $image->getUrl(600, 600) }}" class=""
                                            alt="Immagine {{ $key + 1 }} dell'articolo '{{ $article_to_check->title }}'">
                                    </swiper-slide>
                                @endforeach
                            </swiper-container>
                        @else
                            <swiper-container class="mySwiper-revisor swiper-container-revisor"
                                thumbs-swiper=".mySwiper2-revisor" space-between="10" space-between="10"
                                free-mode="true" slides-per-view="2.4">
                                @for ($i = 0; $i < 6; $i++)
                                    <swiper-slide class="swiper-slide-revisor rounded">
                                        <img src="https://picsum.photos/50{{ $i }}"
                                            class="img-fluid rounded shadow" alt="immagine segnaposto">
                                    </swiper-slide>
                                @endfor
                            </swiper-container>

                            <swiper-container class="mySwiper2-revisor swiper-container-revisor" space-between="8"
                                slides-per-view="10" free-mode="true" watch-slides-progress="true">
                                @for ($i = 0; $i < 6; $i++)
                                    <swiper-slide
                                        class="swiper-slide-revisor rounded 
                                        @if ($i == 0) ms-auto @endif
                                        @if ($i == 5) me-auto @endif">
                                        <img src="https://picsum.photos/50{{ $i }}" class=""
                                            alt="Immagine {{ $i + 1 }} dell'articolo causale">
                                    </swiper-slide>
                                @endfor
                            </swiper-container>
                        @endif
                    </div>
                </div>



                {{-- Dettagli dell'articolo da revisionare --}}
                <div class="col-md-3 d-flex justify-content-between flex-column">
                    <div class="row">
                        <h2 class="mb-3">
                            <span class="fs-6 me-1">{{ __('ui.titolo') }}: </span>{{ $article_to_check->title }}
                        </h2>
                        <h4 class="mb-3">
                            <span class="fs-6 fw-normal">Autore:</span> {{ $article_to_check->user->name }}
                        </h4>
                        <p class="fs-5">
                            <span class="fs-6">{{ __('ui.prezzo') }}: </span>€{{ $article_to_check->price }}
                        </p>
                        <p class="fst-italic text-muted fs-5">
                            <span class="fs-6 fst-normal">{{ __('ui.categoria') }}: </span>
                            #{{ $article_to_check->category->name }}
                        </p>
                        <p class="mb-0 fs-6">
                            {{ __('ui.descrizione') }}:
                        </p>
                        <p class="fs-5">
                            {{ $article_to_check->description }}
                        </p>
                    </div>
                    <div class="row">
                        @if (session()->has('success'))
                            <div class="mt-4 alert alert-success shadow rounded">
                                {{ session('success') }}
                            </div>
                        @elseif (session()->has('reject'))
                            <div class="mt-4 alert alert-danger shadow rounded">
                                {{ session('reject') }}
                            </div>
                        @endif
                    </div>
                    <div class="row pb-4 justify-content-around flex-row">
                        <form action="{{ route('reject', ['article' => $article_to_check]) }}" method='POST'
                            class="col-5">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-cus btn-danger py-2 px-5 fw-bold"
                                id="reject">{{ __('ui.rifiuta') }}</button>
                        </form>

                        <form action="{{ route('accept', ['article' => $article_to_check]) }}" method='POST'
                            class="col-5">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-cus btn-success py-2 px-5 fw-bold"
                                id="accept">{{ __('ui.accetta') }}</button>
                        </form>

                        {{-- <form action="{{ route('back', ['article' => $article_to_check]) }}" method='POST'
                            class="col-10">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-warning py-2 px-5 fw-bold">Annulla l'ultima operazione</button>
                        </form> --}}

                    </div>
                </div>
            </div>
        @else
            <div class="row justify-content-center align-items-center text-center mx-3">
                <div class="col-12">


                    <h1 class="fst-italic display-4">
                        Nessun articolo da revisionare
                    </h1>

                    <a href="{{ route('homepage') }}" class="mt-5 btn btn-info">
                        Torna alla home
                    </a>
                </div>
            </div>
        @endif
    </div>
</x-layout>
