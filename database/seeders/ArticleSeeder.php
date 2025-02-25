<?php

namespace Database\Seeders;

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
        //  seeder categorie
        $articles = [
            ['title'=>'pianta', 'description'=>'pianta colorata verde', 'price'=>'20', 'category_id'=>rand(1, 10), 'user_id'=>'1'],
            ['title'=>'vaso', 'description'=>'vaso in ceramica bianca', 'price'=>'15', 'category_id'=>rand(1, 10), 'user_id'=>'1'],
            ['title'=>'cuscino', 'description'=>'cuscino con stampa geometrica', 'price'=>'12', 'category_id'=>rand(1, 10), 'user_id'=>'1'],
            ['title'=>'lampada', 'description'=>'lampada da tavolo moderna', 'price'=>'30', 'category_id'=>rand(1, 10), 'user_id'=>'1'],
            ['title'=>'tenda', 'description'=>'tenda opaca per finestre', 'price'=>'25', 'category_id'=>rand(1, 10), 'user_id'=>'1'],
            ['title'=>'sedia', 'description'=>'sedia in legno con cuscino', 'price'=>'35', 'category_id'=>rand(1, 10), 'user_id'=>'1'],
            ['title'=>'scrivania', 'description'=>'scrivania in legno naturale', 'price'=>'80', 'category_id'=>rand(1, 10), 'user_id'=>'1'],
            ['title'=>'libro', 'description'=>'libro di fantasia per adulti', 'price'=>'10', 'category_id'=>rand(1, 10), 'user_id'=>'1'],
            ['title'=>'specchio', 'description'=>'specchio rotondo da parete', 'price'=>'18', 'category_id'=>rand(1, 10), 'user_id'=>'1'],
            ['title'=>'tazza', 'description'=>'tazza con scritta motivazionale', 'price'=>'8', 'category_id'=>rand(1, 10), 'user_id'=>'1'],
            ['title'=>'foto quadro', 'description'=>'quadro con stampa fotografica', 'price'=>'40', 'category_id'=>rand(1, 10), 'user_id'=>'1'],
            ['title'=>'orologio', 'description'=>'orologio da parete in metallo', 'price'=>'50', 'category_id'=>rand(1, 10), 'user_id'=>'1'],
            ['title'=>'piante grasse', 'description'=>'piccole piante grasse in vaso', 'price'=>'15', 'category_id'=>rand(1, 10), 'user_id'=>'1'],
            ['title'=>'candelabro', 'description'=>'candelabro elegante in metallo', 'price'=>'22', 'category_id'=>rand(1, 10), 'user_id'=>'1'],
            ['title'=>'pouf', 'description'=>'pouf morbido in tessuto', 'price'=>'45', 'category_id'=>rand(1, 10), 'user_id'=>'1']
        ];


        foreach ($articles as $article) {
                DB::table('articles')->insert([
                    'title' => $article['title'],
                    'description' => $article['description'],
                    'price' => $article['price'],
                    'category_id' => $article['category_id'],
                    'user_id' => $article['user_id']
                ]);
        }
    }
}
