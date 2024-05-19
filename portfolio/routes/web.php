<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PictureController;

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
Route::get('/register',[UserController::class,'index']);
Route::post('/register',[UserController::class,'register']);

Route::middleware(['auth'])->group(function(){
   Route::get('/top',[HomeController::class,'top'])->name('top');
   Route::get('/record/{name}',[RecordController::class,'record'])->name('record');
   Route::post('/upload/{name}',[UploadController::class,'upload'])->name('upload');
   Route::get('/logout',[AuthController::class,'logout'])->name('logout');
   Route::delete('/delete/{name}',[RecordController::class,'delete']);
   Route::get('/picture',[PictureController::class,'picture'])->name('picture');
});
