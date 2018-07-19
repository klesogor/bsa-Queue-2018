<?php

use Illuminate\Http\Request;

use App\Entity\Currency;
use App\Http\Requests\UpdateCurrencyRateRequest;
use App\Services\CurrencyRepositoryInterface;
use App\Services\UpdateRateRequest;

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


Route::put('/currencies/{currency}/rate','HomeController@updateRate');