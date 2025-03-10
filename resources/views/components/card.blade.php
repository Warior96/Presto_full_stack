<div class="card mx-auto mb-auto text-center my-3 bg-2-s c-5 p-2 card-w hover-expand">
    <img src="{{ $article->images->isNotEmpty() ? $article->images->first()->getUrl(600, 600) : 'https://picsum.photos/300' }}"
        class=" card-img-top {{ Route::currentRouteName() == 'homepage' ? 'img-cus' : 'aspect-ratio-1' }}"
        alt="Immagine dell'articolo {{ $article->title }}">

    <div class="card-body pb-0">
        <h4 class="card-title">{{ $article->title }}</h4>
        <h6 class="card-subtitle text-body-secondary">{{ __('ui.€') }} {{ $article->price }}</h6>
        <div class="card-buttons mt-2 px-3">
            <a href="{{ route('article.show', compact('article')) }}" class="btn btn-cus rounded-4 bg-1 text-black w-100 mb-2"
                id="a-dettaglio">{{ __('ui.dettaglio') }}</a>
            @if (Route::currentRouteName() != 'byCategory')
                <a href="{{ route('byCategory', ['category' => $article->category]) }}"
                    class="btn btn-cus rounded-4 bg-3 w-100 text-black"
                    id="a-categoria">{{ __("ui.{$article->category->name}") }}</a>
            @endif
        </div>
    </div>
</div>
