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
        ->where('approveloans.approve_status', '=',"false")
        ->orderBy('approveloans.approved_date', 'desc')
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

            public function showapproveloandata($application_id){

        $user = approveloans::join('applications', 'id', '=', 'approveloans.application_id')
        ->join('loans','loans.loan_id','=','approveloans.loan_id')
        ->where('applications.id', '=',$application_id)
        ->where('approveloans.approve_status', '=',"false")
        ->orderBy('approveloans.approved_date', 'desc')
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
        
  	
	 
	

	


