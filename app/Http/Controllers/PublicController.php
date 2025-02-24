<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {

        $articles = Article::take(6)->orderBy('created_at', 'desc')->get();
        return view('index', compact('articles'));
    }
}
