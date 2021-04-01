<?php

namespace Database\Seeders;

use App\Address;
use App\City;
use App\Country;
use App\Postcode;
use App\State;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Country::insert([
            'name' => 'TestsCon',
        ],);
        State::insert([
            'name' => 'TestsCon',
            'country_id' => 1,
        ],);
        City::insert([
            'name' => 'Testc',
            'state_id' => 1,
        ],);
        Postcode::insert([
            'city_id' => 1,
            'number' => 81100,
        ],);
        Address::insert([
            'name' => 'Test',
            'contact' => '',
            'email' => 'test@gmail.com',
            'address' => '1,taman test',
            'city_id' => 1,
            'state_id' => 1,
            'country_id' => 1,
            'postcode_id' => 1,
        ],);
       
    }
}
