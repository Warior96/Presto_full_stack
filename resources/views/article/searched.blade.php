<x-layout>

    <div class="container-fluid">
        <div class="row pt-5 justify-content-center align-items-center">
            <div class="col-12">
                <h1 class="display-5 text-center mt-5 pb-3">
                    @if ($articles->count() > 1)
                        Ci sono {{ $articles->count() }} risultati nella ricerca "<span
                            class="fst-italic">{{ $query }}</span>"
                    @elseif ($articles->count() == 1)
                        C'è {{ $articles->count() }} risultato nella ricerca "<span
                            class="fst-italic">{{ $query }}</span>"
                    @endif
                </h1>
            </div>
        </div>
        {{-- @dump($articles) --}}
        <div class="row justify-content-center pb-3">
            @forelse ($articles as $article)
                <div class="col-12 col-md-3 mx-4 h">
                    <x-card :article="$article" />
                </div>
            @empty
                <div class="col-12 py-5">
                    <h1 class="display-5 text-center mt-5 pt-5">
                        Nessun articolo corrisponde alla ricerca
                    </h1>
                    {{-- <div class="col-12 text-center">
                        <a class="my-5 btn btn-info px-3 py-2 fs-5 rounded shadow"
                            href="{{ route('createarticle') }}">Pubblica un articolo</a>
                    </div> --}}
                    <div class="col-12 d-flex flex-column align-items-center justify-content-start py-5 my-5">
                        <a href="{{ route('createarticle') }}"
                            class="btn bg-4 btn-cus text-dark px-3 py-3 fs-4 rounded-4  w-25">
                            {{ __('ui.aggiungiProdotto') }}
                        </a>
                    </div>
                </div>
            @endforelse
        </div>
    </div>

    <div class="d-flex justify-content-center pt-4 my-2">
        {{ $articles->links() }}
    </div>

    <x-footer></x-footer>

</x-layout>
