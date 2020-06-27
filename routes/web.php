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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/contact', 'ContactController@index')->name('contact');

Route::group(['middleware'=>['access'],'namespace' => 'profile'],function (){
    Route::get('/profile/{id}', 'ProfileController@show')->name('profile.show');
    Route::get('/profile/edit/{id}', 'ProfileController@edit')->name('profile.edit');
    Route::post('/profile/update/{id}', 'ProfileController@update')->name('profile.update');
    Route::get('/', 'ProfileController@index')->name('int');
    Route::post('/profile/avatar/{id}', 'ProfileController@avatar')->name('profile.avatar');
    Route::post('/profile/editPass/{id}', 'ProfileController@update_password')->name('profile.editPass');
});

