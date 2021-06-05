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
Route::post('cont/test', 'API\CounterController@test')->name('cont.test');
Route::post('qr/unblock', 'API\QrController@unblock')->name('qr.unblock');
Route::post('qr/modify', 'API\QrController@modify')->name('qr.modify');
Route::resource('qr', 'API\QrController');
//Route::post('nfc/updthistorialnfc', 'API\NfcController@historialnfc')->name('nfc.updthistorialnfc');
Route::post('nfc/modify', 'API\NfcController@modify')->name('nfc.modify');
Route::resource('nfc', 'API\NfcController');
//Route::post('sensor/updthistorialsensor', 'API\SensorController@historialsensor')->name('sensor.updthistorialsensor');
Route::post('sensor/qrunblock', 'API\SensorController@qrunblock')->name('sensor.qrunblock');
Route::post('sensor/modify', 'API\SensorController@modify')->name('sensor.modify');
Route::post('sensor/status', 'API\SensorController@status')->name('sensor.status');
Route::resource('sensor', 'API\SensorController');
Route::post('erb/modify', 'API\ErbController@modify')->name('erb.modify');
Route::post('erb/register', 'API\ErbController@register')->name('erb.register');
Route::resource('erb', 'API\ErbController');
Route::post('crd/modify', 'API\CrdController@modify')->name('crd.modify');
Route::post('crd/register', 'API\CrdController@register')->name('crd.register');
Route::resource('crd', 'API\CrdController');

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
