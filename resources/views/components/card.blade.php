<div class="card mx-auto card-w shadow p-5 text-center mb-3">

    <img src="https://picsum.photos/200" class="card-img-top" alt="Immagine dell'articolo {{ $article->title }}">
    <div class="card-body">
        <h4 class="card-title">{{ $article->title }}</h4>
        <h6 class="card-subtitle text-body-secondary"> {{ $article->price }} €</h6>
        <div class=" mt-5">
            <a href="{{ route('article.show', compact('article')) }}" class="btn btn-primary w-100 mb-2">Dettaglio</a>
            <a href="{{ route('byCategory', ['category' => $article->category]) }}"
                class="btn btn-outline-info w-100">{{ $article->category->name }}</a>
        </div>

    </div>
</div>
