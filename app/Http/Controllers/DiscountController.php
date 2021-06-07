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
    }

    public function index()
    {
    	$discount = Discount::where('user_id', Auth::User()->id)
    	->where('is_deleted', 'No')
    	->orderBy('discount_id','desc')
    	->get();
    	return view('discounts.index')
    	->with('discount',$discount)
    	->with('status',"0");
    	;
    }

    public function submit(Request $req)
    {

        $discount2 = Discount::where('user_id', Auth::User()->id)
        ->where('is_deleted', 'No')
        ->orderBy('discount_id')
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
            ->get();
	    	return view('discounts.index')
	    	->with('discount',$discount)
	    	->with('status',"Submitted");
		}
    }

    public function update(Request $req)
    {
        $discount2 = Discount::where('user_id', Auth::User()->id)
        ->where('is_deleted', 'No')
        ->orderBy('discount_id')
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
	    	->get();
	    	return view('discounts.index')
	    	->with('discount',$discount)
	    	->with('status',"Updated");
    	}
    }

    public function delete(Request $req)
    {
    	$discount = Discount::where(["discount_id"=>$req->discount_id])->update([
    		"is_deleted" => "Yes"
    	]);

    	if($discount)
    	{
			return redirect()->action('DiscountController@index');
    	}

    }
}
