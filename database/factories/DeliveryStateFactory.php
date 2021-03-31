<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\DeliveryCompany;
use App\DeliveryState;
use App\State;

class DeliveryStateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DeliveryState::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'delivery_company_id' => DeliveryCompany::factory(),
            'state_id' => State::factory(),
            'price' => $this->faker->randomFloat(2, 0, 999999.99),
        ];
    }
}
