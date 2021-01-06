<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LoginModel;
use Validator;



class LoginController extends Controller
{
    public function login(Request $request)
    {
       
        $rules = [
            'user_email'=>'email|required',
            'user_password'=>'required',
        ];
        $validtor=Validator::make($request->all(),$rules);
        if ($validtor->fails()) {
            return response()->json($validtor->errors(),400);
            
        }
        $user_email = $request->input('user_email');
    	$user_password = $request->input('user_password');

    	$user_login = LoginModel::where(['user_email'=>$user_email,'user_password'=>$user_password])->first();
        if($user_login)       
        {
            
            return response()->json("Login Successfully!",200);
        }else{
            return response()->json('Record Not Found!',404);     // You can create a page for this
        }
        
    }
}
