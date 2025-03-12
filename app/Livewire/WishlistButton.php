<?php

namespace App\Livewire;

use Livewire\Component;

class WishlistButton extends Component
{

    // public $article;

    // protected $listeners = ['wishlistUpdated' => 'render'];

    // public function render()
    // {
    //     return view('livewire.wishlist-button', [
    //         'isInWishlist' => Auth::user()->wishlist->contains($this->article->id),
    //     ]);
    // }



    public function render()
    {
        return view('livewire.wishlist-button');
    }
}
