<?php

namespace App\Http\Controllers;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Validator;


class AuthController extends Controller
{
    public function signup(Request $request)
    {
         $data = [
            'user_firstname' => 'required',
            'user_lastname' => 'required',
            'user_email' => 'required',
            'user_password' => 'required'
         ];
         $validtor=Validator::make($request->all(),$data);
         $user = new User([
            'user_firstname' => $request->user_firstname,
            'user_lastname' => $request->user_lastname,
            'user_email' => $request->user_email,
            'user_password' => $request->user_password,
            'profile_image' => $request->profile_image,
            'user_contact_no' => $request->user_contact_no,
            'user_address' => $request->user_address,
            'user_cnic' => $request->user_cnic,
            'role_id'=> 4
         ]);
         $user->save();
         return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
    }
    public function login(Request $request)
    {
        $request->validate([
            'user_email' => 'required|string|email',
            'user_password' => 'required|string',
            'remember_me' => 'boolean'
        ]);
        $credentials = request(['user_email', 'user_password']);
        if(!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }
  

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully Logout'
        ]);
    }
    public function user(Request $request)
    {
        return response()->json($request->user());
    }
}
