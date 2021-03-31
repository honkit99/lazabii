<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Order;
use App\Voucher;

class VoucherFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Voucher::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order_id' => Order::factory(),
            'type' => $this->faker->word,
            'discount' => $this->faker->numberBetween(-10000, 10000),
            'quantity' => $this->faker->numberBetween(-10000, 10000),
        ];
    }
}
