<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::resource('user', 'UserController');
//Route::resource('role', 'RoleController');updthistialsqr
//Route::post('qr/updthistorialqr', 'API\QrController@historialqr')->name('qr.updthistorialqr');
Route::post('cont/test', 'API\ContadorController@test')->name('cont.test');
Route::post('qr/unblock', 'Api\QrController@unblock')->name('qr.unblock');
Route::post('qr/modify', 'Api\QrController@modify')->name('qr.modify');
Route::resource('qr', 'Api\QrController');
//Route::post('nfc/updthistorialnfc', 'Api\NfcController@historialnfc')->name('nfc.updthistorialnfc');
Route::post('nfc/modify', 'Api\NfcController@modify')->name('nfc.modify');
Route::resource('nfc', 'Api\NfcController');
//Route::post('sensor/updthistorialsensor', 'Api\SensorController@historialsensor')->name('sensor.updthistorialsensor');
Route::post('sensor/qrunblock', 'Api\SensorController@qrunblock')->name('sensor.qrunblock');
Route::post('sensor/modify', 'Api\SensorController@modify')->name('sensor.modify');
Route::resource('sensor', 'Api\SensorController');
Route::post('erb/modify', 'Api\ErbController@modify')->name('erb.modify');
Route::post('erb/register', 'Api\ErbController@register')->name('erb.register');
Route::resource('erb', 'Api\ErbController');
Route::post('crd/modify', 'Api\CrdController@modify')->name('crd.modify');
Route::post('crd/register', 'Api\CrdController@register')->name('crd.register');
Route::resource('crd', 'Api\CrdController');

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
