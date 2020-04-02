<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class PassportUserController extends Controller
{
    public function login(){
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('HR App')-> accessToken;
            $success['user'] =  $user;
            return response()->json(['success' => $success], 200);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }

    public function register(Request $request)
    {
        // $request->validate(['name' => 'required',
        // 'email' => 'required|email',
        // 'password' => 'required',
        // 'c_password' => 'required|same:password',]);

            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'c_password' => 'required|same:password',
            ]);
            if ($validator->fails()) {
                        return response()->json(['error'=>$validator->errors()], 401);
                    }

            $input = $request->all();
            $input['password'] = bcrypt($input['password']);
            //add new user 
            $user = User::create($input);
            // create array
          
            $success['token'] =  $user->createToken('HR App')->accessToken;
            $success['user'] =  $user;
            $success['test'] ="hello";
            return response()->json(['success'=>$success], 200);
    }

    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user],200);
    }
}
