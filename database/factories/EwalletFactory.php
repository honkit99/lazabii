<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Ewallet;

class EwalletFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ewallet::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'current_balance' => $this->faker->randomFloat(2, 0, 999999.99),
            'transaction_amount' => $this->faker->randomFloat(2, 0, 999999.99),
            'new_balance' => $this->faker->randomFloat(2, 0, 999999.99),
        ];
    }
}
