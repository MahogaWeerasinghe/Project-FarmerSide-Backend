<?php

namespace App\Http\Controllers;
use Illuminate\Validation\ValidationException;
use App\Farmer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FarmerController extends Controller
{

   

	
	 public function register(Request $request)
    {
       /*$this->validate($request, [
            //'telephone_number' => 'required|telephone_number|unique:farmers',
            'username' => 'required',
			 'password' => 'required',
        ]);

        $farmer = Farmer::create($request->all());

        return response()->json($farmer, 201);
		*/
		
		
		
		
		$rules = [
      
            'telephone_number' => 'required',
            'username' => 'required',
            'password' => 'required',
           
         ];
 
        $customMessages = [
             'required' => 'Please fill attribute :attribute'
        ];
        $this->validate($request, $rules, $customMessages);
 
       try {
            $hasher = app()->make('hash');
           
            $telephone_number = $request->input('telephone_number');
            $username = $request->input('username');
            $password = $hasher->make($request->input('password'));
			
			 //$farmer = Farmer::create($request->all());
 
			
            $save = Farmer::create([
                'telephone_number'=> $telephone_number,
                'username'=> $username,
                'password'=> $password,
                //'api_token'=> ''
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