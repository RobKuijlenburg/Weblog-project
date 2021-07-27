<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $categoryCount = Category::count();

        $articles = Article::factory(10)->create();
        
        $articles->each(function (Article $article) use ($categoryCount) {
            for ($i=0; $i < rand(1, $categoryCount); $i++) {
                $article->categories()->syncWithoutDetaching(rand(1, $categoryCount));
            }
        });
    }
}
