<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{

    public function register(){

        return view('seller.register');
    }

    public function save(Request $request){

        $seller = new Seller();

        $image = $request->file('image_path');
        $destinationPath = public_path('image/sellers'); 
        $profileImage = time() . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);

        $seller->name = $request->name;
        $seller->referral_code = $request->referral_code;
        $seller->image = "image/sellers/".$profileImage;

        $seller->save();

        echo '<h1><center>Seller Registered Successfully</center><h1>';
        exit();

    }
}
