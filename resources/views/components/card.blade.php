{{-- <div class="col-12 col-md-6 col-lg-3 mb-4"> --}}
    <div class="card mx-auto text-center my-3 bg-2-s c-5 p-3 card-w">
        <img src="{{ $article->images->isNotEmpty() ? $article->images->first()->getUrl(600, 600) : 'https://picsum.photos/300' }}"
            class=" card-img-top {{ Route::currentRouteName() == 'homepage' ? 'img-cus' : 'aspect-ratio-1' }}"
            alt="Immagine dell'articolo {{ $article->title }}">

        {{-- </div> --}}
        <div class="card-body pb-1">
            <h4 class="card-title">{{ $article->title }}</h4>
            <h6 class="card-subtitle text-body-secondary"> {{ $article->price }} {{ __('ui.€') }}</h6>
            <div class=" mt-3 px-3">
                <a href="{{ route('article.show', compact('article')) }}" class="btn btn-cus bg-1 text-black w-100 mb-2"
                    id="a-dettaglio">{{ __('ui.dettaglio') }}</a>
                @if (Route::currentRouteName() != 'byCategory')
                    <a href="{{ route('byCategory', ['category' => $article->category]) }}"
                        class="btn btn-cus bg-3 w-100 text-black"
                        id="a-categoria">{{ __("ui.{$article->category->name}") }}</a>
                @endif
            </div>
        </div>
    {{-- </div> --}}
</div>
