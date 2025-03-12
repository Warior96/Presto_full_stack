<div class="wishlist position-absolute">
    <form wire:submit="deleteWish">
        @csrf
        <button type="submit" class="wishlistbtn">
            <i class="fa-regular fa-heart fs-4 c-5"></i>
        </button>
    </form>
</div>
