<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'parent_id',
        'name',
        'image',
        'status',
    ];
    protected $appends =['status_name'];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'status' => 'integer',
    ];

    public function product()
    {
        return $this->belongsToMany('App\Product');
    }

    public function children() //to find children from parent
    {
      return $this->hasMany('App\Category', 'parent_id');
    }

    public function getStatusNameAttribute(){
        /*
        if($this->status ==0)
        return "New";
        if($this->status ==1)
        return "Doing";
        if($this->status ==2)
        return "Done";*/

        //Method 2
        return[
            0=>'Available',
            1=>'Disabled',
        ][$this->status];
       
        
    }
}
