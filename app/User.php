<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'dob' ,
        'phone' ,
    ];
    protected $appends =['gender_name'];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function address()
    {
        return $this->belongsTo(\App\Address::class);
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
            0=>'Male',
            1=>'Female',
        ][$this->gender];
       
        
    }
}
