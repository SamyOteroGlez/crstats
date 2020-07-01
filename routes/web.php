<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [
    'as' => 'landing',
    'uses' => 'SiteController@landing',
])->middleware('flush-tag');

Route::post('/clan/tag', [
    'as' => 'clan.tag',
    'uses' => 'SiteController@clanTag',
])->middleware(['clan-tag']);

Route::post('/player/tag', [
    'as' => 'player.tag',
    'uses' => 'SiteController@playerTag',
])->middleware('player-tag');

Route::get('/invictus', function () {
    return redirect()->route('home');
})->middleware('default-clan');

Route::middleware(['check-tag-session'])->group(function () {

    Route::get('/home', [
        'as' => 'home',
        'uses' => 'SiteController@home',
    ]);

    Route::get('/players/{tag}', [
        'as' => 'players',
        'uses' => 'SiteController@players',
    ]);

    Route::get('/clan-war', [
        'as' => 'clan.war',
        'uses' => 'SiteController@clanWar',
    ]);

    Route::get('/stats', [
        'as' => 'stats',
        'uses' => 'SiteController@stats',
    ]);

    // Route::get('/other', [
    //     'as' => 'other',
    //     'uses' => 'SiteController@other',
    // ]);

    Route::get('/policy', [
        'as' => 'policy',
        'uses' => 'SiteController@policy',
    ]);

    Route::get('/terms', [
        'as' => 'terms',
        'uses' => 'SiteController@terms',
    ]);

    Route::get('/disclaimer', [
        'as' => 'disclaimer',
        'uses' => 'SiteController@disclaimer',
    ]);
});
