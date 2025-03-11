<x-layout>
    <header class="container-fluid mt-5 pt-4 min-vh-100">
        <div class="row justify-content-center align-items-center text-center">
            <div class="col-12">
                <h1 class="display-5 pt-4 pb-2">Tutti i prodotti in vendita</h1>
            </div>
        </div>
        <div class="row wh-100 justify-content-center align-items-center pb-4">

            @forelse ($articles as $article)
                <div class="col-12 col-md-3 m-3 h">
                    <x-card :article="$article" />
                </div>

            @empty

                <div class="col-12">
                    <p class="text-center my-3 fs-5"> Non sono ancora stati creati {{ __('ui.prodotto')}} </p>
                </div>
            @endforelse

        </div>
    </header>

    <div class="d-flex justify-content-center pt-4 my-2">
        {{ $articles->links() }}
    </div>

    <x-footer></x-footer>
</x-layout>
