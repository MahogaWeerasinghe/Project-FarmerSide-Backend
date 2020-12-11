<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class officers extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nic','password','type'
    ];
	
	

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}