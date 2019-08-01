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


Route::get('/home_index','TestController@welcome');
Route::group(['middleware'=>'can_login'],function (){
Route::resource('hello','HelloSignController');

Route::get('/login','AuthLoginController@getLogin');

Route::post('login','AuthLoginController@login')->name("login");
Route::get('lang','LangController@lang');
Route::get('test','TestController@index');

//Route::get('pay','PayController@index');

Route::any('/pay/{act}', function($act){
	$classname='App\Http\Controllers\PayController';
	return (new $classname())->$act(new Request());

});



Route::any('sign/callback','SignController@callback');

//Auth::routes();


Route::group(['middleware'=>['web','user_auth']],function (){
     Route::get('/user/home','UserController@home');
     Route::get('/sign_pdf','SignController@sign_pdf');
     Route::get('download_word','SignController@download_word');
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
    Route::get('/company_information', 'UserController@company_information')->name('company_information');
    Route::get('/investor_information', 'UserController@investor_information')->name('investor_information');
    Route::get('/payment_information', 'UserController@payment_information')->name('payment_information');
    Route::get('/personal_information', 'UserController@personal_information')->name('personal_information');
    Route::get('/invite_list','InviteController@list');
    Route::get('/toinvite', 'InviteController@toinvite')->name('toinvite');

});
});
