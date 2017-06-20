<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*Route::get('/test', function(){
   return "Hello world API";
});*/

ApiRoute::version('v1', function(){
    ApiRoute::get('/test', function(){
        return 'v1';
    });
});

ApiRoute::version('v2', function(){
    ApiRoute::get('/test', function(){
        return 'v2';
    });
});