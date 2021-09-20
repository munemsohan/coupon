<?php

namespace App\Http\Controllers;

use App\Models\Seller;

use Illuminate\Http\Request;
use Sentinel;

class RegisterController extends Controller
{
    public function index(){

        return view('user.register');
    }

    public function store(Request $request){

        $referral = $request->referral;
        $seller = Seller::where('referral_code', $referral )->first();

        if($seller){
            $sellerId = $seller->id;

            $image = $request->file('image_path');
            $destinationPath = public_path('image/users'); 
            $profileImage = time() . "-". $request->mobile. "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);

            $user = array(
                'name' => $request->name,
                'mobile' => $request->mobile,
                'email' => $request->email,
                'referral' => $sellerId,
                'password' => $request->password,
                'image' => "image/users/".$profileImage,
            );

            if(Sentinel::registerAndActivate($user)){

                $seller->coupon_count = $seller->coupon_count + 1;
                $seller->total_amount = $seller->total_amount + 500;
                $seller->total_commission = $seller->total_commission + 90;

                $seller->save();

                echo "<center><h1>You Are Registered Successfully !!</h1></center>";
            }
            else{

                echo "<center><h1>Mobile Number is Already in Use.</h1></center>";

            }

        }
        else{
            echo "<center><h1>Referrel Code doesnt exist !</h1><br><br><a href='/register'>Back To Ragistration</a></center>";
            
        }

        exit();
    }
}
