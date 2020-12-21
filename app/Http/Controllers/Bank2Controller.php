<?php

namespace App\Http\Controllers;
use Illuminate\Validation\ValidationException;
use App\Bank;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

class Bank2Controller extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function bankDetails($bank_id, Request $request){

        $bank = Bank::where('bank_id', $bank_id)->first();
        return $bank; 
        /* if($bank){
            $res['status']=true;
            $res['message']=$bank;
            return response($res);
        }else{
            $res['status']=false;
            $res['message']='Error in submission';
            return response($res);
        } */
    }
}
