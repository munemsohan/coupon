<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\WithdrawController;
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
Route::get('/login', [UserLoginController::class, 'index']);
Route::post('/dashboard', [UserLoginController::class, 'dashboard']);
Route::get('/logout', [UserLoginController::class, 'logout']);
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

Route::get('/', [AdminLoginController::class, 'index']);
Route::post('/login', [AdminLoginController::class, 'checkLogin'])->name('login');
Route::get('/logout', [AdminLoginController::class, 'logout']);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/withdraw/{id}', [WithdrawController::class, 'withdraw'])->name('withdraw');

Route::get('/seller_edit/{id}', [AdminController::class, 'seller_edit']);
Route::post('/seller_edit', [AdminController::class, 'seller_edit_save']);
Route::get('/seller_delete/{id}', [AdminController::class, 'seller_delete']);

Route::get('/coupons', [AdminController::class, 'coupons'])->name('coupons');
Route::get('/add_coupons', [AdminController::class, 'add_coupons']);
Route::post('/add_coupons', [AdminController::class, 'add_new_coupons']);
Route::get('/coupons_edit/{id}', [AdminController::class, 'coupons_edit']);
Route::post('/coupons_edit', [AdminController::class, 'coupons_edit_save']);
Route::get('/coupons_delete/{id}', [AdminController::class, 'coupons_delete']);


Route::get('/coupon_codes', [AdminController::class, 'coupon_codes'])->name('coupon_codes');
Route::get('/add_coupon_codes', [AdminController::class, 'add_coupon_codes']);
Route::post('/add_coupon_codes', [AdminController::class, 'add_new_coupon_codes']);
Route::get('/coupon_codes_edit/{id}', [AdminController::class, 'coupon_codes_edit']);
Route::post('/coupon_codes_edit', [AdminController::class, 'coupon_codes_edit_save']);
Route::get('/coupon_codes_delete/{id}', [AdminController::class, 'coupon_codes_delete']);

});