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

Route::group([
    'prefix' => '/v1',
    'as' => 'v1.',
], function () {

    Route::get('/cloverpath/cr/magic/number', [
        'as' => 'visits.log',
        'uses' => 'RestController@visitsLog',
    ]);
});
