<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\ProductSale;
use App\Models\Sale;
use Carbon\Carbon;
use DB;
use Auth;

class ReportController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function monthly_report()
    {
    	$users = DB::table('users')
        ->join('role_users','role_users.user_id','=','users.id')
        ->join('roles','roles.role_id','=','role_users.role_id')
        ->where('users.id', Auth::user()->id)
        ->first();

        $child_users = DB::table('users')
        ->where('users.parent_id', $users->parent_id)
        ->get();

    	$sale = Sale::whereMonth('date', Carbon::now()->month)
    	->where('user_id', Auth::User()->id)
    	->where('is_deleted', 'No')
    	->orderBy('sale_id','desc')
        ->orWhere('user_id', $users->parent_id)
        ->orWhere(function($query) use($child_users)
        {
            foreach ($child_users as $obj) {
                $query->orWhere('user_id','=', $obj->id);
                $query->whereMonth('date', Carbon::now()->month);
            }
        })
    	->get();

    	return view('reports.monthly_report')
    	->with('sale',$sale)
    	->with('status',"0");

    }

    public function weekly_report()
    {
    	$users = DB::table('users')
        ->join('role_users','role_users.user_id','=','users.id')
        ->join('roles','roles.role_id','=','role_users.role_id')
        ->where('users.id', Auth::user()->id)
        ->first();

        $child_users = DB::table('users')
        ->where('users.parent_id', $users->parent_id)
        ->get();
        
    	$sale = Sale::whereBetween('date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
    	->where('user_id', Auth::User()->id)
    	
    	->where('is_deleted', 'No')
    	->orderBy('sale_id','desc')
        ->orWhere('user_id', $users->parent_id)
        ->orWhere(function($query) use($child_users)
        {
            foreach ($child_users as $obj) {
                $query->orWhere('user_id','=', $obj->id);
                $query->whereBetween('date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
            }
        })
    	->get();

    	return view('reports.monthly_report')
    	->with('sale',$sale)
    	->with('status',"0");

    }
}