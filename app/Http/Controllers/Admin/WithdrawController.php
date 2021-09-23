<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    
    public function withdraw($id){

        $seller = Seller::where('id', $id)->first();

        $seller->total_commission = 0;

        $seller->save();

        echo 'Withdrw Successful !';

        exit();

    }
}
