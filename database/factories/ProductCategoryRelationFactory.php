<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\ProductCategoryRelation;

class ProductCategoryRelationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductCategoryRelation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => $this->faker->numberBetween(-10000, 10000),
            'category_id' => $this->faker->numberBetween(-10000, 10000),
            'deleted_at' => $this->faker->word,
        ];
    }
}
