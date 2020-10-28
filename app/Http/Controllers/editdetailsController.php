<?php

namespace App\Http\Controllers;
use Illuminate\Validation\ValidationException;
use App\Details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class editdetailsController extends Controller
{

  	
	 public function editDetails(Request $request)
    {
      
		
		
		
		$rules = [
      
            'telephone_number' => 'required',
            'choose' => 'required',
            'nameini' => 'required',
			'namefull' => 'required',
			'address' => 'required',
			'TpNo' => 'required',
			'dob' => 'required',
			'nic' => 'required',
			'email' => 'required',

           
         ];
 
        $customMessages = [
             'required' => 'Please fill attribute :attribute'
        ];
        $this->validate($request, $rules, $customMessages);
 
       try {
            //$hasher = app()->make('hash');
           
            $telephone_number = $request->input('telephone_number');
            $choose = $request->input('choose');
			$nameini = $request->input('nameini');
			$namefull = $request->input('namefull');
			$address = $request->input('address');
			$TpNo = $request->input('TpNo');
			$dob = $request->input('dob');
			$nic = $request->input('nic');
			$email = $request->input('email');
			
			
			
            
            $save = Details::create([
                'telephone_number'=> $telephone_number,
				'choose'=> $choose,
				'nameini'=> $nameini,
				'namefull'=> $namefull,
				'address'=> $address,
				'TpNo'=> $TpNo,
				'dob'=> $dob,
				'nic'=> $nic,
				'email'=> $email,
				
				
              
               
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
	
	
	
	

}