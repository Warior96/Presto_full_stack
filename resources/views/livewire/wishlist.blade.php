<div>
    {{-- @dump($addedToWishlist) --}}
    @if($addedToWishlist)
    <form wire:submit="addToWish" class="wishlist position-absolute">
        @csrf
        <button type="submit" class="wishlistbtn wishlistadd">
            <i class="fa-regular fa-heart fs-4 c-5"></i>
        </button>
    </form>
    @else
    {{-- <form wire:submit="deleteWish">
        @csrf
        <button type="submit" class="wishlistbtn bg-5 wishlistremove">
            <i class="fa-solid fa-heart fs-4 c-1"></i>
        </button>
    </form> --}}
    <livewire:wishlist-remover :article="$article" />
    @endif
</div>