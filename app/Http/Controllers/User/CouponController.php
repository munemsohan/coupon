<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Coupon;
use App\Models\Coupon_code;
use App\Models\Coupon_approval;
use Illuminate\Http\Request;

class CouponController extends Controller
{

    public function verify()
    {
        return view('user.coupon_verify');
    }

    public function checkVerify(Request $request)
    {

        $couponSerial = $request->coupon_serial;
        $couponCode = $request->coupon_code;
        $mobile = $request->mobile;

        $user = User::where('mobile',$mobile) -> first();
        $userId = $user->id;

        if(!$user){
            echo '<h1>User Not Found</h1>';
        }
        elseif ($user->is_paid == 0) {
            echo '<h1>You are not a Paid User</h1>';
        }
        else{

            $coupon = Coupon::where('coupon_serial',$couponSerial)->first();

            if(!$coupon){

                echo '<h1>Coupon Serial Does Not Match</h1>';
            }
            else{

                $coupon_code = Coupon_code::where('name', 'like' ,$couponCode)->first();

                if(!$coupon_code){

                    echo 'Coupon Not Matched';
                }
                else{

                    $allCouponCodes = $coupon->coupon_code;
                    $couponArray = explode(',', $allCouponCodes);

                    $key = array_search($coupon_code->id, $couponArray);

                    if($key){

                        // unset($couponArray[$key]);

                        // $allCouponCodes = implode(',',$couponArray);
                        // $coupon->coupon_code = $allCouponCodes;
                        // $coupon->save();

                        $couponId = $coupon->id;
                        $couponCodeID = $coupon_code->id;

                        $user = User::where('id', $userId)->first();
                        $userMobile  = $user->mobile;
                        $verify_code = rand(1000 , 9999);

                        $coupon_approval = new Coupon_approval();
                        $coupon_approval->user_id = $userId;
                        $coupon_approval->coupon_id = $couponId;
                        $coupon_approval->coupon_code = $couponCodeID;
                        $coupon_approval->verify_code = $verify_code;
                        $coupon_approval->save();

                        $message = "Coupon Verification Code is: ".$verify_code;

                        $ch = curl_init("https://sms.one9.one/sms/api?action=send-sms&api_key=c3dpbmdiZDpGdW5ueS45MDkw&to=".$userMobile."&from=swingbd&sms=".$message);

                        curl_setopt($ch, CURLOPT_NOBODY,1);
                        curl_exec($ch);
                        curl_close($ch);

                        return view('user.verify_code', compact('userId', 'couponId', 'couponCodeID'));
                    }
                    else{

                        echo '<h1>Coupon Doesnt Exist</h1>';
                    }
                }
                
                
            }
        }

        exit();

    }

    public function verify_code(Request $request)
    {

        $coupon_approval = Coupon_approval::where('user_id',$request->user_id)->where('coupon_id',$request->coupon_id)->where('coupon_code',$request->coupon_code)->where('verify_code',$request->verify_code)->first();


        if($coupon_approval){

            $coupon = Coupon::where('id',$request->coupon_id)->first();

            $allCouponCodes = $coupon->coupon_code;
            $couponArray = explode(',', $allCouponCodes);
            $key = array_search($request->coupon_code, $couponArray);
            unset($couponArray[$key]);
            $allCouponCodes = implode(',',$couponArray);
            $coupon->coupon_code = $allCouponCodes;
            $coupon->save();

            $coupon_approval->delete();

            $coupon_code = Coupon_code::where('id',$request->coupon_code)->first();

            $message = "Hello: ".$coupon_code->res_name." ! ".$coupon_code->desc;

            $ch = curl_init("https://sms.one9.one/sms/api?action=send-sms&api_key=c3dpbmdiZDpGdW5ueS45MDkw&to=".$coupon_code->res_mobile."&from=swingbd&sms=".$message);

            curl_setopt($ch, CURLOPT_NOBODY,1);
            curl_exec($ch);
            curl_close($ch);

            return redirect()->route('coupon_verified');

        }
        else{

            $coupon_approval = Coupon_approval::where('user_id',$request->user_id)->where('coupon_id',$request->coupon_id)->where('coupon_code',$request->coupon_code)->first();

            $coupon_approval->delete();

            echo '<h1>Invalid Verification Code, Try Again !!</h1>';

        }

        exit();
    }

    public function coupon_verified()
    {
        return view('user.coupon_verified');
    }

}
