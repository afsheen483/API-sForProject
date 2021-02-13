<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Product\Product;



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

Route::get('brand','Brand\BrandController@brand');
Route::get('brand/{id}','Brand\BrandController@brandByID');
Route::post('brand','Brand\BrandController@brandSave');
//Route::put('brand/{brand}','Brand\BrandController@brandUpdate');
Route::put('brand/{id}','Brand\BrandController@brandUpdate');
//Route::delete('brand/{brand}','Brand\BrandController@brandDelete');
Route::delete('brand/{id}','Brand\BrandController@brandDelete');
Route::apiResource('product','Product\Product');
//Route::apiResource('product', Product::class);
Route::post('login','Login\LoginController@login');
Route::post('signup','Signup\SignupController@signup');
Route::post('password/email', 'ForgotPasswordController@forgot');
Route::post('password/reset', 'ForgotPasswordController@reset');
Route::apiResource('product','Product\ProductController');
Route::apiResource('product_category','Product\Product_Category');
Route::apiResource('subproduct','Product\SubProduct');
Route::apiResource('business_supplier','BusinessSupplierController');
Route::apiResource('city','CityController');
Route::apiResource('users','user');
