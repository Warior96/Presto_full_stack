<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class ArticleController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            new Middleware('auth', only: ['createArticle'])
        ];
    }

    public function createArticle()
    {
        return view('storeArticle.createarticle');
    }
    public function indexAll()
    {
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->paginate(10);
        return view('storeArticle.indexAll', compact('articles'));
    }
    public function show(Article $article)
    {
        return view('storeArticle.show', compact('article'));
        dd($article);
    }
    public function byCategory(Category $category)
    {
        $articles = $category->articles->where('is_accepted', true);
        return view('storeArticle.byCategory', compact('articles', 'category'));
    }
}
