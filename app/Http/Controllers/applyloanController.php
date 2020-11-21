<?php

namespace App\Http\Controllers;
use Illuminate\Validation\ValidationException;
use App\Applications;
use App\Farmersdetails;
use App\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class applyloanController extends Controller
{
	
  	
	 public function showapplyloan($nic)
    {
    //  $user=Applications::where('loan_id', $loan_id)->join('farmersdetails',
      // 'nic','applications.nic')
       //->select('nameini','date')->get();
	   
	   $user = Applications::join('loans', 'loans.loan_id', '=', 'applications.loan_id')
      ->where('nic', '=',$nic)
      ->select('loan_name','id')
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
	
	
	
	

}