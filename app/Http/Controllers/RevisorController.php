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
    public function index()
    {
        $article_to_check = Article::where('is_accepted', null)->first();
        return view('revisor.index', compact('article_to_check'));
    }

    public function accept(Article $article)
    {
        $article->setAccepted(true);
        return redirect()->back()->with('success', "Hai accettato l'articolo $article->title");
    }
    public function reject(Article $article)
    {
        $article->setAccepted(false);
        return redirect()->back()->with('reject', "Hai rifiutato l'articolo $article->title");
    }

    // funzione back da sistemare - annulla tutte le revisioni
    public function back()
    {
        $article_to_check = Article::whereNotNull('is_accepted')->orderBy('updated_at', 'desc')->first();
        $article_to_check->setAccepted(null);
        return redirect()->back();
    }
    public function becomeRevisor(Article $article)
    {
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));
        return redirect()->route('homepage')->with('message', 'Complimenti, la tua richieta di diventare revisor è stata inviata correttamente');
    }
    public function makeRevisor(User $user)
    {
        Artisan::call('app:make-user-revisor', ['email' => $user->email]);
        return redirect()->back();
    }

    public function lavoraConNoi()
    {
        return view('revisor.lavora-con-noi');
    }
}
