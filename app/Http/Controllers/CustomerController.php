<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Storage;
use Auth;

class CustomerController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$customer = Customer::where('user_id', Auth::User()->id)
    	->where('is_deleted','No')
    	->orderBy('customer_id')
    	->get();
    	return view('customers.index')
    	->with('customer',$customer)
    	->with('status',"0");
    	;
    }

    public function submit(Request $req)
    {
    	$customer = new Customer();
    	$customer->name = $req->name;
    	$customer->father_name = $req->father_name;
    	$customer->email = $req->email;
    	$customer->cnic = $req->cnic;
    	$customer->phone = $req->phone;
    	$customer->address = $req->address;
    	$customer->description = $req->description;
    	$customer->status = $req->status;
    	$customer->is_deleted = "No";
    	$customer->user_id = Auth::User()->id;

    	if($req->image)
		{
			$customer->image = $req->image->store('Images/Customers','public');
		}

		if($customer->save())
		{
			$customer = Customer::where('user_id', Auth::User()->id)
			->where('is_deleted','No')
			->orderBy('customer_id')
			->get();
			return view('customers.index')
			->with('customer',$customer)
			->with('status',"Submitted")
			;
		}
    }

    public function update(Request $req)
    {
    	if($req->image)
    	{
    		Customer::where(["customer_id"=>$req->customer_id])->update([
    			"image" => $req->image->store('Images/Customers','public'),
    			"name" => $req->name,
		    	"father_name" => $req->father_name,
		    	"email" => $req->email,
		    	"cnic" => $req->cnic,
		    	"phone" => $req->phone,
		    	"address" => $req->address,
		    	"description" => $req->description,
		    	"status" => $req->status
    		]);

    		$customer = Customer::where('user_id', Auth::User()->id)
			->where('is_deleted','No')
			->orderBy('customer_id')
			->get();
			return view('customers.index')
			->with('customer',$customer)
			->with('status',"Updated")
			;

    	}

    	$customer = Customer::where(["customer_id"=>$req->customer_id])->update([
    		"name" => $req->name,
	    	"father_name" => $req->father_name,
	    	"email" => $req->email,
	    	"cnic" => $req->cnic,
	    	"phone" => $req->phone,
	    	"address" => $req->address,
	    	"description" => $req->description,
	    	"status" => $req->status
    	]);

    	if($customer)
    	{
    		$customer = Customer::where('user_id', Auth::User()->id)
			->where('is_deleted','No')
			->orderBy('customer_id')
			->get();
			return view('customers.index')
			->with('customer',$customer)
			->with('status',"Updated")
			;
    	}
    }

    public function delete(Request $req)
    {
    	$customer = Customer::where(["customer_id"=>$req->customer_id])->update([
    		"is_deleted" => "Yes"
    	]);

    	if($customer)
    	{
			return redirect()->action('CustomerController@index');
    	}

    }

}
