<?php

namespace App\Http\Controllers;
use Illuminate\Validation\ValidationException;
use App\Agrireports;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class agrireportsController extends Controller
{

  	
	 public function submitAgrireports($app_id,$agr_images)
    {
      
 
       try {

            
            $save = Agrireports::create([
            'app_id' => $app_id,
            'agr_images' => $agr_images,

            ]);
		  
            $res['status'] = true;
            $res['message'] = 'success!';
			$res['data']=$save;
            return response($res, 200);
}
		catch (\Illuminate\Database\QueryException $ex) {
            $res['status'] = false;
            $res['message'] = $ex->getMessage();
            return response($res, 500);
        }
		
    }
	
	
	

}