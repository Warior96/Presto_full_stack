<div class="offcanvas offcanvas-start {{ $isOpen ? 'show' : '' }}" tabindex="-1" id="offcanvasExample"
    aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasExampleLabel">Wishlist</h5>
        <button type="button" class="btn-close" wire:click="toggleSidebar" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="container">
            <div class="row">
                @foreach (Auth::user()->wishlist as $wish)
                    <div class="col-6 mb-4">
                        <div class="card rounded-4 px-2 bg-2-s">
                            <h5 class="text-center mt-2">{{ $wish->title }}</h5>
                            <hr class="divider mt-0 mb-2">
                            <img src="{{ $wish->images->isNotEmpty() ? $wish->images->first()->getUrl(600, 600) : 'https://picsum.photos/300' }}"
                                class="card-img-top rounded-4" alt="...">
                            <a href="{{ route('article.show', compact('article')) }}"
                                class="btn btn-cus rounded-pill bg-1 text-black w-100 my-2"
                                id="a-dettaglio">{{ __('ui.dettaglio') }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>