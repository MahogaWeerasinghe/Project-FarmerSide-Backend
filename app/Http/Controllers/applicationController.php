<?php

namespace App\Http\Controllers;
use Illuminate\Validation\ValidationException;
use App\Applications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class applicationController extends Controller
{

  	
	 public function submitloan(Request $request)
    {
      
		
		
		
		$rules = [
      
            'loan_id' => 'required',
            'nic' => 'required',
            'date' => 'required',
			'crop' => 'required',
			'whatfor' => 'required',
			'reason' => 'required',
			'amount' => 'required',
			'months' => 'required',
            'civil' => 'required',
            'spousename' => 'required',
			'spo_emplo' => 'required',
			'children' => 'required',
			'fix_name' => 'required',
			'fix_deed' => 'required',
			'fix_size' => 'required',
			'fix_value' => 'required',
			'mot_about' => 'required',
			'mot_location' => 'required',
            'mot_value' => 'required',
            'gua1_name' => 'required',
			'gua1_occ' => 'required',
			'gua1_tp' => 'required',
			'gua2_name' => 'required',
			'gua2_occ' => 'required',
			'gua2_tp' => 'required',
			
		
           
         ];
 
        $customMessages = [
             'required' => 'Please fill attribute :attribute'
        ];
        $this->validate($request, $rules, $customMessages);
 
       try {
            //$hasher = app()->make('hash');
           
            
			
			$loan_id = $request->input('loan_id');
			$nic = $request->input('nic');
            $date = $request->input('date');
			$crop = $request->input('crop');
			$whatfor = $request->input('whatfor');
			$reason = $request->input('reason');
			$amount = $request->input('amount');
			$months = $request->input('months');
			$civil = $request->input('civil');
			$spousename = $request->input('spousename');
			$spo_emplo = $request->input('spo_emplo');
			$children = $request->input('children');
            $fix_name = $request->input('fix_name');
			$fix_deed = $request->input('fix_deed');
			$fix_size = $request->input('fix_size');
			$fix_value = $request->input('fix_value');
			$mot_about = $request->input('mot_about');
			$mot_location = $request->input('mot_location');
			$mot_value = $request->input('mot_value');
			$gua1_name = $request->input('gua1_name');
			$gua1_occ = $request->input('gua1_occ');
			$gua1_tp = $request->input('gua1_tp');
			$gua2_name = $request->input('gua2_name');
			$gua2_occ = $request->input('gua2_occ');
			$gua2_tp = $request->input('gua2_tp');
			
			
            
            $save = Applications::create([
            'loan_id' => $loan_id,
            'nic' => $nic,
            'date' => $date,
			'crop' => $crop,
			'whatfor' => $whatfor,
			'reason' => $reason,
			'amount' => $amount,
			'months' => $months,
            'civil' => $civil,
            'spousename' => $spousename,
			'spo_emplo' => $spo_emplo,
			'children' => $children,
			'fix_name' => $fix_name,
			'fix_deed' => $fix_deed,
			'fix_size' => $fix_size,
			'fix_value' => $fix_value,
			'mot_about' => $mot_about,
			'mot_location' => $mot_location,
            'mot_value' => $mot_value,
            'gua1_name' => $gua1_name,
			'gua1_occ' => $gua1_occ,
			'gua1_tp' => $gua1_tp,
			'gua2_name' => $gua2_name,
			'gua2_occ' => $gua2_occ,
			'gua2_tp' => $gua2_tp,
				
				
              
               
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
	
	public function getappdetails($nic,Request $request){
    //$telephone_number =$request->input('telephone_number');
    $user = Applications::where('nic',$nic)->get();
    return $user;
	}
	

}