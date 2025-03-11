<x-layout>
    <div class="container-fluid">
        <div class="row py-5 justify-content-center align-items-center text-center">
            <div class="col-12 pt-4">
                @if ($articles->isEmpty())
                    <h1 class="fst-italic display-3 fw-bold pt-5"> {{ __("ui.$category->name") }}</h1>
                    <h4 class="c-5 py-3">Non sono presenti articoli di questa categoria</h4>
                @else
                    @if ($num_articles == 1)
                        <h1 class="fst-italic display-4 fw-bold pt-3"> {{ __("ui.$category->name") }}</h1>
                        <h4 class="c-5">È presente {{ $num_articles }} articolo della categoria</h4>
                    @else
                        <h1 class="fst-italic display-4 fw-bold pt-3"> {{ __("ui.$category->name") }}</h1>
                        <h4 class="c-5">Sono presenti {{ $num_articles }} articoli della categoria</h4>
                    @endif
                @endif
            </div>
            <div class="row justify-content-center align-items-center pt-2 pb-4">
                @forelse ($articles as $article)
                    <div class="col-12 col-md-3 mt-4 mx-3 mb-5 h2">
                        <x-card :article="$article" />
                    </div>
                @empty
                    {{-- crea articolo --}}
                    <div class="col-12 d-flex flex-column align-items-center justify-content-start mb-4 mt-3">
                        <a href="{{ route('createarticle') }}" id="addArticle"
                            class="btn-cus btn-flip btn-text fs-4 w-md-25 opacity-0"
                            data-back="{{ __('ui.aggiungiProdotto2') }}"
                            data-front="{{ __('ui.aggiungiUn') }} prodotto"></a>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
    <x-footer />
</x-layout>
