<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use App\Models\User;

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

            if($regUser = Sentinel::registerAndActivate($user)){

                $fields = array(
                    'client_id' => 'DHBm2R3GReOkxLy1eDk3YSaGkTS25n',
                    'client_secret' => 'f83LVPfkJHbQzTkXbntqt5iAYfusXjjOnrgqjYqB8gJaajXmAKYHNzYQ8ni8MXyN1funbZuy8IJomVevf3YroDJaqt3ImpgbKvOV',
                    'amount'  => '500',
                    'tran_id'  => rand ( 10000 , 99999 ),
                    'desc'  => $referral.'-'.$regUser->id,
                    'custom'  => '',
                    'payment_type' => 'bkash',
                    'currency'  => 'BDT',
                    'ip'  => $_SERVER['REMOTE_ADDR'],
                    'cus_name'  => $request->name,
                    'cus_email'  => $request->email,
                    'cus_add1'  => '',
                    'cus_add2'  => '',
                    'cus_city'  => '',
                    'cus_state'  => '',
                    'cus_postcode'  => '',
                    'cus_country'  => '',
                    'cus_phone'  => $request->mobile,
                    'cus_fax'  => '',
                    'ship_name'  => '',
                    'ship_add1'  => '',
                    'ship_add2'  => '',
                    'ship_city'  => '',
                    'ship_state'  => '',
                    'ship_postcode'  => '',
                    'ship_country'  => '',
                    'success_url'  => route('success'),
                    'notify_url' => route('notify'),
                    'cancel_url'  => route('cancel'),
                    'opt_a'  => '',
                    'opt_b'  => '',
                    'opt_c'  => '',
                    'opt_d'  => '',
                );

                $fields_string = '';
                foreach($fields as $key=>$value) { 
                    $fields_string .= $key.'='.$value.'&'; 
                }
                rtrim($fields_string, '&');

                $ch = curl_init( 'https://3pay.co/api/request' );
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                $response = curl_exec( $ch );
                $response=str_replace(PHP_EOL, '', $response);

                header( "Location: $response" );
                exit();
            }
        }
        else{
            echo "<center><h1>Referrel Code doesnt exist !</h1><br><br><a href='/register'>Back To Ragistration</a></center>";   
        }
        exit();
    }

    public function success_payment()
    {

        echo "<center><h1>Registration and Payment is successful !</h1></center>";

        exit();
    }

    public function cancel_payment()
    {
        echo 'Your Payment Has Been Cancelled';
        exit();
    }

    public function notify_payment()
    {
        $threepay_txnid = $_POST["threepay_txnid"];

        $data = file_get_contents("https://3pay.co/api/trxcheck?threepay_trxnid=" . $threepay_txnid . "&client_id=f83LVPfkJHbQzTkXbntqt5iAYfusXjjOnrgqjYqB8gJaajXmAKYHNzYQ8ni8MXyN1funbZuy8IJomVevf3YroDJaqt3ImpgbKvOV&type=json");

        if($data=="Merchant Not Matched"){
            echo "The transaction has been canceled";   
        }
        else{
            $desc = explode('-', $data['desc']);
            $userId = $desc[1];
            $referral = $desc[0];

            $user = User::find($userId);
            $user->is_paid = 1;
            $user->save();

            $seller = Seller::where('referral_code', $referral )->first();
            $seller->coupon_count = $seller->coupon_count + 1;
            $seller->total_amount = $seller->total_amount + 500;
            $seller->total_commission = $seller->total_commission + 90;
            $seller->save();

            echo "<center><h1>Registration and Payment is successful !</h1></center>";
        }
        exit();
    }
}
