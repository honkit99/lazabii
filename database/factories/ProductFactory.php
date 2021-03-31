<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Product;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'price' => $this->faker->randomFloat(2, 0, 999999.99),
            'quantity' => $this->faker->numberBetween(-10000, 10000),
            'description' => $this->faker->text,
            'status' => $this->faker->numberBetween(-8, 8),
        ];
    }
}
