<div>
    @if (!$removedToWishlist)
        <form wire:submit="deleteWish" class="wishlist position-absolute">
            @csrf
            <button type="submit" class="wishlistbtn bg-5 wishlistremove">
                <i class="fa-solid fa-heart fs-4 c-1"></i>
            </button>
        </form>
    @else
        <livewire:wishlist :article="$article" />
    @endif
</div>
