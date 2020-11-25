<?php

namespace App\Http\Controllers;
use Illuminate\Validation\ValidationException;
use App\Agrireports;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class agrireportsController extends Controller
{

  	
	 public function submitAgrireports(Request $request)
    {
      
	try{	
		$repo = new Agrireports;
		
		$repo->app_id= $request->input('app_id');
        $repo->agr_images=$request->input('agr_images');
        $repo->type=$request->input('type');
        
		$repo->save();
     
            $res['status'] = true;
            $res['message'] = 'insert success!';
        
            return response($res, 200);
			
	}
         catch (\Illuminate\Database\QueryException $ex) {
            $res['status'] = false;
            $res['message'] = $ex->getMessage();
            return response($res, 500);
        }
		
    }

    public function getreports($app_id,$type){
        //$telephone_number =$request->input('telephone_number');
        //$user = Loan::where('bank_id',$bank_id)->first();
        $user = Agrireports::where('app_id',$app_id)->where('type',$type)->select('agr_images')->get();
        
        return $user;
    }
	
	

}
?>

