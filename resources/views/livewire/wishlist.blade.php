<div>
    @if ($addedToWishlist)
        <form wire:submit="addToWish" class="wishlist position-absolute">
            @csrf
            <button type="submit" class="wishlistbtn wishlistadd">
                <i class="fa-regular fa-heart fs-4 c-5"></i>
            </button>
        </form>
    @else
        <livewire:wishlist-remover :article="$article" />
    @endif
</div>
