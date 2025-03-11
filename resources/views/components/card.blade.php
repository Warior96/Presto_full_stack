<div class="card mx-auto mb-auto text-center my-2 bg-2-s c-5 card-w hover-expand">
    <img src="{{ $article->images->isNotEmpty() ? $article->images->first()->getUrl(600, 600) : 'https://picsum.photos/300' }}"
        class="card-img-top {{ Route::currentRouteName() == 'homepage' ? 'img-cus' : 'aspect-ratio-1' }}"
        alt="Immagine dell'articolo {{ $article->title }}">

    <div class="card-body px-0 pt-2 pb-0">
        <h4 class="card-title">{{ $article->title }}</h4>
        <h5 class="card-subtitle text-body-secondary">{{ __('ui.€') }} {{ $article->price }}</h5>
        <div class="card-buttons mt-2">
            <a href="{{ route('article.show', compact('article')) }}" class="btn btn-cus rounded-pill bg-1 text-black w-45"
                id="a-dettaglio">{{ __('ui.dettaglio') }}</a>
            @if (Route::currentRouteName() != 'byCategory')
                <a href="{{ route('byCategory', ['category' => $article->category]) }}"
                    class="btn btn-cus rounded-pill w-45 text-black"
                    id="a-categoria">{{ __("ui.{$article->category->name}") }}</a>
            @endif
        </div>
    </div>
</div>
