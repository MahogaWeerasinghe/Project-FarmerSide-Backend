<?php

namespace App\Http\Controllers;
use Illuminate\Validation\ValidationException;
use App\applicationviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class applicationviewsController extends Controller
{

    public function insertagain($loan_id,$app_id,$nic,$date){
        
  
            $save = applicationviews::create([
            'loan_id' => $loan_id,
            'app_id' => $app_id,
            'nic'=>$nic,
            'date'=>$date
   
               
            ]);


            if ($save) {
                $res['status'] = true;
                $res['message'] = $save;
        
                return response($res);
                }
                else{
                   $res['status'] = false;
                   $res['message'] = 'success';
        
                 return response($res);
                }
    }

    
  	
	 
	

	


}