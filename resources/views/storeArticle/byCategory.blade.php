<x-layout>
    <div class="container-fluid">
        <div class="row py-5 justify-content-center align-items-center text-center">
            <div class="col-12 pt-4">
                @if ($articles->isEmpty())
                    <h1 class="display-5 pt-5">Non sono presenti articoli della categoria <br> <span
                            class="fst-italic fw-bold"> {{ __("ui.$category->name") }}</span></h1>
                @else
                    @if ($num_articles == 1)
                        <h1 class="display-5">E' presente {{ $num_articles }} articolo della categoria <br> <span
                                class="fst-italic fw-bold">{{ __("ui.$category->name") }}</span></h1>
                    @else
                        <h1 class="display-5">Sono presenti {{ $num_articles }} articoli della categoria <br> <span
                                class="fst-italic fw-bold"> {{ __("ui.$category->name") }}</span></h1>
                    @endif
                @endif
            </div>
            <div class="row justify-content-center align-items-center pt-2 pb-4">
                @forelse ($articles as $article)
                    <div class="col-12 col-md-3 mt-4 mx-3 mb-5 h2">
                        <x-card :article="$article" />
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <a class="my-5 btn btn-info px-3 py-2 fs-5 rounded shadow"
                            href="{{ route('createarticle') }}">Pubblica un articolo</a>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
    <x-footer />
</x-layout>
