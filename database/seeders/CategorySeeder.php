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
            'Elettronica',
            'Abbigliamento',
            'Bellezza',
            'Giardinaggio',
            'Giocattoli',
            'Sport',
            'Tecnologia',
            'Libri e riviste',
            'Accessori',
            'Motori'
        ];

        foreach ($categories as $category) {
            if (!DB::table('categories')->where('name', $category)->exists()) {
                DB::table('categories')->insert(['name' => $category]);
            }
        }
    }
}
