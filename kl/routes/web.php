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
        Route::get('/dashboard','AdController@GetDashboard')->middleware('auth.login');

        //thông tin cá nhân
        Route::get('/thongtincanhan','AdController@GetThongtincanhan')->middleware('auth.login');
        Route::post('/thongtincanhan','AdController@PostThongtincanhan')->middleware('auth.login');

        // chức năng quốc gia
        Route::get('/quocgia','AdController@GetQuocgia')->middleware('auth.login');
        Route::get('/quocgia/xoa/{id}','AdController@GetXoaquocgia')->middleware('auth.login');

        Route::get('/quocgia/themquocgia','AdController@GetThemquocgia')->middleware('auth.login');
        Route::post('/quocgia/themquocgia','AdController@PostThemquocgia')->middleware('auth.login');

        //chức năng bài viết
        Route::get('/baiviet','ControllerBaiviet@GetBaiviet')->middleware('auth.login');
        Route::get('/baiviet/xoabaiviet/{id}','ControllerBaiviet@GetXoabaiviet')->middleware('auth.login');

        Route::get('/baiviet/thembaiviet','ControllerBaiviet@GetThembaiviet')->middleware('auth.login');
        Route::post('/baiviet/thembaiviet','ControllerBaiviet@PostThembaiviet')->middleware('auth.login');

        Route::get('/baiviet/suabaiviet/{id}','ControllerBaiviet@GetSuabaiviet')->middleware('auth.login');
        Route::post('/baiviet/suabaiviet/{id}','ControllerBaiviet@PostSuabaiviet')->middleware('auth.login');


        // quản lý user xóa và hỗ trợ
        Route::get('/quanlyuser','ControllerQuanlyuser@Quanlyuser')->middleware('auth.login');
        Route::post('/delete_user','ControllerQuanlyuser@XoaUser')->middleware('auth.login');

        Route::get('/quanlyuser/hotro/{id}','ControllerQuanlyuser@GetHotro')->middleware('auth.login');
        Route::post('/quanlyuser/hotro/{id}','ControllerQuanlyuser@PostHotro')->middleware('auth.login');
        Route::post('/logout','ControllerQuanlyuser@logout');

    });