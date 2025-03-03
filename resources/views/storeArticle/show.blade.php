<x-layout>
    <div class="container mt-5 pt-4 vh-100">
        <div class="row justify-content-center align-items-center text-center">
            <div class="col-12">
                <h1 class="display-3 mt-4 mb-1">{{ __('ui.dettaglio') }} dell'articolo: {{ $article->title }}</h1>
            </div>
        </div>
        <div class="row justify-content-center py-5">
            <div class="col-12 col-md-6 mb-2">
                @if ($article->images->count() > 0)
                    {{-- <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($article->images as $key => $image)
                                <div class="carousel-item @if ($loop->first) active @endif">
                                    <img src="{{ Storage::url($image->path) }}" class="d-block w-100 rounded shadow"
                                        alt="Immagine {{ $key + 1 }} dell'articolo {{ $article->title }}">
                                </div>
                            @endforeach
                        </div>
                        @if ($article->images->count() > 1)
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        @endif
                    </div> --}}
                    <swiper-container class="mySwiper swiper-container-show" pagination="true" effect="coverflow"
                        grab-cursor="true" centered-slides="true" slides-per-view="auto" coverflow-effect-rotate="50"
                        coverflow-effect-stretch="0" coverflow-effect-depth="100" coverflow-effect-modifier="1"
                        coverflow-effect-slide-shadows="true">
                        @foreach ($article->images as $key => $image)
                            <swiper-slide class="swiper-slide-show @if ($loop->first) active @endif">
                                <img src="{{ Storage::url($image->path) }}" class="rounded-4 h-100"
                                    alt="Immagine {{ $key + 1 }} dell'articolo {{ $article->title }}" />
                            </swiper-slide>
                        @endforeach
                    </swiper-container>
                @else
                    <img src="https://picsum.photos/300" class="d-block w-100 rounded shadow"
                        alt="Nessun foto inserita dall'utente">
                @endif
            </div>
            <div class="col-12 col-md-6 mb-3">
                <h2 class="display-5 ms-4"><span class="fw-bold">{{ __('ui.titolo') }}:
                    </span>{{ $article->title }}</h2>
                <div class=" h-75 m-4">
                    <h4 class="fw-bold mb-3">{{ __('ui.prezzo') }}: €{{ $article->price }}</h4>
                    <h4 class="fw-bold mb-3">{{ __('ui.categoria') }}: <span
                            class="text-muted fst-italic">#{{ __("ui.{$article->category->name}") }} </span></h4>
                    <p class="fs-5 pt-3">{{ __('ui.descrizione') }}: {{ $article->description }}</p>
                    <p class="fs-5 pt-3">Data inserimento articolo: {{ $article->created_at->format('d/m/Y') }}</p>
                    <p class="fs-5 pt-3">Venditore: {{ $article->user->name }}</p>
                </div>
            </div>
        </div>
    </div>
</x-layout>
