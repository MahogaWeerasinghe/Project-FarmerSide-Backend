<?php

namespace App\Http\Controllers;
use Illuminate\Validation\ValidationException;
use App\reports;
use Illuminate\Http\Request;
use App\Applications;
use App\Loan;
use App\Bank;
use App\Agriofficers;
use App\aiofficers;
use App\doofficers;
use Illuminate\Support\Facades\Hash;

class statusController extends Controller
{

    public function showstatus($nic){

        $user = Applications::join('reports', 'app_id', '=', 'applications.id')
        ->join('loans','loans.loan_id','=','applications.loan_id')
        ->where('applications.nic', '=',$nic)
        ->where('reports.bank_status','=',"false")
        ->orderBy('applications.date', 'desc')
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

            public function showAO($rep_id){

                $user = reports::join('agriofficers', 'agriofficers.GN_No', '=', 'reports.GN_No')
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

                    public function showAI($rep_id){

                        $user = reports::join('aiofficers', 'aiofficers.GN_No', '=', 'reports.GN_No')
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

                            public function showDO($rep_id){

                                $user = reports::join('doofficers', 'doofficers.Agr_service_dev', '=', 'reports.Agr_service_dev')
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
        


                            




}
