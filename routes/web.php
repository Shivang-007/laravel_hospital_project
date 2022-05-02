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



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/',[HomeController::class,'index']);

//admin panel
// Route::get('/showappointment',[AdminController::class,'adminHome']);
Route::get('/add_doctor',[AdminController::class,'add_doctor']);
Route::post('/upload_doctor',[AdminController::class,'upload_doctor']);
Route::get('/showappointment',[AdminController::class,'showappointment']);
Route::get('/approved/{id}',[AdminController::class,'approved']);
Route::get('/cenceled/{id}',[AdminController::class,'cenceled']);
Route::get('/showdoctor',[AdminController::class,'showdoctor']);
Route::get('/update/{id}',[AdminController::class,'update']);
Route::post('/edit',[AdminController::class,'edit']);
Route::get('/delete/{id}',[AdminController::class,'delete']);
Route::get('/email/{id}',[AdminController::class,'email']);
Route::post('/sendmail/{id}',[AdminController::class,'sendmail']);






//user deshboard
Route::get('/home',[HomeController::class,'redirect'])->middleware('auth','verified');
Route::post('/appointment',[HomeController::class,'appointment']);
Route::get('/myappointment',[HomeController::class,'myappointment']);
Route::get('/cencel_appoint/{id}',[HomeController::class,'cencel_appoint']);




