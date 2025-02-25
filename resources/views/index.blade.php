<x-layout>
    @if (session()->has('errorMessage'))
        <div class="alert alert-danger text-center shadow rounded w-50">
            {{ session('errorMessage') }}
        </div>
    </div>
    @endif
    <header class="container mt-5 pt-4 min-vh-100">
        <div class="row justify-content-center">
            <h1 class="col-12 display-1 text-center mb-3">Presto.it</h1>
            {{-- MESSAGGIO DI SUCCESSO PER LA CANDIDATURA COME REVISORE --}}

            <div class="col-12 d-flex justify-content-center">
                @if (session()->has('message'))
                <div class="alert alert-success text-center shadow rounded w-50">
                    {{ session('message') }}
                @endif
                
            </div>
        </div>
        @auth
            <div class="row">
                <div class="col-12 text-center my-5 pt-2">
                    <a href="{{ route('createarticle') }}" class="btn btn-info px-3 py-2 fs-5 rounded shadow">Pubblica un
                        articolo</a>
                </div>
            </div>
        @endauth
        <x-success />

        <div class="row justify-content-center">
            <h3 class="col-12 text-center mt-3">Ultimi arrivi</h3>
            @forelse ($articles as $article)
                <div class="col-3 m-3">
                    <x-card :article="$article" />
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center my-3 fs-5"> Non sono ancora stati creati articoli </p>
                </div>
            @endforelse

        </div>
    </header>

    <x-footer></x-footer>

</x-layout>
