<x-layout>

    <div class="container-fluid">
        <div class="row py-5 justify-content-center align-items-center">
            <div class="col-12">
                <h1 class="display-2 text-center mt-5 pt-3">
                    Ci sono {{$articles->count()}} risultati nella ricerca "<span class="fst-italic">{{ $query }}</span>"
                </h1>
            </div>
        </div>

        <div class="row justify-content-center align-items-center py-5">
            @forelse ($articles as $article)
            <div class="col-12 col-md-3">
                <x-card :article="$article" />
            </div>
            @empty
            <div class="col-12">
                <h3 class="text-center">
                    Nessun articolo corrisponde alla ricerca
                </h3>
                {{-- @auth
                <a class="my-5 btn btn-info px-3 py-2 fs-5 rounded shadow" href="{{ route('createarticle') }}">Pubblica un articolo</a>
                @endauth --}}
            </div>
            @endforelse
        </div>
    </div>

    <div>
        {{ $articles->links() }}
    </div>

</x-layout>
