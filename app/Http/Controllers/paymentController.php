<?php

namespace App\Http\Controllers;
use Illuminate\Validation\ValidationException;
use App\Applications;

use App\Loan;
use App\Payments;
use App\obtainloans;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class paymentController extends Controller
{
	
  	
	 public function showpayments($nic)
    {
    //  $user=Applications::where('loan_id', $loan_id)->join('farmersdetails',
      // 'nic','applications.nic')
       //->select('nameini','date')->get();
	   
       $user = obtainloans::join('applications', 'id', '=', 'obtainloans.application_id')
       ->join('loans','loans.loan_id','=','obtainloans.loan_id')
      ->where('applications.nic', '=',$nic)
      ->select('obtainloans.obtain_id','loans.loan_name','obtainloans.application_id','obtainloans.amount','obtainloans.interest_rate','obtainloans.total_amount')
     ->get();

	
       if ($user) {
        $res['status'] = true;
        $res['message'] = $user;
        
        return response($res);
        }
		else{
           $res['status'] = false;
           $res['message'] = 'Cannot find applicants!';

         return response($res);
        }
		
  }

  public function showpaymentdetails($obtain_id)
    {
    //  $user=Applications::where('loan_id', $loan_id)->join('farmersdetails',
      // 'nic','applications.nic')
       //->select('nameini','date')->get();
	   
       $user = Payments::where('obtain_id', '=',$obtain_id)
      ->select('*')
      ->orderBy('Installment_date', 'desc')
     ->get();

	
       if ($user) {
        $res['status'] = true;
        $res['message'] = $user;
        
        return response($res);
        }
		else{
           $res['status'] = false;
           $res['message'] = 'Cannot find applicants!';

         return response($res);
        }

    } 

        public function showpaymentdetailslatest($obtain_id)
        {
        

      $us = Payments::where('obtain_id', '=',$obtain_id)
                      ->orderBy('Installment_date', 'desc')
                      ->first();
                      
        //->select('*');
    
    
       if ($us) {
        $res['status'] = true;
        $res['message'] = $us;
        
        return response($res);
        }
		else{
           $res['status'] = false;
           $res['message'] = 'Cannot find applicants!';

         return response($res);
        }
		
  }


  
 

	
	
	
	

}