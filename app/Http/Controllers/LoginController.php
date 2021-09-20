<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;

class LoginController extends Controller
{
    public function index(){

        return view('admin.login');
    }

    public function checkLogin(Request $request){

        if (Sentinel::authenticate($request->all())){

            return redirect()->route('dashboard');
        }
        else{

            return view('admin.login');
        }

        
    }
}
