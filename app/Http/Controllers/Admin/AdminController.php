<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seller;
use App\Models\Coupon;
use App\Models\Coupon_code;

class AdminController extends Controller
{

    public function seller_edit($id){

        $seller = Seller::where('id', $id)->first();

        return view('admin.seller_edit', compact('seller'));
    }

    public function seller_edit_save(Request $request){

        $seller = Seller::where('id', $request->id)->first();
        $seller->name = $request->name;
        $seller->referral_code = $request->referral_code;
        $seller->save();
        

        return redirect()->route('dashboard');
    }

    public function seller_delete($id){

        $seller = Seller::where('id', $id)->first();
        $seller->delete();

        return redirect()->route('dashboard');
    }

    public function coupons(){

        $coupons = Coupon::paginate(10);

        return view('admin.coupons', compact('coupons'));
    }

    public function add_coupons(){

        return view('admin.add_coupons');

    }

    public function add_new_coupons(Request $request){

        $coupon = new Coupon();
        $coupon->coupon_serial = $request->coupon_serial;
        $coupon->coupon_code = $request->coupon_code;
        $coupon->save();

        return redirect()->route('coupons');

    }

    public function coupons_edit($id){

        $coupons = Coupon::where('id', $id)->first();

        return view('admin.coupons_edit', compact('coupons'));
    }

    public function coupons_edit_save(Request $request){

        $coupon = Coupon::where('id', $request->id)->first();
        $coupon->coupon_serial = $request->coupon_serial;
        $coupon->coupon_code = $request->coupon_code;
        $coupon->save();

        return redirect()->route('coupons');
    }

    public function coupons_delete($id){

        $coupon = Coupon::where('id', $id)->first();
        $coupon->delete();

        return redirect()->route('coupons');
    }

    public function coupon_codes(){

        $coupon_codes = Coupon_code::paginate(10);
        return view('admin.coupon_codes', compact('coupon_codes'));
    }

    public function add_coupon_codes(){

        return view('admin.add_coupon_codes');

    }

    public function add_new_coupon_codes(Request $request){

        $coupon_code = new Coupon_code();
        $coupon_code->name = $request->name;
        $coupon_code->res_name = $request->res_name;
        $coupon_code->res_mobile = $request->res_mobile;
        $coupon_code->desc = $request->desc;
        $coupon_code->save();

        return redirect()->route('coupon_codes');
    }

    public function coupon_codes_edit($id){

        $coupon_codes = Coupon_code::where('id', $id)->first();

        return view('admin.coupon_codes_edit', compact('coupon_codes'));
    }

    public function coupon_codes_edit_save(Request $request){

        $coupon_code = Coupon_code::where('id', $request->id)->first();
        $coupon_code->name = $request->name;
        $coupon_code->res_name = $request->res_name;
        $coupon_code->res_mobile = $request->res_mobile;
        $coupon_code->desc = $request->desc;
        $coupon_code->save();

        return redirect()->route('coupon_codes');
    }

    public function coupon_codes_delete($id){

        $coupon_code = Coupon_code::where('id', $id)->first();
        $coupon_code->delete();

        return redirect()->route('coupon_codes');
    }

}
