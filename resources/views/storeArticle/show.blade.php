<x-layout>
    <div class="container mt-5 pt-4 vh-100">
        <div class="row justify-content-center align-items-center text-center">
            <div class="col-12">
                <h1 class="display-3 mt-4 mb-1">{{ __('ui.dettaglio') }} dell'articolo: {{ $article->title }}</h1>
            </div>
        </div>
        <div class="row justify-content-center py-5">
            <div class="col-12 col-md-6 mb-2">
                <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://picsum.photos/400/300" class="d-block w-100 rounded shadow"
                                alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/401/300" class="d-block w-100 rounded shadow"
                                alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/402/300" class="d-block w-100 rounded shadow"
                                alt="...">
                        </div>
                    </div>
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
                </div>
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
