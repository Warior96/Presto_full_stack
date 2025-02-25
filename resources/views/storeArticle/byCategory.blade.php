<x-layout>
    <div class="row py-5 justify-content-center align-items-center text-center">
        <div class="col-12 pt-5">
            <div class="container">
                <h1 class="display-2">Articoli della categoria <span
                        class="fst-italic fw-bold">{{ $category->name }}</span></h1>
            </div>
        </div>
        <div class="row height-custom justify-content-center align-items-center py-5">
            @forelse ($articles as $article)
                    <div class="col-12 col-md-3">
                        <x-card :article="$article" />
                    </div>
                @empty
                <div class="col-12 text-center">
                    <h3>
                        Non sono ancora stati creati articoli per questa categoria!
                    </h3>
                    @auth
                        <a class="my-5 btn btn-info px-3 py-2 fs-5 rounded shadow" href="{{ route('createarticle') }}">Pubblica un articolo</a>
                    @endauth
                </div>
            @endforelse
        </div>

    </div>

</x-layout>
