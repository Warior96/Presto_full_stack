<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class WishlistRemover extends Component
{

public $article;
    public $wishlist;
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
    }
}



// public $article;
//     public $wishlist;
//     public function mount(Article $article)
//     {
//         $this->article = $article;
//     }

//     public function addToWish()
//     {
//         $user = Auth::user();
//         // Aggiungi l'articolo alla wishlist
//         $article = Article::find($this->article->id);
//         // dd($article);
//         $user->wishlist()->syncWithoutDetaching([$article->id]);
//         session()->flash('message', 'Articolo aggiunto alla wishlist!');
//     }