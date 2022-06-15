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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', [App\Http\Controllers\Controller::class,'index'])->name('index');
Route::get('/create', [App\Http\Controllers\Controller::class,'create'])->name('crear');
Route::Post('/store', [App\Http\Controllers\Controller::class,'store'])->name('guardar');

Route::get('/edit/{id}', [App\Http\Controllers\Controller::class,'edit'])->name('edit');
Route::post('/update/{id}', [App\Http\Controllers\Controller::class,'update'])->name('update');

Route::get('/delete/{id}', [App\Http\Controllers\Controller::class,'destroy'])->name('delete');
