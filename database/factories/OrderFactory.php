<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\City;
use App\Country;
use App\DeliveryCompany;
use App\Order;
use App\PaymentMethod;
use App\Postcode;
use App\State;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(-10000, 10000),
            'total_amount' => $this->faker->randomFloat(2, 0, 999999.99),
            'delivery_company_id' => DeliveryCompany::factory(),
            'delivery_company_name' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'tracking_code' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'delivery_status' => $this->faker->numberBetween(-8, 8),
            'payment_status' => $this->faker->numberBetween(-8, 8),
            'delivery_amount' => $this->faker->randomFloat(2, 0, 999999.99),
            'discount_amount' => $this->faker->randomFloat(2, 0, 999999.99),
            'total_payment_amount' => $this->faker->randomFloat(2, 0, 999999.99),
            'payment_method_id' => PaymentMethod::factory(),
            'receiver_name' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'receiver_contact' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'receiver_email' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'address' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'city_id' => City::factory(),
            'state_id' => State::factory(),
            'country_id' => Country::factory(),
            'postcode_id' => Postcode::factory(),
            'transaction_id' => $this->faker->regexify('[A-Za-z0-9]{20}'),
            'status' => $this->faker->numberBetween(-8, 8),
            'deleted_at' => $this->faker->word,
        ];
    }
}
