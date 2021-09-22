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

        $seller->name = $request->name;
        $seller->referral_code = $request->referral_code;

        $seller->save();

        echo 'Seller Registered Successfully';
        exit();

    }
}
