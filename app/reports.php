<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reports extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $primaryKey = 'rep_id';
    
    protected $fillable = [
        'GN_No','GN_Division','Agr_service_dev','District','app_id','ao_id','ai_id','do_id','mem_id','fert_id','year','season','area','crop_type','quantity','income','subse','size','es_amount','ao_photos','ao_status','ai_status','do_status','bank_status'
    ];
	
		
	

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}