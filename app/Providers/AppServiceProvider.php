<?php

namespace App\Providers;

use App\Models\Article;

use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        // categorie disponibili ovunque
        if (Schema::hasTable('categories')) {
            View::share('categories', Category::orderBy('name')->get());
        }
        // Condividi gli articoli globalmente se la tabella esiste
        if (Schema::hasTable('articles')) {
            View::share('articles', Article::all());
        }
        //rendiamo globale la request della navbar search
        View::share('query', request()->query('query', ''));

        $categoryIcons = [
            'Elettronica'        => 'fa-tv',
            'Abbigliamento'      => 'fa-tshirt',
            'Bellezza'           => 'fa-paint-brush',
            'Giardinaggio'       => 'fa-leaf',
            'Giocattoli'         => 'fa-puzzle-piece',
            'Sport'              => 'fa-football-ball',
            'Tecnologia'         => 'fa-cogs',
            'Libri e riviste'    => 'fa-book',
            'Accessori'          => 'fa-glasses',
            'Motori'             => 'fa-car',
        ];
        View::share('categoryIcons', $categoryIcons);
    }
}
