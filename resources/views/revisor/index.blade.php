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
            <div class="row justify-content-center pt-5">
                <div class="col-md-8">
                    <div class="row justify-content-center">
                        @for ($i = 0; $i < 6; $i++)
                            <div class="col-6 col-md-4 mb-4 text-center">
                                <img src="https://picsum.photos/100/200" class="img-fluid rounded shadow" alt="">
                            </div>
                        @endfor
                    </div>
                </div>
                {{-- Dettagli dell'articolo da revisionare --}}
                <div class="col-md-4">
                    <div>
                        <h1>
                            {{ $article_to_check->title }}
                        </h1>
                        <h3>
                            Autore: {{ $article_to_check->user->name }}
                        </h3>
                        <h4>
                            {{ $article_to_check->price }}€
                        </h4>
                        <h4 class="fst-italic text-muted">
                            #{{ $article_to_check->category->name }}
                        </h4>
                        <p class="h6">
                            {{ $article_to_check->description }}
                        </p>
                    </div>
                </div>
            </div>


            <div class="d-flex pb-4 justify-content-around">
                <form action="{{ route('reject', ['article' => $article_to_check]) }}" method='POST'>
                    @csrf
                    @method('PATH')
                    <button class="btn btn-danger py-2 px-5 fw-bold">Rifiuta</button>
                </form>

                @if (session()->has('message'))
                    <div class="row justify-content-center">
                        <div class="col-5 alert alert-success text-center shadow rounded">
                            {{ session('message') }}
                        </div>
                    </div>
                @endif
                <form action="{{ route('accept', ['article' => $article_to_check]) }}" method='POST'>
                    @csrf
                    @method('PATH')
                    <button class="btn btn-success py-2 px-5 fw-bold">Accetta</button>
                </form>

            </div>
        @else
            <div class="row justify-content-center align-items-center text-center">
                <div class="col-12">


                    <h1 class="fst-italic display-4">
                        Nessun articolo da revisionare
                    </h1>

                    <a href="{{ route('homepage') }}" class="mt-5 btn btn-black">
                        Torna alla home
                    </a>
                </div>
            </div>
        @endif
    </div>
    </div>
</x-layout>
