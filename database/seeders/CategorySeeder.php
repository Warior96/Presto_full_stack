<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //  seeder categorie
        $categories = [
            [
                'name' => 'Elettronica',
                'img' => 'categories-img/elettronica.png',
            ],
            [
                'name' => 'Abbigliamento',
                'img' => 'categories-img/abbigliamento.png',
            ],
            [
                'name' => 'Bellezza',
                'img' => 'categories-img/bellezza.png',
            ],
            [
                'name' => 'Giardinaggio',
                'img' => 'categories-img/giardinaggio.png',
            ],
            [
                'name' => 'Giocattoli',
                'img' => 'categories-img/giocattoli.png',
            ],
            [
                'name' => 'Sport',
                'img' => 'categories-img/sport.png',
            ],
            [
                'name' => 'Tecnologia',
                'img' => 'categories-img/tecnologia.png',
            ],
            [
                'name' => 'Libri e riviste',
                'img' => 'categories-img/libri.png',
            ],
            [
                'name' => 'Accessori',
                'img' => 'categories-img/accessori.png',
            ],
            [
                'name' => 'Motori',
                'img' => 'categories-img/motori.png',
            ],
        ];

        foreach ($categories as $category) {
            if (!DB::table('categories')->where('name', $category['name'])->exists()) {
                DB::table('categories')->insert(['name' => $category['name'], 'img' => $category['img']]);
            } else {
                $existingCategory = DB::table('categories')->where('name', $category['name'])->first();
                if (!$existingCategory->img) {
                    DB::table('categories')->where('name', $category['name'])->update(['img' => $category['img']]);
                }
            }
        }
    }
}
