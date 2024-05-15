<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\UploadController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/',[AuthController::class,'index'])->name('front.index');
Route::post('/login',[AuthController::class,'login']);

Route::middleware(['auth'])->group(function(){
   Route::get('/top',[HomeController::class,'top'])->name('top');
   Route::get('/record',[RecordController::class,'record'])->name('record');
   Route::post('/upload',[UploadController::class,'upload'])->name('upload');
   Route::get('/logout',[AuthController::class,'logout'])->name('logout');
});
