<?php

use Illuminate\Http\Request;

use App\Porduct;
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

Route::get('/searchvue',function(){
  $query = Input::get('query');
  $products = Product::where('name','like','%'.$query.'%')->get();
  return response()->json($products);
});
