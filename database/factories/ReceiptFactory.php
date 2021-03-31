<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\DeliveryCompany;
use App\Order;
use App\PaymentMethod;
use App\Product;
use App\Receipt;

class ReceiptFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Receipt::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'payment_method_id' => PaymentMethod::factory(),
            'order_id' => Order::factory(),
            'product_id' => Product::factory(),
            'delivery_company_id' => DeliveryCompany::factory(),
        ];
    }
}
