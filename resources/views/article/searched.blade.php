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

        <div class="row justify-content-center align-items-center pb-3">
            @forelse ($articles as $article)
                <div class="col-12 col-md-3">
                    <x-card :article="$article" />
                </div>
            @empty
                <div class="col-12">
                    <h1 class="display-2 text-center mt-5 pt-3">
                        Nessun articolo corrisponde alla ricerca
                    </h1>
                    <div class="col-12 text-center">
                        <a class="my-5 btn btn-info px-3 py-2 fs-5 rounded shadow"
                            href="{{ route('createarticle') }}">Pubblica un articolo</a>
                    </div>
                </div>
            @endforelse
        </div>
    </div>

    <div class="d-flex justify-content-center">
        {{ $articles->links() }}
    </div>

    <x-footer></x-footer>

</x-layout>
