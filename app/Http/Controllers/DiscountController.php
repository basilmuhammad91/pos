<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discount;
use Auth;
use DB;

class DiscountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('manager');
    }
    
    public function index()
    {
         $users = DB::table('users')
        ->join('role_users','role_users.user_id','=','users.id')
        ->join('roles','roles.role_id','=','role_users.role_id')
        ->where('users.id', Auth::user()->id)
        ->first();

        $child_users = DB::table('users')
        ->where('users.parent_id', $users->parent_id)
        ->get();

    	$discount = Discount::where('user_id', Auth::User()->id)
        ->orWhere('user_id', $users->parent_id)
    	->where('is_deleted', 'No')
    	->orderBy('discount_id','desc')

        ->orWhere(function($query) use($child_users)
        {
            foreach ($child_users as $obj) {
                $query->orWhere('user_id','=', $obj->id);
            }
        })
        
    	->get();
    	return view('discounts.index')
    	->with('discount',$discount)
    	->with('status',"0");
    	;
    }
    
    public function submit(Request $req)
    {
         $users = DB::table('users')
        ->join('role_users','role_users.user_id','=','users.id')
        ->join('roles','roles.role_id','=','role_users.role_id')
        ->where('users.id', Auth::user()->id)
        ->first();

        $child_users = DB::table('users')
        ->where('users.parent_id', $users->parent_id)
        ->get();
        
        $discount2 = Discount::where('user_id', Auth::User()->id)
        ->where('is_deleted', 'No')
        ->orderBy('discount_id')
        ->orWhere('user_id', $users->parent_id)
        ->orWhere(function($query) use($child_users)
        {
            foreach ($child_users as $obj) {
                $query->orWhere('user_id','=', $obj->id);
            }
        })
        ->get();
        
        foreach($discount2 as $obj)
        {
            if($obj->name == $req->name)
            {
                return redirect()->back();
            }
        }
        
    	$discount = new Discount();
    	$discount->name = $req->name;
    	$discount->percent = $req->percent;
    	$discount->status = $req->status;
    	$discount->is_deleted = "No";
    	$discount->user_id = Auth::User()->id;

		if($discount->save())
		{
            $discount = Discount::where('user_id', Auth::User()->id)
            ->where('is_deleted', 'No')
            ->orderBy('discount_id')
            ->orWhere('user_id', $users->parent_id)
            ->orWhere(function($query) use($child_users)
            {
                foreach ($child_users as $obj) {
                    $query->orWhere('user_id','=', $obj->id);
                }
            })
            ->get();
	    	return view('discounts.index')
	    	->with('discount',$discount)
	    	->with('status',"Submitted");
		}
    }
    
    public function update(Request $req)
    {
         $users = DB::table('users')
        ->join('role_users','role_users.user_id','=','users.id')
        ->join('roles','roles.role_id','=','role_users.role_id')
        ->where('users.id', Auth::user()->id)
        ->first();

        $child_users = DB::table('users')
        ->where('users.parent_id', $users->parent_id)
        ->get();

        $discount2 = Discount::where('user_id', Auth::User()->id)
        ->where('is_deleted', 'No')
        ->orderBy('discount_id')
        ->orWhere('user_id', $users->parent_id)
        ->orWhere(function($query) use($child_users)
        {
            foreach ($child_users as $obj) {
                $query->orWhere('user_id','=', $obj->id);
            }
        })
        ->get();

        foreach($discount2 as $obj)
        {
            if($obj->name == $req->name)
            {
                return redirect()->back();
            }
        }

    	$discount = Discount::where(["discount_id"=>$req->discount_id])->update([
    		"name" => $req->name,
    		"percent" => $req->percent,
    		"status" => $req->status
    	]);

    	if($discount)
    	{
    		$discount = Discount::where('user_id', Auth::User()->id)
	    	->where('is_deleted', 'No')
	    	->orderBy('discount_id')
            ->orWhere('user_id', $users->parent_id)
            ->orWhere(function($query) use($child_users)
            {
                foreach ($child_users as $obj) {
                    $query->orWhere('user_id','=', $obj->id);
                }
            })
	    	->get();
	    	return view('discounts.index')
	    	->with('discount',$discount)
	    	->with('status',"Updated");
    	}
    }

    public function delete(Request $req)
    {
    	// $discount = Discount::where(["discount_id"=>$req->discount_id])->update([
    	// 	"is_deleted" => "Yes"
    	// ]);

        $discount = Discount::where(["discount_id"=>$req->discount_id])->delete();
        
    	if($discount)
    	{
			return redirect()->action('DiscountController@index');
    	}

    }
}
