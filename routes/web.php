<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProduceMController;
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

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');
//
//require __DIR__.'/auth.php';

//登录
Route::post('auth/register',[ApiController::class,'register']);
Route::post('auth/login',[ApiController::class,'login']);
//NO.1增删改查
Route::post('add',[ProductController::class,'add']);
Route::put('update/{id}',[ProductController::class,'update']);
Route::get('list',[ProductController::class,'list']);
Route::delete('delete/{id}',[ProductController::class,'delete']);
//NO.2增删改查
Route::post('pAdd',[ProduceMController::class,'add']);
Route::put('pUpdate/{id}',[ProduceMController::class,'update']);
Route::get('pList',[ProduceMController::class,'list']);
Route::delete('pDelete/{id}',[ProduceMController::class,'delete']);
