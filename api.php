<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController; 
use App\Http\Controllers\CoffeeController;
use App\Http\Controllers\transaksi;
use App\Http\Controllers\siswa;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/addsiswa',[siswa::class,'addsiswa']);
//CRUD
Route::post('/addcoffee',[CoffeeController::class,'addcoffee']);
Route::get('/getcoffee',[CoffeeController::class,'getcoffee']);
Route::put('/updatecoffee/{id}',[CoffeeController::class,'updatecoffee']);
Route::delete('/deletecoffee/{id}',[CoffeeController::class,'deletecoffee']);

//Transaksi
Route::post('order',[transaksi::class,'order']);
Route::post('tambahorder/{id}',[transaksi::class,'tambahOrder']);
Route::get('getorder/{id}',[transaksi::class,'getdetail']);
Route::get('getallorder',[transaksi::class,'getdetailall']);
//auth
Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh'); 
});