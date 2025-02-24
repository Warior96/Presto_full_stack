<x-layout>
    <div class="container mt-5 pt-3">
        <div class="row height-custom justify-content-center align-items-center text-center">
            <div class="col-12">
                <h1 class="display-4">Dettaglio dell'articolo: {{ $article->title }}</h1>
            </div>
        </div>
        <div class="row height-custom justify-content-center py-5">
            <div class="col-12 col-md-6 mb-2">
                <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://picsum.photos/400" class="d-block w-100 rounded shadow" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/401" class="d-block w-100 rounded shadow" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/402" class="d-block w-100 rounded shadow" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span> 
                    </button>
                </div>
            </div>
            <div class="col-12 col-md-6 mb-3 height-custom ">
                <h2 class="display-5 text-center"><span class="fw-bold">Titolo: </span>{{ $article->title }}</h2>
                <div class=" h-75 m-5">
                    <h4 class="fw-bold mb-3">Prezzo: {{ $article->price }} €</h4>
                    <h5>Descrizione: {{ $article->description }}</h5>
                </div>
            </div>
        </div>
    </div>
</x-layout>
