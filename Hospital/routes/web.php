<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/home',[HomeController::class,'redirect']);
Route::get('/about',[HomeController::class,'about']);
Route::get('/news',[HomeController::class,'news']);
Route::get('/doctorview',[HomeController::class,'doctorview']);
Route::get('/appointmentview',[HomeController::class,'appointmentview']);
Route::get('/',[HomeController::class,'index']);
Route::get('/myappointment',[HomeController::class,'myappointment']);
Route::get('/add_doctor_view',[AdminController::class,'addview']);
Route::get('/showAppointment',[AdminController::class,'showAppointment']);
Route::get('/showDoctor',[AdminController::class,'showDoctor']);
Route::get('/cancel_appointment/{id}',[HomeController::class,'cancel_appointment']);
Route::get('/deleteDoctor/{id}',[AdminController::class,'deleteDoctor']);
Route::get('/updateDoctor/{id}',[AdminController::class,'updateDoctor']);
Route::get('/approveAppointment/{id}',[AdminController::class,'approveAppointment']);
Route::get('/cancelAppointment/{id}',[AdminController::class,'cancelAppointment']);
Route::post('/appointment',[HomeController::class,'appointment']);
Route::post('/upload_doctor',[AdminController::class,'upload']);
Route::post('/editedDoctor/{id}',[AdminController::class,'editedDoctor']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
