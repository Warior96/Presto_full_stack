<x-layout>
    <header class="container mt-5 pt-4">
        <div class="row justify-content-center">
            <h1 class="col-12 display-2 text-center mb-3">
                Articoli da revisionare
            </h1>
        </div>
    </header>

    <div class="container">
        @if ($article_to_check)
            <div class="row">
                <div class="col-8">
                    @for ($i = 0; $i < 6; $i++)
                        <img src="https://picsum.photos/100/200" alt="">
                    @endfor
                    <div class="col">
                        <form action="" method='POST'>
                            @csrf
                            <button class="btn btn-danger">Rifiuta</button>
                        </form>

                        <form action="" method='POST'>
                            @csrf
                            <button class="btn btn-success">Accetta</button>
                        </form>
                    </div>
                </div>
            </div>
        @else
            <h1>Nessun articolo da revisionare</h1>
            <a href="{{ route('homepage') }}">Torna alla home</a>
        @endif
    </div>
</x-layout>
