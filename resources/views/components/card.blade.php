<div class="col-12 mb-4">
    <div class="card mx-auto card-w p-2 text-center my-1 bg-1 c-5" id="card">
        {{-- <div class="h-50 w-100"> --}}
            <img src="{{ $article->images->isNotEmpty() ? Storage::url($article->images->first()->path) : 'https://picsum.photos/200' }}"
                class="card-img-top img-fluid {{ Route::currentRouteName() != 'article.indexAll' ? 'img-cus' : 'aspect-ratio-1' }} " alt="Immagine dell'articolo {{ $article->title }}">
        {{-- </div> --}}
        <div class="card-body">
            <h4 class="card-title">{{ $article->title }}</h4>
            <h6 class="card-subtitle text-body-secondary"> {{ $article->price }} €</h6>
            <div class=" mt-5 px-3">
                <a href="{{ route('article.show', compact('article')) }}" class="btn btn-cus bg-2 text-black w-100 mb-2"
                    id="a-dettaglio">{{ __('ui.dettaglio') }}</a>
                @if (Route::currentRouteName() != 'byCategory')
                    <a href="{{ route('byCategory', ['category' => $article->category]) }}"
                        class="btn btn-cus bg-3 w-100 text-black"
                        id="a-categoria">{{ __("ui.{$article->category->name}") }}</a>
                @endif
            </div>
        </div>
    </div>
</div>
