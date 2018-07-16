<?php

use Illuminate\Http\Request;

use App\Entity\Currency;
use App\Http\Requests\UpdateCurrencyRateRequest;

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


Route::put('/currencies/{currency}/rate',function(Currency $currency, UpdateCurrencyRateRequest $request){
    if(Gate::denies('currency.update',$currency))
        abort(403);

    $currency->update($request->validated());
});