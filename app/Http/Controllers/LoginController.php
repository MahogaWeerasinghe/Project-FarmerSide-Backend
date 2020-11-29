<?php
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use App\Farmer;
 
class LoginController extends Controller
{
    public function login(Request $request)
    {
 
      $rules = [
          'telephone_number' => 'required',
          'password' => 'required'
      ];
 
        $customMessages = [
           'required' => ':attribute all need'
      ];
        $this->validate($request, $rules, $customMessages);
         $tp    = $request->input('telephone_number');
        try {
            $login = Farmer::where('telephone_number', $tp)->first();
            if ($login) {
                if ($login->count() > 0) {
                    if (Hash::check($request->input('password'), $login->password)) {
                        try {
                            //$api_token = sha1($login->id_user.time());
 
                             // $create_token = User::where('id', $login->id_user)->update(['api_token' => $api_token]);
                              $res['status'] = true;
                              $res['message'] = 'Success Login';
                              $res['data'] =  $login;
                              //$res['api_token'] =  $api_token;
 
                              return response($res, 200);
 
 
                        } catch (\Illuminate\Database\QueryException $ex) {
                            $res['status'] = false;
                            $res['message'] = $ex->getMessage();
                            return response($res, 500);
                        }
                    } else {
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
	
	public function test(Request $request){
		
      $rules = [
          'telephone_number' => 'required',
          'password' => 'required'
      ];
 
        $customMessages = [
           'required' => ':attribute all need'
      ];
        $this->validate($request, $rules, $customMessages);
         $tp    = $request->input('telephone_number');
        try {
            $login = Farmer::where('telephone_number', $tp)->first();
            if ($login) {
                if ($login->count() > 0) {
                    if ($request->input('password')==$login->password) {
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
                    } else {
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
	
}