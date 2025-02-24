<x-layout>

    <div class="container mt-5 pt-4">
        <div class="row justify-content-center">
            <h1 class="col-12 display-1 text-center mb-3">Presto.it</h1>
        </div>
        @auth
            <div class="row">
                <div class="col-12 text-center mt-5">
                    <a href="{{ route('createarticle') }}" class="btn btn-success">Pubblica un articolo</a>
                </div>
            </div>
        @endauth
        <x-success />

    </div>
</x-layout>
