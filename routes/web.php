<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\AlertSensorMail;
use App\Http\Controllers\BotManController;

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

Route::get('/', function () {return view('auth.login');});
Route::match(['get', 'post'], '/botman', [BotManController::class, 'handle']);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::resource('region', 'RegionController')->middleware('auth');
Route::resource('user', 'UserController')->middleware('auth');
Route::resource('role', 'RoleController')->middleware('auth');
Route::resource('assignment', 'AssignmentController')->middleware('auth');
Route::resource('permission', 'PermissionController')->middleware('auth');
Route::resource('crd', 'CrdController')->middleware('auth');
Route::resource('erb', 'ErbController')->middleware('auth');
Route::resource('counter', 'CounterController')->middleware('auth');
Route::resource('qr', 'QrController')->middleware('auth');
Route::resource('nfc', 'NfcController')->middleware('auth');
Route::get('sensor/chart/{id}', 'SensorController@chart')->name('sensor.chart')->middleware('auth');
Route::resource('sensor', 'SensorController')->middleware('auth');
Route::resource('statisticalrequest', 'StatisticalRequestController')->middleware('auth');
Route::resource('statisticalsensor', 'StatisticalSensorController')->middleware('auth');
Route::resource('statisticalcounter', 'StatisticalCounterController')->middleware('auth');
Route::get('learningrequest/chart/{id}', 'LearningRequestController@chart')->name('learningrequest.chart')->middleware('auth');
Route::get('learningsensor/chart/{id}', 'LearningSensorController@chart')->name('learningsensor.chart')->middleware('auth');
Route::resource('learningrequest', 'LearningRequestController')->middleware('auth');
Route::resource('learningsensor', 'LearningSensorController')->middleware('auth');
Route::resource('probeestimating', 'ProbeEstimatingController')->middleware('auth');
Route::resource('classname', 'ClassNameController')->middleware('auth');
Route::get('file/download/{id}', 'FileController@download')->name('file.download')->middleware('auth');
Route::resource('file', 'FileController')->middleware('auth');
Route::resource('alert', 'AlertController')->middleware('auth');
Route::resource('historialcounter', 'HistorialCounterController')->middleware('auth');
Route::resource('historialcrd', 'HistorialCrdController')->middleware('auth');
Route::resource('historialerb', 'HistorialErbController')->middleware('auth');
Route::resource('historialqr', 'HistorialQrController')->middleware('auth');
Route::resource('historialnfc', 'HistorialNfcController')->middleware('auth');
Route::get('historialsensor/chart/{id}', 'HistorialSensorController@chart')->name('historialsensor.chart')->middleware('auth');
Route::resource('historialsensor', 'HistorialSensorController')->middleware('auth');
Route::get('email/sensor', function() {
    $mail = new AlertSensorMail;
    Mail::to('support@fjlic.com')->send($mail);
    return $mail->render(); 
});

Auth::routes();
/*Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');*/