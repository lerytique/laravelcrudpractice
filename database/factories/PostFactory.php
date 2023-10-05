<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory

{
    protected $model = Post::class;

    /**
     * @throws Exception
     */
    public function definition(): array
    {
        return array(
            'title' => $this->faker->title(22),
            'content' => $this->faker->text,
            'image' => $this->faker->imageUrl(),
            'likes' => random_int(1,100),
            'category_id' => Category::pluck()->random()
        );
    }
}
