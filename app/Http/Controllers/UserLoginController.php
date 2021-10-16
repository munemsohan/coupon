<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use url;
use Illuminate\Support\Facades\Session;

class UserLoginController extends Controller
{
    public function index(){

        return view('user.login');
    }

    public function dashboard(Request $request){

        if (Sentinel::authenticate($request->all())){

            $userId = Sentinel::getUser()->id;

            Session(['user_id' => $userId]);

            return view('user.dashboard');

            // echo Session::get('user_id');
        }
        else{

            return view('user.login');
        }
    }

    public function logout(){

        Sentinel::logout();
        Session::flush();

        return redirect()->to('login');

    }
}
