<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Category;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'parent_id' => $this->faker->numberBetween(-10000, 10000),
            'name' => $this->faker->name,
            'image' => $this->faker->text,
            'status' => $this->faker->numberBetween(-8, 8),
            'deleted_at' => $this->faker->word,
        ];
    }
}
