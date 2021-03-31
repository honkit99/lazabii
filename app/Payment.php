<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id',
        'payment_method_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'order_id' => 'integer',
        'payment_method_id' => 'integer',
    ];


    public function order()
    {
        return $this->belongsTo(\App\Order::class);
    }

    public function paymentMethod()
    {
        return $this->belongsTo(\App\PaymentMethod::class);
    }
}
