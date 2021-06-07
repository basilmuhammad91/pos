<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Auth;

class MainController extends Controller
{

	// public function __construct()
 //    {
 //        $this->middleware('guest')->except('logout');
 //    }

	// public function __construct()
 //    {
 //        $this->middleware('auth');
 //    }

    public function dashboard()
    {
        $customer = Customer::where('user_id', Auth::User()->id)
            ->where('is_deleted','No')
            ->orderBy('customer_id')
            ->get();
        $total_customer = $customer->count();
    	return view('dashboard')
        ->with('total_customer',$total_customer)
        ;
    }

    public function login()
    {
        return view('layouts.login');
    }

    public function register()
    {
    	return view('layouts.register');
    }

}
