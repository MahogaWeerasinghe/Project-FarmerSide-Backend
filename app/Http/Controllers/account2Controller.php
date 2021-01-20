<?php

//Controller of Bank side

namespace App\Http\Controllers;
use Illuminate\Validation\ValidationException;
use App\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class account2Controller extends Controller
{
	

	
    public function getaccounts($nic){ // get account details by nic
        $user = Account::where('nic',$nic)->select('*')->get();
        return $user;
    }
	
	

	

}