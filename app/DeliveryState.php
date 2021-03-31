<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryState extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'delivery_company_id',
        'state_id',
        'price',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'delivery_company_id' => 'integer',
        'state_id' => 'integer',
        'price' => 'decimal:2',
    ];


    public function deliveryCompany()
    {
        return $this->belongsTo(\App\DeliveryCompany::class);
    }

    public function state()
    {
        return $this->belongsTo(\App\State::class);
    }
}
