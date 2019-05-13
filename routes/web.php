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



Route::resource('hello','HelloSignController');

Route::get('/login','AuthLoginController@getLogin');

Route::post('login','AuthLoginController@login')->name("login");
Route::get('lang','LangController@lang');

Route::get('/test2','HomeController@index');

Route::any('sign/callback','SignController@callback');

//Auth::routes();


Route::group(['middleware'=>['web','user_auth']],function (){
    Route::get('/','UserController@index')->name('index');
    Route::post('logout','AuthLoginController@logout')->name('logout');
    // Route::resource('user','UserController');
    Route::get('sign_download','SignController@download');
    Route::resource('invite','InviteController');
    Route::resource('sign','SignController');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/welcome', 'HomeController@welcome')->name('welcome');
    Route::get('/user/index', 'UserController@index')->name('index');
    Route::get('/user/list', 'UserController@list')->name('list');
    Route::get('/user/sign', 'UserController@sign')->name('sign');
    Route::get('/user/signinfo', 'UserController@signinfo')->name('signinfo');
    Route::get('/invite_list','InviteController@list');
    Route::get('/toinvite', 'InviteController@toinvite')->name('toinvite');

});
