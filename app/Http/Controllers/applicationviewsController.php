<?php

namespace App\Http\Controllers;
use Illuminate\Validation\ValidationException;
use App\reports;
use App\Farmersdetails;
use App\Applications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\agriloans;

class applicationviewsController extends Controller
{


    public function viewagri($GN_No){

      $user = applications :: join('reports','reports.app_id','=','applications.id')
              ->join('farmersdetails','farmersdetails.nic','=','applications.nic')
              ->where('reports.GN_No', '=',$GN_No)
                ->where('reports.AO_status','=',"false")
                ->where('reports.AI_status','=',"false")
                ->where('reports.DO_status','=',"false")
                ->where('reports.bank_status','=',"false")
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

        public function getpers($rep_id){

          $user = applications :: join('reports','reports.app_id','=','applications.id')
                  ->join('farmersdetails','farmersdetails.nic','=','applications.nic')
                  ->where('reports.rep_id', '=',$rep_id)
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

         

                public function updateagri($rep_id,Request $request)
                {
                  try{
                    $page = $request->all();
                    $plan = reports::where('rep_id','=',$rep_id)->first();
                    $plan->update($page);
                    
                    
                        $res['status'] = true;
                        $res['message'] = 'success!';
                        return response($res, 200);
                  
                  }
                  
                  catch (\Illuminate\Database\QueryException $ex) {
                            $res['status'] = false;
                            $res['message'] = $ex->getMessage();
                            return response($res, 500);
                        }
    
                }
    

                public function createreport(Request $request)
                {
                  
                
                
            
                   try {
                        //$hasher = app()->make('hash');
                       
                  $app_id = $request->input('app_id');
                  $GN_No = $request->input('GN_No');
                  $GN_Division = $request->input('GN_Division');
                  $Agr_service_dev = $request->input('Agr_service_dev');
                  $District = $request->input('District');
                  $ao_status= $request->input('ao_status');
                  $ai_status = $request->input('ai_status');
                  $do_status = $request->input('do_status');
                  $bank_status = $request->input('bank_status');
                  $variety=$request->input('variety');
                  $sizeof=$request->input('sizeof');
                        
                        $save = reports::create([
                    'app_id'=> $app_id,
                    'GN_No'=> $GN_No,
                    'GN_Division'=> $GN_Division,
                    'Agr_service_dev'=> $Agr_service_dev,
                    'District'=> $District,
                    'ao_status'=> $ao_status,
                    'ai_status'=> $ai_status,
                    'do_status'=> $do_status ,
                    'bank_status'=> $bank_status ,
                    'variety'=> $variety,
                    'sizeof'=> $sizeof,
                          
                           
                        ]);
                  
                        $res['status'] = true;
                        $res['message'] = 'success!';
                        return response($res, 200);
            }
                catch (\Illuminate\Database\QueryException $ex) {
                        $res['status'] = false;
                        $res['message'] = $ex->getMessage();
                        return response($res, 500);
                    }
                
                }

                public function viewai($GN_No){

                  $user = applications :: join('reports','reports.app_id','=','applications.id')
                          ->join('farmersdetails','farmersdetails.nic','=','applications.nic')
                          ->where('reports.GN_No', '=',$GN_No)
                            ->where('reports.AO_status','=',"true")
                            ->where('reports.AI_status','=',"false")
                            ->where('reports.DO_status','=',"false")
                            ->where('reports.bank_status','=',"false")
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


                    

    public function viewdo($Agr_service_dev){

      $user = applications :: join('reports','reports.app_id','=','applications.id')
              ->join('farmersdetails','farmersdetails.nic','=','applications.nic')
              ->where('reports.Agr_service_dev', '=',$Agr_service_dev)
                ->where('reports.AO_status','=',"true")
                ->where('reports.AI_status','=',"true")
                ->where('reports.DO_status','=',"false")
                ->where('reports.bank_status','=',"false")
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


        public function showAR($rep_id){

          $user = reports ::where('reports.rep_id', '=',$rep_id)
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

            
        public function showARloans($rep_id){

          $user = agriloans::where('agriloans.rep_id', '=',$rep_id)
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



            public function viewagrihis($ao_id){

              $user = applications :: join('reports','reports.app_id','=','applications.id')
                      ->join('farmersdetails','farmersdetails.nic','=','applications.nic')
                      ->where('reports.ao_id', '=',$ao_id)
                        ->where('reports.ao_status','=',"true")
                        ->orderBy('reports.ao_date', 'desc')
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

                
            public function viewaihis($ai_id){

              $user = applications :: join('reports','reports.app_id','=','applications.id')
                      ->join('farmersdetails','farmersdetails.nic','=','applications.nic')
                      ->where('reports.ai_id', '=',$ai_id)
                        ->where('reports.ai_status','=',"true")
                        ->orderBy('reports.ai_date', 'desc')
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

                public function viewdohis($do_id){

                  $user = applications :: join('reports','reports.app_id','=','applications.id')
                          ->join('farmersdetails','farmersdetails.nic','=','applications.nic')
                          ->where('reports.do_id', '=',$do_id)
                            ->where('reports.do_status','=',"true")
                            ->orderBy('reports.do_date', 'desc')
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