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

use Doctrine\Inflector\RulesetInflector;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(); // laravelのユーザ登録機能をオフに切替

Route::get('/home', 'HomeController@index')->name('home');


// Route::group(['middleware' => 'guest'], function () {
    Route::namespace('Auth')->group(function () {
        Route::get('/register', 'RegisterController@registerView')->name('register');
        Route::post('/register', 'RegisterController@registerPost')->name('register');
        Route::get('/login', 'LoginController@loginView')->name('login');
        Route::post('/login/post', 'LoginController@loginPost')->name('loginPost');
    });
// });

// admin
    Route::namespace('Admin')->group(function () {
        Route::get('/admin', 'CalendarController@show')->name('adminView');
    });

    // deneral
    Route::namespace('General')->group(function () {
        Route::get('/general', 'CalendarController@show')->name('generalView');
    });
