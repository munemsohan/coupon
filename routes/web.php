<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\User\CouponController;
use App\Http\Controllers\Seller\SellerController;

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
Route::get('/success', [RegisterController::class, 'success_payment'])->name('success');
Route::post('/notify', [RegisterController::class, 'notify_payment'])->name('notify');
Route::get('/cancel', [RegisterController::class, 'cancel_payment'])->name('cancel');
Route::get('/verify/', [CouponController::class, 'verify'])->name('verify');
Route::post('/verify', [CouponController::class, 'checkVerify'])->name('coupon_verify');
Route::post('/verify_code', [CouponController::class, 'verify_code'])->name('verify_code');
Route::get('/verified', [CouponController::class, 'coupon_verified'])->name('coupon_verified');

//seller

Route::group(['prefix'=>'seller'], function(){

Route::get('/internal_register', [SellerController::class,'register']);
Route::post('/internal_register',[SellerController::class,'save'])->name('seller_register');

});



//admin
Route::group(['prefix'=>'admin'], function(){

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'checkLogin'])->name('login');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

});