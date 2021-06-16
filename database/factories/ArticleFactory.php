<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{

    protected $model = Article::class;

    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'slug' => $this->faker->unique()->words(),
            'content' => $this->faker->text(),
            'preview' => $this->faker->text(),
            'views' => 0,
            'likes' => 0,
            'created_at' => $this->faker->dateTime(),
        ];
    }
}
