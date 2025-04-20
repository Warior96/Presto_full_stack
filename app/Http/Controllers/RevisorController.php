<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Mail\BecomeRevisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    // view index
    public function index()
    {
        $article_to_check = Article::where('is_accepted', null)->first();
        $articles = Article::all();
        return view('revisor.index', compact('article_to_check', 'articles'));
    }

    // accettare articoli
    public function accept(Article $article)
    {
        $article->setAccepted(true);
        return redirect()->back()->with('success', "Hai accettato l'articolo $article->title");
    }

    // rifiutare articoli
    public function reject(Article $article)
    {
        $article->setAccepted(false);
        return redirect()->back()->with('reject', "Hai rifiutato l'articolo $article->title");
    }

    // annulla modifica
    public function back($article)
    {
        $article_back = Article::find($article);
        $article_back->setAccepted(null);
        return redirect()->back();
    }

    // richiesta via mail per diventare revisor
    public function becomeRevisor(Article $article)
    {
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));
        return redirect()->route('homepage')->with('message', 'Complimenti, la tua richieta di diventare revisor è stata inviata correttamente');
    }

    // rendere utente revisore
    public function makeRevisor(User $user)
    {
        Artisan::call('app:make-user-revisor', ['email' => $user->email]);
        return redirect()->back();
    }


    // view lavora con noi
    public function lavoraConNoi()
    {
        return view('revisor.lavora-con-noi');
    }
}
