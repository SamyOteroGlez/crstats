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

Route::get('/', function () {
    return redirect()->route('home');
});

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

Route::get('/other', [
    'as' => 'other',
    'uses' => 'SiteController@other',
]);

Route::get('/stats', [
    'as' => 'stats',
    'uses' => 'SiteController@stats',
]);
