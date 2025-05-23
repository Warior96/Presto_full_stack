<?php

namespace App\Livewire;

use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\RemoveFaces;
use App\Models\Article;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
use App\Jobs\ResizeImage;

class AddArticle extends Component
{
    use WithFileUploads;

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

    #[Validate('required', message: 'La condizione è obbligatoria')]
    public $condition;

    public $article;

    public $images = [];
    public $temporary_images;

    // funzione di creazione articoli
    public function createArticles()
    {
        // funzione di validazione
        $this->validate();

        // funzione di creazione
        $this->article = Article::create([
            "title" => $this->title,
            "description" => $this->description,
            "price" => $this->price,
            "category_id" => $this->category,
            "condition" => $this->condition,
            "user_id" => Auth::id(),
        ]);

        // aggiunta immagini
        if (count($this->images) > 0) {
            foreach ($this->images as $image) {
                $newFileName = "articles/{$this->article->id}";
                $newImage = $this->article->images()->create(
                    [
                        "path" => $image->store($newFileName, 'public')
                    ]
                );
                RemoveFaces::withChain([
                    new ResizeImage($newImage->path, 600, 600),
                    new GoogleVisionSafeSearch($newImage->id),
                    new GoogleVisionLabelImage($newImage->id),
                ])->dispatch($newImage->id);
            }

            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }

        // funzione di pulizia
        $this->puliziaCampi();
        return redirect()->route('createarticle')->with('success', 'Il tuo articolo è stato caricato ed è in attesa di approvazione');
    }

    // funzione di aggiunta immagini
    public function updatedTemporaryImages()
    {
        // validazione
        if (
            $this->validate([
                'temporary_images.*' => 'mimes:jpg,jpeg,png',
                'temporary_images' => 'max:5',
            ], [
                'temporary_images.*.mimes' => 'Il file deve essere un\'immagine in formato jpg, jpeg o png',
                'temporary_images.max' => 'Non puoi caricare più di 5 immagini',
            ])
        ) {
            if (
                $this->validate([
                    'temporary_images.*' => 'max:1024',
                ], [
                    'temporary_images.*.max' => 'L\'immagine non deve superare i 1024 KB',
                ])
            )
                foreach ($this->temporary_images as $image) {
                    $this->images[] = $image;
                }
        }
    }

    // eliminare immagini
    public function removeImage($key)
    {
        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }

    // pulizia campi
    protected function puliziaCampi()
    {
        $this->title = "";
        $this->description = "";
        $this->price = "";
        $this->images = [];
    }

    public function render()
    {
        return view('livewire.add-article');
    }
}
