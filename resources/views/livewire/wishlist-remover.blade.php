<div >
    {{-- @dump($removedToWishlist) --}}
    @if(!$removedToWishlist)
    <form wire:submit="deleteWish" class="wishlist position-absolute">
        @csrf
        <button type="submit" class="wishlistbtn bg-5 wishlistremove">
            <i class="fa-solid fa-heart fs-4 c-1"></i>
        </button>
    </form>
    @else
    {{-- <form wire:submit="addToWish">
        @csrf
        <button type="submit" class="wishlistbtn wishlistadd">
            <i class="fa-regular fa-heart fs-4 c-5"></i>
        </button>
    </form> --}}
    <livewire:wishlist :article="$article" />
    @endif
</div>


{{-- class="wishlist position-absolute" --}}