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
	
	 public function update($id, Request $request)
    {
        $up = Details::findOrFail($id);
        $up->update($request->all());

        return response()->json($up, 200);
    }
	
	/*public function getdetails(Request $request,$telephone_number)
    {
 
      $rules = [
          'telephone_number' => 'required',
           /* 'choose' => 'required',
            'nameini' => 'required',
			'namefull' => 'required',
			'address' => 'required',
			'TpNo' => 'required',
			'dob' => 'required',
			'nic' => 'required',
			'email' => 'required',
      ];
 
        $customMessages = [
           'required' => ':attribute all need'
      ];
        $this->validate($request, $rules, $customMessages);
         //$tp    = $request->input('telephone_number');
		 $tp=$telephone_number;
        try {
            $login = Details::where('telephone_number', $tp)->first();
            if ($login) {
                if ($login->count() > 0) {
                   // if (Hash::check($request->input('password'), $login->password)) {
                        try {
                            //$api_token = sha1($login->id_user.time());
 
                             // $create_token = User::where('id', $login->id_user)->update(['api_token' => $api_token]);
                              $res['status'] = true;
                              $res['message'] = 'Success login';
                              $res['data'] =  $login;
                              //$res['api_token'] =  $api_token;
 
                              return response($res, 200);
 
 
                        } catch (\Illuminate\Database\QueryException $ex) {
                            $res['status'] = false;
                            $res['message'] = $ex->getMessage();
                            return response($res, 500);
                        }
                    // 
					else {
                        $res['success'] = false;
                        $res['message'] = 'Username / email / password not found';
                        return response($res, 401);
                    }
                } else {
                    $res['success'] = false;
                    $res['message'] = 'Username / email / password  not found';
                    return response($res, 401);
                }
            } else {
                $res['success'] = false;
                $res['message'] = 'Username / email / password not found';
                return response($res, 401);
            }
        } catch (\Illuminate\Database\QueryException $ex) {
            $res['success'] = false;
            $res['message'] = $ex->getMessage();
            return response($res, 500);
        }
    }
	
	
	*/
	
	
	public function getdetails($telephone_number,Request $request){
    //$telephone_number =$request->input('telephone_number');
    $user = Details::where('telephone_number',$telephone_number)->first();
    return $user;
	}
	
	

}