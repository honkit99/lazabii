<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\DeliveryCompany;

class DeliveryCompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DeliveryCompany::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'code' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'tracking_url' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'estimate' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'status' => $this->faker->numberBetween(-8, 8),
        ];
    }
}
