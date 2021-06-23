<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\KelahiranController;
use App\Http\Controllers\PegawaiController;
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
    return view('welcome');
});

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');

Route::get('/home',[HomeController::class,'index'])->name('home')->middleware(['auth:sanctum','verified']);
Route::get('/dashboard',[HomeController::class,'dashboard'])->name('dashboard')->middleware(['auth:sanctum','verified']);
Route::resource('penduduk',PendudukController::class);
Route::resource('kelahiran',KelahiranController::class);
Route::resource('pegawai',PegawaiController::class);