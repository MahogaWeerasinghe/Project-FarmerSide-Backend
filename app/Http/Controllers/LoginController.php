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
          'nic' => 'required',
          'password' => 'required'
      ];
 
        $customMessages = [
           'required' => ':attribute all need'
      ];
        $this->validate($request, $rules, $customMessages);
         $tp    = $request->input('nic');
        try {
            $login = Farmer::where('nic', $tp)->first();
            if ($login) {
                if ($login->count() > 0) {
                    if (Hash::check($request->input('password'), $login->password)) {
                        try {
                       
 
                           
                              $res['status'] = true;
                              $res['message'] = 'Success Login';
                              $res['data'] =  $login;
                       
 
                              return response($res, 200);
 
 
                        } catch (\Illuminate\Database\QueryException $ex) {
                            $res['status'] = false;
                            $res['message'] = $ex->getMessage();
                            return response($res, 500);
                        }
                    } else {
                        $res['success'] = false;
                        $res['message'] = 'Username / nic / password not found';
                        return response($res, 401);
                    }
                } else {
                    $res['success'] = false;
                    $res['message'] = 'Username / nic / password  not found';
                    return response($res, 401);
                }
            } else {
                $res['success'] = false;
                $res['message'] = 'Username / nic / password not found';
                return response($res, 401);
            }
        } catch (\Illuminate\Database\QueryException $ex) {
            $res['success'] = false;
            $res['message'] = $ex->getMessage();
            return response($res, 500);
        }
    }
	

		
	
	
}