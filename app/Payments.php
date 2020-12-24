<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'payment_id';
    protected $fillable = [
        'obtain_id','loan_id','Installment_date','Installment','paid_amount','to_be_paid_amount','to_be_paid_date','rating_no'
    ];
	
		
	

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}