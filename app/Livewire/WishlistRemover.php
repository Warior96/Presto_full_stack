<?php

namespace App\Livewire;
// namespace App\Http\Livewire;
use App\Models\Article;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class WishlistRemover extends Component
{

    public $article;
    public $wishlist;
    public $removedToWishlist = false;
    public function mount(Article $article)
    {
        $this->article = $article;
    }

    public function deleteWish()
    {
        $user = Auth::user();
        // Aggiungi l'articolo alla wishlist
        $article = Article::find($this->article->id);
        $user->wishlist()->detach($article->id);
        $this->removedToWishlist = true;
        // dd($this->removedToWishlist);

        // $this->emit('wishlistUpdated');
        // $this->dispatch('wishlistUpdated', ['articleId' => $this->article->id, 'action' => 'remove']);

    }

    public function addToWish()
    {
        $user = Auth::user();
        // Aggiungi l'articolo alla wishlist
        $article = Article::find($this->article->id);
        // dd($article);
        $user->wishlist()->syncWithoutDetaching([$article->id]);
        $this->addedToWishlist = false;


        // $this->dispatch('wishlistUpdated', ['articleId' => $this->article->id, 'action' => 'add']);
    }

    public function render()
    {
        return view('livewire.wishlist-remover');
    }
}
