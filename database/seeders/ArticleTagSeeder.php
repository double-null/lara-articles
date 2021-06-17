<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class ArticleTagSeeder extends Seeder
{
    public function run()
    {
        $articles = Article::all()->pluck('id')->toArray();
        $tags = Tag::all()->pluck('id')->toArray();
        foreach ($articles as $article) {
            $tag_keys = array_rand($tags, rand(2, 5));
            for ($i = 0; $i <= count($tag_keys); $i++) {
                $data[] = [

                ];
            }
        }
    }
}
