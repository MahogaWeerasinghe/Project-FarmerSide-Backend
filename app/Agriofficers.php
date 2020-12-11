<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agriofficers extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nic','name','telephone_no','GN_No','GN Division','Agr_service_dev','District'
    ];
	
	

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}