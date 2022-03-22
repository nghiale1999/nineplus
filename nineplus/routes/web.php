<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;
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


Route::get('/qluser',[DemoController::class, 'GetDemo']);
Route::get('/register',[DemoController::class, 'GetRegister']);
Route::post('/register',[DemoController::class, 'PostRegister']);
Route::get('/login',[DemoController::class, 'GetLogin']);
Route::post('/login',[DemoController::class, 'PostLogin']);
Route::post('/deleteuser',[DemoController::class, 'DeleteUser']);

Route::get('/edituser/{id}',[DemoController::class, 'GetEditUser']);
Route::post('/edituser/{id}',[DemoController::class, 'PostEditUser']);




