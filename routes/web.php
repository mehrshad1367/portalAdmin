<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/redis', function () {
//    return view('welcome');
    $redis=app()->make('redis');

    $redis->set('key1','Mehriiii');
    return $redis->get('key1');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/contact', 'ContactController@index')->name('contact');


//-------------------------------------Profile-------------------------------------------
Route::group(['middleware'=>['access'],'namespace' => 'profile'],function (){
    Route::get('/profile/{id}', 'ProfileController@show')->name('profile.show');
    Route::get('/profile/edit/{id}', 'ProfileController@edit')->name('profile.edit');
    Route::post('/profile/update/{id}', 'ProfileController@update')->name('profile.update');
    Route::get('/', 'ProfileController@index')->name('int');
    Route::post('/profile/avatar/{id}', 'ProfileController@avatar')->name('profile.avatar');
    Route::post('/profile/editPass/{id}', 'ProfileController@update_password')->name('profile.editPass');
});

//-------------------------------------Message-------------------------------------------
Route::namespace('MessageCenter')->group(function (){
    Route::get('/msg','MessageCenterController@index')->name('msg.index');
    Route::get('/msg/{id}','MessageCenterController@show')->name('msg.show')->where('id','[0-9]+');
    Route::get('/msg/write','MessageCenterController@write')->name('msg.write');
    Route::post('/msg/send','MessageCenterController@send')->name('msg.send');
    Route::get('/msg/outbox','MessageCenterController@outbox')->name('msg.outbox');
//    Route::get('msg/send','MessageCenterController@send')->name('msg.send');
});

//-------------------------------------Google-------------------------------------------
Route::get('google', function () {
    return view('googleAuth');
});

Route::get('auth/google', 'Auth\LoginController@redirectToProvider');
Route::get('auth/google/callback', 'Auth\LoginController@handleGoogleCallback');

