<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => rand(1, 10),
            'title' => $this->faker->realText($maxNbChars = 20, $indexSize = 2),
            'slug' => $this->faker->realText($maxNbChars = 10, $indexSize = 2),
            'excerpt' => $this->faker->realText($maxNbChars = 50, $indexSize = 2),
            'body' => $this->faker->realText($maxNbChars = 800, $indexSize = 2),
            'img' => 'https://source.unsplash.com/random/800x600',
            'premium' => $this->faker->boolean()
        ];
    }
}
