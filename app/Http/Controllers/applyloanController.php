<?php

namespace App\Http\Controllers;
use Illuminate\Validation\ValidationException;
use App\Applications;
use App\Farmersdetails;
use App\Loan;
use App\applicationviews;
use App\Agrireports;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class applyloanController extends Controller
{
	
  	
	 public function showapplyloan($nic)
    {
    //  $user=Applications::where('loan_id', $loan_id)->join('farmersdetails',
      // 'nic','applications.nic')
       //->select('nameini','date')->get();
	   
	   $user = applicationviews::join('loans', 'loans.loan_id', '=', 'applicationviews.loan_id')
      ->where('nic', '=',$nic)
      ->select('loan_name','applicationviews.app_id')
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
  
  public function getapplicantdetails($app_id)
  {
  //  $user=Applications::where('loan_id', $loan_id)->join('farmersdetails',
    // 'nic','applications.nic')
     //->select('nameini','date')->get();
   
   $user = Applications::join('farmersdetails', 'farmersdetails.nic', '=', 'applications.nic')
    ->where('applications.id', '=',$app_id)
    ->select('*')
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