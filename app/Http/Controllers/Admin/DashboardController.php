<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    public function index(){

        $sellers = Seller::paginate(10);
        return view('admin.dashboard', compact('sellers'));
    }
}
