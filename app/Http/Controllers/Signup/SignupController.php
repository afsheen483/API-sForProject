<?php

namespace App\Http\Controllers\Signup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SignupModel;
use Validator;

class SignupController extends Controller
{
    public function signup(Request $request)
    {
        $rules = [
            'user_firstname'=>'required',
            'user_lastname'=>'required',
            'user_email'=>'required',
            'user_password'=>'required',
        ];
        $validtor=Validator::make($request->all(),$rules);
        if ($validtor->fails()) {
            return response()->json($validtor->errors(),400);
            
        }
        $signup = SignupModel::create($request->all());
        return response()->json($signup, 201);
    }
}
