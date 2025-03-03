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
                'img' => 'categories-img/elettronica.jpg',
            ],
            [
                'name' => 'Abbigliamento',
                'img' => 'categories-img/abbigliamento.jpg',
            ],
            [
                'name' => 'Bellezza',
                'img' => 'categories-img/bellezza.jpg',
            ],
            [
                'name' => 'Giardinaggio',
                'img' => 'categories-img/giardinaggio.jpg',
            ],
            [
                'name' => 'Giocattoli',
                'img' => 'categories-img/giocattoli.jpg',
            ],
            [
                'name' => 'Sport',
                'img' => 'categories-img/sport.jpg',
            ],
            [
                'name' => 'Tecnologia',
                'img' => 'categories-img/tecnologia.jpg',
            ],
            [
                'name' => 'Libri e riviste',
                'img' => 'categories-img/libri.jpg',
            ],
            [
                'name' => 'Accessori',
                'img' => 'categories-img/accessori.jpg',
            ],
            [
                'name' => 'Motori',
                'img' => 'categories-img/motori.jpg',
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
