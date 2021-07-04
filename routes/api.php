<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Api Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Api routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your Api!
|
*/

//Route::resource('user', 'UserController');
//Route::resource('role', 'RoleController');updthistialsqr
//Route::post('qr/updthistorialqr', 'Api\QrController@historialqr')->name('qr.updthistorialqr');
Route::post('cont/test', 'Api\CounterController@test')->name('cont.test');
Route::post('qr/unblock', 'Api\QrController@unblock')->name('qr.unblock');
Route::post('qr/modify', 'Api\QrController@modify')->name('qr.modify');
Route::resource('qr', 'Api\QrController');
//Route::post('nfc/updthistorialnfc', 'Api\NfcController@historialnfc')->name('nfc.updthistorialnfc');
Route::post('nfc/modify', 'Api\NfcController@modify')->name('nfc.modify');
Route::resource('nfc', 'Api\NfcController');
//Route::post('sensor/updthistorialsensor', 'Api\SensorController@historialsensor')->name('sensor.updthistorialsensor');
Route::post('sensor/qrunblock', 'Api\SensorController@qrunblock')->name('sensor.qrunblock');
Route::post('sensor/modify', 'Api\SensorController@modify')->name('sensor.modify');
Route::post('sensor/status', 'Api\SensorController@status')->name('sensor.status');
Route::resource('sensor', 'Api\SensorController');
Route::post('erb/modify', 'Api\ErbController@modify')->name('erb.modify');
Route::post('erb/register', 'Api\ErbController@register')->name('erb.register');
Route::resource('erb', 'Api\ErbController');
Route::post('crd/modify', 'Api\CrdController@modify')->name('crd.modify');
Route::post('crd/register', 'Api\CrdController@register')->name('crd.register');
Route::resource('crd', 'Api\CrdController');
Route::post('file/list', 'Api\FileController@list')->name('file.list');
Route::post('file/download', 'Api\FileController@download')->name('file.download');

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
