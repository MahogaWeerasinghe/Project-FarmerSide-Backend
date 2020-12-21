<?php

namespace App\Http\Controllers;
use Illuminate\Validation\ValidationException;
use App\estimates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class estimateController extends Controller
{
	
  	
	 public function insertestimate(Request $request)
    {
        
		
		
		
		$rules = [
      
            'rep_id' => 'required',
            'forclean' => 'required',
            'forland' => 'required',
			'forseed' => 'required',
            'forfertilizer' => 'required',
            'forchemicals' => 'required',
            'forharvest' => 'required',
			'forothers' => 'required',
			'totalamount' => 'required',
		
		
           
         ];
 
        $customMessages = [
             'required' => 'Please fill attribute :attribute'
        ];
        $this->validate($request, $rules, $customMessages);
 
       try {
            //$hasher = app()->make('hash');
           
        
			
			$rep_id = $request->input('rep_id');
			$forclean = $request->input('forclean');
            $forland = $request->input('forland');
			$forseed = $request->input('forseed');
			$forfertilizer = $request->input('forfertilizer');
            $forchemicals = $request->input('forchemicals');
			$forharvest = $request->input('forharvest');
            $forothers = $request->input('forothers');
			$totalamount = $request->input('totalamount');
            
            $save = estimates::create([
            'rep_id' => $rep_id,
            'forclean' => $forclean,
            'forland' => $forland,
			'forseed' => $forseed,
			'forfertilizer' => $forfertilizer,
            'forchemicals' => $forchemicals,
            'forharvest' => $forharvest,
			'forothers' => $forothers,
			'totalamount' => $totalamount,

			          
               
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


    public function showestimate($rep_id){

        $user = estimates::where('estimates.rep_id', '=',$rep_id)
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