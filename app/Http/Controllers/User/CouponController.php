<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Coupon;
use App\Models\Coupon_approval;
use Illuminate\Http\Request;

class CouponController extends Controller
{

    public function verify($mobile)
    {

        $user = User::where('mobile',$mobile) -> first();

        if(!$user){
            echo '<h1>User Not Found</h1>';
        }
        else{
            $userId = $user->id;

            return view('user.coupon_verify', compact('userId'));

        }

    }

    public function checkVerify(Request $request)
    {

        $couponSerial = $request->coupon_serial;
        $couponCode = $request->coupon_code;
        $userId = $request->userId;

        $coupon = Coupon::where('coupon_serial',$couponSerial)->first();

        if(!$coupon){

            echo '<h1>Coupon Serial Does Not Match</h1>';
        }
        else{
            $couponId = $coupon->id;
            $coupon_approval = Coupon_approval::where('coupon_id',$couponId)->where('coupon_code',$couponCode)->first();

            if($coupon_approval){

                echo '<h1>Sorry !! Coupon is Already Used</h1>';

            }
            else{

                $user = User::where('id', $userId)->first();
                $userMobile  = $user->mobile;

                $coupon_approval = new Coupon_approval();
                $coupon_approval->user_id = $userId;
                $coupon_approval->coupon_id = $couponId;
                $coupon_approval->coupon_code = $couponCode;
                $coupon_approval->save();

                $message = "hlw, munem . Your Coupon Verification is Completed. Coupon Serial: $couponSerial and Code: $couponCode";

                $ch = curl_init("https://sms.one9.one/sms/api?action=send-sms&api_key=c3dpbmdiZDpGdW5ueS45MDkw&to=".$userMobile."&from=swingbd&sms=".$message);

                curl_exec($ch);
                curl_close($ch);

                return redirect()->route('coupon_verified');
            }
        }

        exit();

    }

    public function coupon_verified()
    {
        return view('user.coupon_verified');
    }

}
