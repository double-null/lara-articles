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
            'title' => $this->faker->sentence(5),
            'slug' => $this->faker->unique()->randomNumber,
            'content' => $this->faker->text(1500),
            'preview' => $this->faker->imageUrl(),
            'views' => 0,
            'likes' => 0,
            'created_at' => $this->faker->dateTime(),
            'updated_at' => $this->faker->dateTime(),
        ];
    }
}
