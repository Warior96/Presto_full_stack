<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;

//creazione del gruppo publicController
Route::controller(PublicController::class)->group(function () {
    //rotta che rimanda alla homepage del sito web
    Route::get('/', 'index')->name('homepage');
});

// gruppo articoli articleController
Route::prefix('articles/')->controller(ArticleController::class)->group(function () {
    //rotta che rimanda alla homepage del sito web
    Route::get('create', 'createArticle')->name('createarticle');
    Route::get('indexAll', 'indexAll')->name('article.indexAll');
    Route::get('show/article/{article}', 'show')->name('article.show');
    Route::get('/category/{category}', 'byCategory')->name('byCategory');
});
