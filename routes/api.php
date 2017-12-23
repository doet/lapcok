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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::prefix('bank')->group(function(){
  Route::post('jqgrid', 'Bank\BankApiController@jqgrid');
  Route::post('json', 'Bank\BankApiController@json');
  Route::post('save', 'Bank\BankApiController@save');
});
