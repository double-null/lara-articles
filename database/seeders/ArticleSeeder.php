<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

/**
 * Class ArticleSeeder
 * @package Database\Seeders
 */
class ArticleSeeder extends Seeder
{
    public function run()
    {
        Article::factory()->count(50)->create();
    }
}
