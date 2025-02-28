<div class="col-12">
    <div class="card mx-auto card-w shadow p-2 text-center mb-3 bg-info-subtle">

        <img src="https://picsum.photos/301/300" class="card-img-top img-fluid"
            alt="Immagine dell'articolo {{ $article->title }}">
        <div class="card-body">
            <h4 class="card-title">{{ $article->title }}</h4>
            <h6 class="card-subtitle text-body-secondary"> {{ $article->price }} €</h6>
            <div class=" mt-5 px-3">
                <a href="{{ route('article.show', compact('article')) }}"
                    class="btn btn-primary w-100 mb-2">{{ __('ui.dettaglio') }}</a>
                @if (Route::currentRouteName() != 'byCategory')
                    <a href="{{ route('byCategory', ['category' => $article->category]) }}"
                        class="btn btn-outline-info w-100 text-black">{{ __("ui.{$article->category->name}") }}</a>
                @endif
            </div>
        </div>
    </div>
</div>
