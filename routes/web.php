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
Route::get('/profile', 'Profile\ProfileController@index')->name('profile');
Route::get('/profile', 'Profile\ProfileController@index')->name('profile');
Route::namespace('Profile')->group(function () {
    Route::get('/profile', 'ProfileController@index')->name('profile');
//    Route::get('/profile', 'ProfileController@edit')->name('edit.profile');
});

