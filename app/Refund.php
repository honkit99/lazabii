<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refund extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id',
        'status',
        'cart_id',
        'product_id',
        'product_name',
        'product_price',
        'product_qty',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'order_id' => 'integer',
        'status' => 'integer',
        'cart_id' => 'integer',
        'product_id' => 'integer',
        'product_price' => 'decimal:2',
    ];


    public function order()
    {
        return $this->belongsTo(\App\Order::class);
    }

    public function cart()
    {
        return $this->belongsTo(\App\Cart::class);
    }

    public function product()
    {
        return $this->belongsTo(\App\Product::class);
    }
}
