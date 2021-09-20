<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\User\CouponController;

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

//user
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store'])->name('register');
Route::get('/verify/{mobile}', [CouponController::class, 'verify']);
Route::post('/verify', [CouponController::class, 'checkVerify'])->name('coupon_verify');
Route::get('/verified', [CouponController::class, 'coupon_verified'])->name('coupon_verified');


//admin
Route::group(['prefix'=>'admin'], function(){
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'checkLogin'])->name('login');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});