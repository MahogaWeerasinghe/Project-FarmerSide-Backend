<?php

namespace App\Http\Controllers;
use Illuminate\Validation\ValidationException;
use App\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class accountController extends Controller
{
	
  	
	 public function insertaccount(Request $request)
    {
      
		
		
		
		$rules = [
      
            'accountno' => 'required',
            'nic' => 'required',
            'bank_name' => 'required',
			'branch' => 'required',
			'type' => 'required',
		
           
         ];
 
        $customMessages = [
             'required' => 'Please fill attribute :attribute'
        ];
        $this->validate($request, $rules, $customMessages);
 
       try {
            //$hasher = app()->make('hash');
           
            
			
			$accountno = $request->input('accountno');
			$nic = $request->input('nic');
            $bank_name = $request->input('bank_name');
			$branch = $request->input('branch');
			$type = $request->input('type');
			
			
            
            $save = Account::create([
            'accountno' => $accountno,
            'nic' => $nic,
            'bank_name' => $bank_name,
			'branch' => $branch,
			'type' => $type,

			          
               
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
	
	
    public function getaccounts($nic){
      
        $user = Account::where('nic',$nic)->select('*')->get();
        
        return $user;
    }
	
	

	

}