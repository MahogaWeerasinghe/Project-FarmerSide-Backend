<?php

namespace App\Http\Controllers;
use Illuminate\Validation\ValidationException;
use App\approveloans;
use Illuminate\Http\Request;
use App\Applications;
use App\Loan;
use Illuminate\Support\Facades\Hash;

class approveloasController extends Controller
{

    public function showapproveloan($nic){

        $user = approveloans::join('applications', 'id', '=', 'approveloans.application_id')
        ->join('loans','loans.loan_id','=','approveloans.loan_id')
        ->where('applications.nic', '=',$nic)
        ->select('loans.loan_name','approveloans.application_id','approveloans.date','approveloans.date_you_come','approveloans.special_notices')
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

            public function showapproveloandata($application_id){

                $user = approveloans::where('application_id', '=',$application_id)
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
        
  	
	 
	

	


