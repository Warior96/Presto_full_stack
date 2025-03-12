<x-layout>
    <header class="container mt-5 pt-4">
        <div class="row justify-content-center">
            <h1 class="col-12 display-5 text-center mt-3 mb-1">
                {{-- @dd($article_to_check) --}}
                @if (\App\Models\Article::toBeRevisedCount() == 1)
                    Ti manca ancora 1 articolo da revisionare
                @elseif (\App\Models\Article::toBeRevisedCount() > 1)
                    Ti mancano ancora {{ \App\Models\Article::toBeRevisedCount() }} articoli da revisionare
                @endif
            </h1>
        </div>
    </header>

    <div class="container-fluid">
        @if ($article_to_check)
            <div class="row justify-content-center pt-4 mx-5">
                <div
                    class=" @if ($article_to_check->images->count() > 1) col-md-9 @elseif ($article_to_check->images->count() == 1) col-md-8 @elseif ($article_to_check->images->count() == 0) col-md-8 @endif
                    ">
                    <div class="row justify-content-center me-2">
                        @if ($article_to_check->images->count())
                            <swiper-container class="mySwiper-revisor swiper-container-revisor"
                                thumbs-swiper=".mySwiper2-revisor" space-between="10" free-mode="true"
                                slides-per-view="2.4">
                                @foreach ($article_to_check->images as $key => $image)
                                    <swiper-slide class="swiper-slide-revisor rounded position-relative mx-auto">

                                        <img src="{{ $image->getUrl(600, 600) }}" class=""
                                            alt="Immagine {{ $key + 1 }} dell'articolo '{{ $article_to_check->title }}'">
                                        <div class="dropdown dropend" id="labels">
                                            <button class="btn-lr bg-1-o dropdown-toggle" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                Labels
                                            </button>
                                            <ul class="dropdown-menu bg-2-o">
                                                <li>
                                                    <div class="px-2 py-1">
                                                        @if ($image->labels)
                                                            @foreach ($image->labels as $label)
                                                                #{{ $label }}
                                                                @if (!$loop->last)
                                                                    ,
                                                                @else
                                                                    .
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            <p class="fst-italic">No labels</p>
                                                        @endif
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="dropdown dropstart" id="ratings">
                                            <button class="btn-lr  bg-1-o dropdown-toggle" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                Ratings
                                            </button>
                                            <ul class="dropdown-menu bg-2-o">
                                                <li>

                                                    <div class="row px-2 py-1">
                                                        <div class="col-2 text-center {{ $image->adult }}">
                                                        </div>
                                                        <div class="col-8 ps-2 pe-0">adult</div>
                                                    </div>

                                                </li>
                                                <li>

                                                    <div class="row px-2 py-1">
                                                        <div class="col-2 text-center {{ $image->violence }}">
                                                        </div>
                                                        <div class="col-8 ps-2 pe-0">violence</div>
                                                    </div>

                                                </li>
                                                <li>

                                                    <div class="row px-2 py-1">
                                                        <div class="col-2 text-center {{ $image->spoof }}">
                                                        </div>
                                                        <div class="col-8 ps-2 pe-0">spoof</div>
                                                    </div>

                                                </li>
                                                <li>

                                                    <div class="row px-2 py-1">
                                                        <div class="col-2 text-center {{ $image->racy }}">
                                                        </div>
                                                        <div class="col-8 ps-2 pe-0">racy</div>
                                                    </div>

                                                </li>
                                                <li>

                                                    <div class="row px-2 py-1">
                                                        <div class="col-2 text-center {{ $image->medical }}">
                                                        </div>
                                                        <div class="col-8 ps-2 pe-0">medical</div>
                                                    </div>

                                                </li>
                                            </ul>
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
                <div
                    class="
                @if ($article_to_check->images->count() > 1) col-md-3 @elseif ($article_to_check->images->count() == 1) col-md-4 @elseif ($article_to_check->images->count() == 0) col-md-4 @endif
                d-flex justify-content-between flex-column">
                    <div class="row">
                        <h2 class="mb-3">
                            <span class="fs-7 me-1">{{ __('ui.titolo') }}: </span>{{ $article_to_check->title }}
                        </h2>
                        <h4 class="mb-3">
                            <span class="fs-7 fw-normal">Autore:</span> {{ $article_to_check->user->name }}
                        </h4>
                        <p class="fs-5">
                            <span class="fs-7">{{ __('ui.prezzo') }}:
                            </span>{{ __('ui.€') }}{{ $article_to_check->price }}
                        </p>
                        <p class="fst-italic text-muted fs-5">
                            <span class="fs-7 fst-normal">{{ __('ui.categoria') }}: </span>
                            {{-- #{{ $article_to_check->category->name }} --}}
                            @foreach ($categories as $category)
                                @if ($article_to_check->category->name == $category->name)
                                    <span class="fs-7 fst-normal">#{{ __("ui.$category->name") }}: </span>
                                @endif
                            @endforeach
                        </p>
                        <p class="fs-5">
                            <span class="mb-0 fs-7">
                                {{ __('ui.condizione') }}:
                            </span>
                            @switch($article_to_check->condition)
                                @case('new')
                                    {{ __('ui.new') }}
                                @break

                                @case('used')
                                    {{ __('ui.used') }}
                                @break

                                @case('reconditioned')
                                    {{ __('ui.reconditioned') }}
                                @break

                                @default
                                    Nessuna {{ __('ui.condizione') }} indicata
                            @endswitch
                        </p>
                        <p class="mb-0 fs-7">
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
                            class="col-6 px-3">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-cus p-2 w-100 fw-bold"
                                id="reject">{{ __('ui.rifiuta') }}</button>
                        </form>

                        <form action="{{ route('accept', ['article' => $article_to_check]) }}" method='POST'
                            class="col-6 px-3">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-cus btn-success p-2 w-100 fw-bold"
                                id="accept">{{ __('ui.accetta') }}</button>
                        </form>


                        {{-- modale back --}}

                        <div class="col-12 d-flex justify-content-center align-content-center pt-2 pb-1">
                            <button type="button" class="btn py-2 px-4 fw-bold c-5 btn-storico"
                                data-bs-toggle="modal" data-bs-target="#modal_revisor">
                                Storico operazioni
                            </button>

                        </div>

                    </div>
                </div>
            </div>
        @else
            <div class="row justify-content-center align-items-center text-center my-5">
                <div class="col-12">


                    <h1 class="fst-italic display-4 pb-4">
                        Nessun articolo da revisionare
                    </h1>
                </div>

                {{-- modale back --}}
                <div class="col-12 d-flex justify-content-center align-content-center pt-2 pb-1">
                    <button type="button" class="btn py-2 px-4 fw-bold c-5 btn-storico" data-bs-toggle="modal"
                        data-bs-target="#modal_revisor">
                        Storico operazioni
                    </button>

                </div>


                <div class="col-12 d-flex flex-column align-items-center justify-content-start mb-4 pt-5">
                    <a href="{{ route('homepage') }}" class="btn-cus btn-revisor btn-text fs-4 w-20"
                        data-back="{{ __('ui.aggiungiUn') }} prodotto" data-front="Torna alla home"></a>
                </div>
            </div>
        @endif
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal_revisor" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content bg-5 text">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 c-2 w-100 pt-3" id="staticBackdropLabel">
                        Storico dei prodotti accettati o rifiutati
                    </h1>
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>


                <div class="modal-body overflow-auto modal-storico">
                    <table class="table bg-2 w-100">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Titolo</th>
                                <th scope="col">Prezzo</th>
                                <th scope="col" class="td-img">Anteprima</th>
                                <th scope="col">Stato</th>
                                <th scope="col">Dettaglio</th>
                                <th scope="col">Annulla</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($articles as $article)
                                @if ($article->is_accepted === 0 || $article->is_accepted === 1)
                                    <tr>
                                        <th scope="row">{{ $article->id + 1 }}</th>
                                        <td>{{ $article->title }}</td>
                                        <td>{{ __('ui.€') }} {{ $article->price }}</td>
                                        <td class="d-flex justify-content-center align-items-center td-img">
                                            <img src="{{ $article->images->isNotEmpty() ? $article->images->first()->getUrl(600, 600) : 'https://picsum.photos/300' }}"
                                                class="card-img-top aspect-ratio-1 img-table"
                                                alt="Immagine dell'articolo {{ $article->title }}">
                                        </td>
                                        <td>
                                            @if ($article->is_accepted == 0)
                                                <span class="text-danger rounded-pill mx-2">Rifiutato</span>
                                            @elseif ($article->is_accepted == 1)
                                                <span class="text-success rounded-pill mx-2">Accettato</span>
                                            @endif
                                        </td>
                                        <td><a target="_blank" href="{{ route('article.show', compact('article')) }}"
                                                class="btn btn-cus rounded-pill bg-1 text-black mx-2"
                                                id="a-dettaglio">{{ __('ui.dettaglio') }} </a>
                                        </td>
                                        <td>
                                            <form action="{{ route('back', ['article' => $article]) }}"
                                                method='POST' class="">
                                                @csrf
                                                @method('PATCH')
                                                <button class="btn btn-warning rounded-pill fw-bold">Manda
                                                    in revisione</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-layout>
