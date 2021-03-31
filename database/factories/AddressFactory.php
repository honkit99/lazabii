<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Address;
use App\City;
use App\Country;
use App\Postcode;
use App\State;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'contact' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'email' => $this->faker->safeEmail,
            'address' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'city_id' => City::factory(),
            'state_id' => State::factory(),
            'country_id' => Country::factory(),
            'postcode_id' => Postcode::factory(),
        ];
    }
}
