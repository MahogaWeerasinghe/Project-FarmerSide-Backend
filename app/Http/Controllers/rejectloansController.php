<?php

namespace App\Http\Controllers;
use Illuminate\Validation\ValidationException;
use App\rejectloans;
use Illuminate\Http\Request;
use App\Applications;
use App\Loan;
use Illuminate\Support\Facades\Hash;

class rejectloansController extends Controller
{

    public function showrejectloan($nic){

        $user = rejectloans::join('applications', 'id', '=', 'rejectloans.application_id')
        ->join('loans','loans.loan_id','=','rejectloans.loan_id')
        ->where('applications.nic', '=',$nic)
        ->select('*')
        ->get();

  
     
            if ($user) {
                $res['status'] = true;
                $res['message'] = $user;
        
                return response($res);
                }
                else{
                   $res['status'] = false;
                   $res['message'] = 'success';
        
                 return response($res);
                }
    
    
            }


            public function showrejectloandata($application_id){

                $user = rejectloans::join('applications', 'id', '=', 'rejectloans.application_id')
        ->join('loans','loans.loan_id','=','rejectloans.loan_id')
        ->where('applications.id', '=',$application_id)
        ->select('*')
        ->get();
          
             
                    if ($user) {
                        $res['status'] = true;
                        $res['message'] = $user;
                
                        return response($res);
                        }
                        else{
                           $res['status'] = false;
                           $res['message'] = 'success';
                
                         return response($res);
                        }
            
            
                    }



            }
        
  	
	 
	

	


