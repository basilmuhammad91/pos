<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Storage;
use Auth;
use DB;

class CustomerController extends Controller
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

    	$customer = Customer::orWhere('user_id', Auth::User()->id)
        
        ->where('is_deleted','No')
    	->orderBy('customer_id', 'desc')
        ->orWhere('user_id', $users->parent_id)
        ->orWhere(function($query) use($child_users)
        {
            foreach ($child_users as $obj) {
                $query->orWhere('user_id','=', $obj->id);
                $query->where('is_deleted', '=', 'No');
            }
        })
        
    	->get();

    	return view('customers.index')
    	->with('customer',$customer)
    	->with('status',"0")
    	;

    }

    public function submit(Request $req)
    {

        $customer2 = Customer::where('user_id', Auth::user()->id)
        ->where('is_deleted','No')
        ->get();
        
        foreach ($customer2 as $obj) {
            if($obj->name == $req->name)
            {
                return redirect()->back();
            }
        }
        
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
			$users = DB::table('users')
            ->join('role_users','role_users.user_id','=','users.id')
            ->join('roles','roles.role_id','=','role_users.role_id')
            ->where('users.id', Auth::user()->id)
            ->first();

            $child_users = DB::table('users')
            ->where('users.parent_id', $users->parent_id)
            ->get();

            $customer = Customer::orWhere('user_id', Auth::User()->id)
            ->orWhere('user_id', $users->parent_id)
            ->where('is_deleted','No')
            ->orderBy('customer_id', 'desc')

            ->orWhere(function($query) use($child_users)
            {
                foreach ($child_users as $obj) {
                    $query->orWhere('user_id','=', $obj->id);
                }
            })
            
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

    		$users = DB::table('users')
            ->join('role_users','role_users.user_id','=','users.id')
            ->join('roles','roles.role_id','=','role_users.role_id')
            ->where('users.id', Auth::user()->id)
            ->first();

            $child_users = DB::table('users')
            ->where('users.parent_id', $users->parent_id)
            ->get();

            $customer = Customer::orWhere('user_id', Auth::User()->id)
            ->orWhere('user_id', $users->parent_id)
            ->where('is_deleted','No')
            ->orderBy('customer_id', 'desc')

            ->orWhere(function($query) use($child_users)
            {
                foreach ($child_users as $obj) {
                    $query->orWhere('user_id','=', $obj->id);
                }
            })

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
    		$users = DB::table('users')
            ->join('role_users','role_users.user_id','=','users.id')
            ->join('roles','roles.role_id','=','role_users.role_id')
            ->where('users.id', Auth::user()->id)
            ->first();

            $child_users = DB::table('users')
            ->where('users.parent_id', $users->parent_id)
            ->get();

            $customer = Customer::orWhere('user_id', Auth::User()->id)
            ->orWhere('user_id', $users->parent_id)
            ->where('is_deleted','No')
            ->orderBy('customer_id', 'desc')

            ->orWhere(function($query) use($child_users)
            {
                foreach ($child_users as $obj) {
                    $query->orWhere('user_id','=', $obj->id);
                }
            })

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
