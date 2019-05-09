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
    return view('welcome');
});

Route::resource('hello','HelloSignController');

Route::get('/login','AuthLoginController@getLogin');

Route::post('login','AuthLoginController@login')->name("login");
Route::get('lang','LangController@lang');
Route::get('sign_download','SignController@download');
//Auth::routes();


Route::group(['middleware'=>['web','user_auth']],function (){
    Route::post('logout','AuthLoginController@logout')->name('logout');
    // Route::resource('user','UserController');

    Route::resource('invite','InviteController');
    Route::resource('sign','SignController');
    Route::get('invite_page','InviteController@getIndex');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/welcome', 'HomeController@welcome')->name('welcome');
    Route::get('/user/home', 'UserController@home')->name('home');
    Route::get('/user/list', 'UserController@list')->name('list');
    Route::get('/user/sign', 'UserController@sign')->name('sign');
    Route::get('/user/toinvite', 'UserController@toinvite')->name('toinvite');

});
