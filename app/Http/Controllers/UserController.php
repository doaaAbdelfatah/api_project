<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    protected function register(Request $request)
    {
        $token =Str::random(80);
        $data =$request->all();
        $user= User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            "api_token" => hash('sha256', $token),       
        ]);
        
        return $token;

     //   return $user;
    }
    function get_token(Request $request)
    {
        $token =Str::random(90);
        //$user =User::find($request->id);
        $email = $request->input("email");
        $pw =$request->input("password");

       
      $rslt = Auth::attempt(['email' => $email, 'password' => $pw]) ;
        if($rslt) {
            auth()->user()->api_token =hash('sha256', $token)
            ;
            auth()->user()->save();
            //return auth()->user() ;//["token" =>$user->api_token];
            
            //return ["token" =>auth()->user()->api_token];
            return ["token" => $token];
        }          
        else
          return response()->json(["message" =>"Invalid User Name or Password"], 401);

    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
