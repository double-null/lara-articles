<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleTagSeeder extends Seeder
{
    public function run()
    {
        $articles = Article::all()->pluck('id')->toArray();
        $tags = Tag::all()->pluck('id')->toArray();
        foreach ($articles as $article) {
            $tag_keys = array_rand($tags, rand(2, 5));
            foreach ($tag_keys as $key) {
                DB::table('article_tag')->insert([
                    'article_id' => $article,
                    'tag_id' => $tags[$key],
                ]);
            }
        }
    }
}
