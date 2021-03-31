<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'contact',
        'email',
        'address',
        'city_id',
        'state_id',
        'country_id',
        'postcode_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'city_id' => 'integer',
        'state_id' => 'integer',
        'country_id' => 'integer',
        'postcode_id' => 'integer',
    ];


    public function city()
    {
        return $this->belongsTo(\App\City::class);
    }

    public function state()
    {
        return $this->belongsTo(\App\State::class);
    }

    public function country()
    {
        return $this->belongsTo(\App\Country::class);
    }

    public function postcode()
    {
        return $this->belongsTo(\App\Postcode::class);
    }
}
