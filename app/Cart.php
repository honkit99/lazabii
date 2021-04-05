<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'product_id',
        'product_name',
        'product_price',
        'product_qty',
        'variance_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'product_id' => 'integer',
        'product_price' => 'decimal:2',
        'variance_id' => 'integer',
    ];


    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function product()
    {
        return $this->belongsTo(\App\Product::class);
    }

    public function variance()
    {
        return $this->belongsTo(\App\Variance::class);
    }
}
