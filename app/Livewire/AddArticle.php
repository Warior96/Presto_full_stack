<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;

class AddArticle extends Component
{
    #[Validate('required', message: 'Il nome è obbligatorio')]
    #[Validate('min:3', message: 'Il nome deve essere almeno di 3 caratteri')]
    #[Validate('max:15', message: 'Il nome deve essere al massimo di 15 caratteri')]
    public $title;

    #[Validate('required', message: 'Il prezzo è obbligatorio')]
    #[Validate('numeric', message: 'Il prezzo deve essere numerico')]
    #[Validate('min:1.00', message: 'Il prezzo deve essere maggiore di 1 euro')]
    public $price;

    #[Validate('required', message: 'La descrizione è obbligatoria')]
    #[Validate('min:10', message: 'La descrizione deve essere almeno di 10 caratteri')]
    #[Validate('max:999', message: 'La descrizione deve essere massimo di 999 caratteri')]
    public $description;

    #[Validate('required', message: 'La categoria è obbligatoria')]
    public $category;

    // funzione di creazione articoli
    public function createArticles()
    {
        // funzione di validazione
        $this->validate();

        // funzione di creazione
        Article::create([
            "title" => $this->title,
            "description" => $this->description,
            "price" => $this->price,
            "category_id" => $this->category,
            "user_id" => Auth::id(),
        ]);

        // funzione di pulizia
        $this->puliziaCampi();
        return redirect()->route('createarticle')->with('success', 'Articolo aggiunto con successo');
        // session()->flash('success', 'Articolo aggiunto con successo');
        // return redirect()->route('createarticle');
    }

    // pulizia campi
    protected function puliziaCampi()
    {
        $this->title = "";
        $this->price = "";
        $this->description = "";
    }

    public function render()
    {
        return view('livewire.add-article');
    }
}
