<?php

use App\Http\Controllers\TinController;
use App\Http\Controllers\TheLoaiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoaiTinController;
use App\Http\Controllers\TinTucController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
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

Route::get('/admin/dangnhap',[UserController::class,'getdangnhapAdmin']);
Route::post('/admin/dangnhap',[UserController::class,'postdangnhapAdmin']);
Route::get('/admin/logout',[UserController::class,'DangXuatAdmin']);

//admin
Route::group(['prefix' => 'admin','middleware'=>'adminLogin'], function () {
    Route::group(['prefix' => 'theloai'], function () {
        Route::get('/danhsach', [TheLoaiController::class, 'danhSach'])->name('admin.theloai.danhsach');
        Route::get('/sua/{id}', [TheLoaiController::class, 'sua']);
        Route::post('/sua/{id}', [TheLoaiController::class, 'sua_']);
        Route::get('/them', [TheLoaiController::class, 'them']);
        Route::post('/them', [TheLoaiController::class, 'them_']);
        Route::get('/xoa/{id}', [TheLoaiController::class, 'xoa'])->name('xoatl');
    });

    Route::group(['prefix' => 'loaitin'], function () {
        Route::get('/danhsach', [LoaiTinController::class, 'danhSach']);
        Route::get('/sua/{id}', [LoaiTinController::class, 'sua']);
        Route::post('/sua/{id}', [LoaiTinController::class, 'sua_']);
        Route::get('/them', [LoaiTinController::class, 'them']);
        Route::post('/them', [LoaiTinController::class, 'them_']);
        Route::get('/xoa/{id}', [LoaiTinController::class, 'xoa']);
    });

    Route::group(['prefix' => 'tintuc'], function () {
        Route::get('/danhsach', [TinTucController::class, 'danhSach']);
        Route::get('/sua/{id}', [TinTucController::class, 'sua']);
        Route::post('/sua/{id}', [TinTucController::class, 'sua_']);
        Route::get('/them', [TinTucController::class, 'them']);
        Route::post('/them', [TinTucController::class, 'them_']);
        Route::get('/xoa/{id}', [TinTucController::class, 'xoa']);
    });

    Route::group(['prefix' => 'user'], function () {
        Route::get('/danhsach', [UserController::class, 'danhSach']);
        Route::get('/sua/{id}', [UserController::class, 'sua']);
        Route::post('/sua/{id}', [UserController::class, 'sua_']);
        Route::get('/them', [UserController::class, 'them']);
        Route::post('/them', [UserController::class, 'them_']);
        Route::get('/xoa/{id}', [UserController::class, 'xoa']);
    });
    Route::group(['prefix' => 'ajax'], function () {
        Route::get('loaitin/{idTheLoai}', [AjaxController::class, 'getLoaiTin']);
    });
});





//front
Route::get('/', [TinController::class, 'trangchu']);
Route::get('/tintrongloai/chitiet/{id}', [TinController::class,'chitiet']);
Route::get('/tintrongloai/{id}', [TinController::class,'tintrongloai']);
Route::get('/dangnhap',[TinController::class,'getdangnhap']);
Route::post('/dangnhap',[TinController::class,'postdangnhap']);
Route::get('/dangxuat',[TinController::class,'getdangxuat']);
Route::get('/dangki',[TinController::class,'getdangki']);
Route::post('/dangki',[TinController::class,'postdangki']);
Route::get('/actived/{user}/{token}',[TinController::class,'actived'])->name('user.actived');

//quên mật khẩu
Route::get('/forget-password',[TinController::class,'forgetPass'])->name('user.forgetPass');
Route::post('/forget-password',[TinController::class,'postForgetPass']);
Route::get('/get-password/{user}/{token}',[TinController::class,'getPass'])->name('user.getPass');
Route::post('/get-password/{user}/{token}',[TinController::class,'postGetPass']);