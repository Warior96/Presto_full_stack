<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    //  ['title','description','price','category_id','user_id',];

    public function run(): void
    {
        $users = DB::table('users')->get();
        $categories = DB::table('categories')->get();
        //  seeder categorie
        $articles = [
            ['title' => 'pianta', 'description' => 'pianta colorata verde', 'price' => 20.15],
            ['title' => 'vaso', 'description' => 'vaso in ceramica bianca', 'price' => 15],
            ['title' => 'cuscino', 'description' => 'cuscino con stampa geometrica', 'price' => 12],
            ['title' => 'lampada', 'description' => 'lampada da tavolo moderna', 'price' => 300],
            ['title' => 'tenda', 'description' => 'tenda opaca per finestre', 'price' => 25],
            ['title' => 'sedia', 'description' => 'sedia in legno con cuscino', 'price' => 35],
            ['title' => 'scrivania', 'description' => 'scrivania in legno naturale', 'price' => 80],
            ['title' => 'libro', 'description' => 'libro di fantasia per adulti', 'price' => 10.99],
            ['title' => 'specchio', 'description' => 'specchio rotondo da parete', 'price' => 18],
            ['title' => 'tazza', 'description' => 'tazza con scritta motivazionale', 'price' => 8],
            ['title' => 'foto quadro', 'description' => 'quadro con stampa fotografica', 'price' => 40],
            ['title' => 'orologio', 'description' => 'orologio da parete in metallo', 'price' => 50],
            ['title' => 'piante grasse', 'description' => 'piccole piante grasse in vaso', 'price' => 15],
            ['title' => 'candelabro', 'description' => 'candelabro elegante in metallo', 'price' => 22.30],
            ['title' => 'pouf', 'description' => 'pouf morbido in tessuto', 'price' => 45]
        ];

        $articlesToInsert = [];

        foreach ($articles as $article) {
            $articlesToInsert[] = [
                'title' => $article['title'],
                'description' => $article['description'],
                'price' => $article['price'],
                'category_id' => $categories->random()->id,
                'user_id' => $users->random()->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }
        DB::table('articles')->insert($articlesToInsert);
    }
}