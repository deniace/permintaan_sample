<?php

use Illuminate\Support\Facades\Auth;
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

/**
 * Created By Deni supriyatna (Deni Ace)
 * email : denisupriyatna01@gmail.com
 */
Route::get('/', 'auth\LoginController@showLoginForm');

Auth::routes(['reset' => false, 'register' => false]);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/beranda', 'BerandaController@index');
    Route::post('/beranda', 'BerandaController@show');
    Route::resource('areas', 'AreaController');
    Route::resource('division', 'DivisionController');
    Route::resource('akun', 'AkunController');
    Route::resource('permintaansample', 'PermintaanSampleController');
    Route::get('/pdf/{id}', "PdfController@show");
    Route::get('/naive_bayes', "NaiveBayesController@index");
    Route::post('/naive_bayes', "NaiveBayesController@show");
    Route::get('/fpdf/{id}', "FpdfController@show");

    Route::get('/import', "ImportController@index");
    Route::post('/import', "ImportController@store");
    Route::delete('/import', "ImportController@destroy");
    Route::get('/profile/{user}/edit', "ProfileController@edit");
    Route::put('/profile/{user}', "ProfileController@update");
});
