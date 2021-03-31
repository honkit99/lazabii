<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Cart;
use App\Order;
use App\Product;
use App\Refund;

class RefundFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Refund::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order_id' => Order::factory(),
            'status' => $this->faker->numberBetween(-8, 8),
            'cart_id' => Cart::factory(),
            'product_id' => Product::factory(),
            'product_name' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'product_price' => $this->faker->randomFloat(2, 0, 999999.99),
            'product_qty' => $this->faker->numberBetween(-10000, 10000),
        ];
    }
}
