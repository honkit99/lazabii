<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'payment_method_id',
        'order_id',
        'product_id',
        'delivery_company_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'payment_method_id' => 'integer',
        'order_id' => 'integer',
        'product_id' => 'integer',
        'delivery_company_id' => 'integer',
    ];


    public function paymentMethod()
    {
        return $this->belongsTo(\App\PaymentMethod::class);
    }

    public function order()
    {
        return $this->belongsTo(\App\Order::class);
    }

    public function product()
    {
        return $this->belongsTo(\App\Product::class);
    }

    public function deliveryCompany()
    {
        return $this->belongsTo(\App\DeliveryCompany::class);
    }
}
