<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'total_amount',
        'delivery_company_id',
        'delivery_company_name',
        'tracking_code',
        'delivery_status',
        'payment_status',
        'delivery_amount',
        'discount_amount',
        'total_payment_amount',
        'payment_method_id',
        'receiver_name',
        'receiver_contact',
        'receiver_email',
        'address',
        'city_id',
        'state_id',
        'country_id',
        'postcode_id',
        'transaction_id',
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'total_amount' => 'decimal:2',
        'delivery_company_id' => 'integer',
        'delivery_status' => 'integer',
        'payment_status' => 'integer',
        'delivery_amount' => 'decimal:2',
        'discount_amount' => 'decimal:2',
        'total_payment_amount' => 'decimal:2',
        'payment_method_id' => 'integer',
        'city_id' => 'integer',
        'state_id' => 'integer',
        'country_id' => 'integer',
        'postcode_id' => 'integer',
        'status' => 'integer',
    ];


    public function deliveryCompany()
    {
        return $this->belongsTo(\App\DeliveryCompany::class);
    }

    public function paymentMethod()
    {
        return $this->belongsTo(\App\PaymentMethod::class);
    }

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

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }
}
