<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Sale;
use Auth;
use Carbon\Carbon;
use App\Models\ProductSale;
use DB;
use App\Models\Product;

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
        $users = DB::table('users')
        ->join('role_users','role_users.user_id','=','users.id')
        ->join('roles','roles.role_id','=','role_users.role_id')
        ->where('users.id', Auth::user()->id)
        ->first();

        $child_users = DB::table('users')
        ->where('users.parent_id', $users->parent_id)
        ->get();

        $total_products = Product::where('status', 'Active')
        ->where('is_deleted', "No")
        ->where('user_id', Auth::user()->id)
        ->orWhere('user_id', $users->parent_id)
        ->orWhere(function($query) use($child_users)
        {
            foreach ($child_users as $obj) {
                $query->orWhere('user_id','=', $obj->id);
            }
        })
        ->count();

        $total_today_sale = Sale::whereDate('date', Carbon::today())
        ->where('user_id', Auth::user()->id)
        ->orWhere('user_id', $users->parent_id)
        ->orWhere(function($query) use($child_users)
        {
            foreach ($child_users as $obj) {
                $query->orWhere('user_id','=', $obj->id);
            }
        })
        ->count();

        $customer = Customer::where('user_id', Auth::User()->id)
            ->where('is_deleted','No')
            ->orderBy('customer_id')
            ->get();
        $all_sale = Sale::where('is_deleted', 'No')
        ->where('user_id', Auth::user()->id)
        ->get();
        $total_customer = $customer->count();
        $total_sale = $all_sale->count();

        $total_profit = 0;

        $product_sale = DB::table('product_sales')
        ->join('sales', 'product_sales.sale_id','=','sales.sale_id')
        ->join('products', 'product_sales.product_id', '=', 'products.product_id')
        ->where('sales.user_id', Auth::user()->id)
        
        ->get();

        foreach ($product_sale as $obj) {
            $total_profit += ($obj->s_price-$obj->o_price)*$obj->quantity;
        }
        
    	return view('dashboard')
        ->with('total_customer',$total_customer)
        ->with('total_sale', $total_sale)
        ->with('total_profit', $total_profit)
        ->with('total_today_sale', $total_today_sale)
        ->with('total_products', $total_products)
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