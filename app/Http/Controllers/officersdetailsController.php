<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agriofficers;
use App\AIofficers;
use App\DOofficers;
class officersdetailsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function getAODetails($nic){
   
	   
	   $user = Agriofficers::where('nic', '=',$nic)
       ->select('*')
       ->get();
       
          if ($user) {
           $res['status'] = true;
           $res['message'] = $user;
   
           return response($res);
           }
           else{
              $res['status'] = false;
              $res['message'] = 'Cannot find AO!';
   
            return response($res);
           }
    }

    public function getAIDetails($nic){
   
	   
        $user = AIofficers::where('nic', '=',$nic)
        ->select('*')
        ->get();
        
           if ($user) {
            $res['status'] = true;
            $res['message'] = $user;
    
            return response($res);
            }
            else{
               $res['status'] = false;
               $res['message'] = 'Cannot find AI!';
    
             return response($res);
            }
     }


     public function updateagrio($nic,Request $request)
    {
                  try{
                    $page = $request->all();
                    $plan = Agriofficers::where('nic','=',$nic)->first();
                    $plan->update($page);
                    
                    
                        $res['status'] = true;
                        $res['message'] = 'update details success!';
                        return response($res, 200);
                  
                  }
                  
                  catch (\Illuminate\Database\QueryException $ex) {
                            $res['status'] = false;
                            $res['message'] = $ex->getMessage();
                            return response($res, 500);
                        }
    
      }


      public function getDODetails($nic){
   
	   
        $user = DOofficers::where('nic', '=',$nic)
        ->select('*')
        ->get();
        
           if ($user) {
            $res['status'] = true;
            $res['message'] = $user;
    
            return response($res);
            }
            else{
               $res['status'] = false;
               $res['message'] = 'Cannot find DO!';
    
             return response($res);
            }
     }
 

}

