<?php

use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

//creazione del gruppo publicController
Route::controller(PublicController::class)->group(function(){
    //rotta che rimanda alla homepage del sito web
    Route::get('/', 'index')->name('homepage');
});
