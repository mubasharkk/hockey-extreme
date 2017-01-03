<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return redirect(\Xinax\LaravelGettext\Facades\LaravelGettext::getLocale().'/');
});

Route::get('/lang/{locale?}', [
    'as'=>'lang',
    'uses'=>'HomeController@changeLang'
]);

/**
 * With Locales
 */
Route::group(['prefix' => '{locale}', 'middleware' => ['site.locales']], function(){

    Auth::routes();

    Route::get('/', [
        'uses' => 'HomeController@index',
        'as'   => 'homepage'
    ]);

    Route::get('/dashboard', [
        'uses' => 'HomeController@dashboard',
        'as'   => 'dashboard'
    ]);

    Route::resource('federation', 'Hockey\FederationController');

});


