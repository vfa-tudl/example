<?php

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Auth;
class AuthController extends Controller
{
    public function  register(Request $request){
        $fields = $request->validate([
            'name'=> 'required|string',
            'email'=> 'required|string|unique:users,email',
            'password'=>'required|string|confirmed'
        ]);

        $user = User::create([
            'name'=> $fields['name'],
            'email'=> $fields['email'],
            'password'=> bcrypt($fields['password']),
        ]);

        $token = $user -> createToken('AuthToken')-> plainTextToken;

        $response = [
            'user'=> $user,
            'token' => $token
        ];

        return response($response,201);

    }

    public function  login(Request $request){
        $fields = $request->validate([
            'email'=> 'required|string',
            'password'=>'required|string'
        ]);

     

        //Checking data Email and Password

        $user =User::where('email',$fields['email'])->first();


        if(!$user || !Hash::check($fields['password'],$user->password)){
            return response([
                'message'=> 'Error in Password',
            
            ],401);
        };


        $token = $user -> createToken('AuthToken')-> plainTextToken;

        $response = [
            'user'=> $user,
            'token' => $token
        ];

        return response($response,201);

    }


  
}
