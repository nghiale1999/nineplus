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


Route::get('/', function () {
    return view('welcome');
});




// composer require laravel/ui:^2.4
// php artisan ui vue --auth
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group([
    'prefix'=>'admin',
    'namespace'=>'admin',

    ],function(){
        // dashboard
        Route::get('/dashboard','AdController@GetDashboard');

        //thông tin cá nhân
        Route::get('/thongtincanhan','AdController@GetThongtincanhan');
        Route::post('/thongtincanhan','AdController@PostThongtincanhan');

        // chức năng quốc gia
        Route::get('/quocgia','AdController@GetQuocgia');
        Route::get('/quocgia/xoa/{id}','AdController@GetXoaquocgia');

        Route::get('/quocgia/themquocgia','AdController@GetThemquocgia');
        Route::post('/quocgia/themquocgia','AdController@PostThemquocgia');

        //chức năng bài viết
        Route::get('/baiviet','ControllerBaiviet@GetBaiviet');
        Route::get('/baiviet/xoabaiviet/{id}','ControllerBaiviet@GetXoabaiviet');

        Route::get('/baiviet/thembaiviet','ControllerBaiviet@GetThembaiviet');
        Route::post('/baiviet/thembaiviet','ControllerBaiviet@PostThembaiviet');

        Route::get('/baiviet/suabaiviet/{id}','ControllerBaiviet@GetSuabaiviet');
        Route::post('/baiviet/suabaiviet/{id}','ControllerBaiviet@PostSuabaiviet');



        Route::get('/quanlyuser','ControllerQuanlyuser@Quanlyuser');

        // Route::get('/qluser/delete/{id}','QluserController@DeleteUser');

        // Route::get('/qluser/warning/{id}','QluserController@warning');

        // Route::post('/qluser/warning/{id}','QluserController@PostWarning');

    });