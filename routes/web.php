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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Route::resource('region', 'RegionController');
Route::resource('user', 'UserController');
Route::resource('role', 'RoleController');
Route::resource('crd', 'CrdController');
Route::resource('erb', 'ErbController');
Route::resource('counter', 'CounterController');
Route::resource('qr', 'QrController');
Route::resource('nfc', 'NfcController');
Route::resource('historialcounter', 'HistorialCounterController');
Route::resource('historialcrd', 'HistorialCrdController');
Route::resource('historialerb', 'HistorialErbController');
Route::resource('historialqr', 'HistorialQrController');
Route::resource('historialnfc', 'HistorialNfcController');
