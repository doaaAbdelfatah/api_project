<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::apiResource("customer" ,"CustomerController")->middleware('auth:api');
Route::apiResource("user" ,"UserController")->middleware("api_secure");


Route::post("user/token/" , "UserController@get_token");
Route::post("user/register/" , "UserController@register");