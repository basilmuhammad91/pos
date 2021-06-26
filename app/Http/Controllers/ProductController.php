<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Discount;
use Illuminate\Support\Facades\Storage;
use Auth;
use DB;

class ProductController extends Controller
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

    	$category = Category::where('user_id', Auth::User()->id)
        ->orWhere('user_id', $users->parent_id)
    	->where('is_deleted','No')

        ->orWhere(function($query) use($child_users)
        {
            foreach ($child_users as $obj) {
                $query->orWhere('user_id','=', $obj->id);
            }
        })

    	->get();

    	$product = Product::where('user_id', Auth::User()->id)
        ->orWhere('user_id', $users->parent_id)
    	->where('is_deleted','No')
    	->orderBy('product_id', 'desc')
        ->orWhere(function($query) use($child_users)
        {
            foreach ($child_users as $obj) {
                $query->orWhere('user_id','=', $obj->id);
                $query->where('is_deleted', '=', 'No');
            }
        })
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

    	return view('products.index')
    	->with('product',$product)
    	->with('category',$category)
        ->with('discount',$discount)
    	->with('status',"0")
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

    	$product2 = Product::where('user_id', Auth::User()->id)
        ->orWhere('user_id', $users->parent_id)
        ->where('is_deleted','No')
        ->orderBy('product_id', 'desc')
        ->orWhere(function($query) use($child_users)
        {
            foreach ($child_users as $obj) {
                $query->orWhere('user_id','=', $obj->id);
                $query->where('is_deleted', '=', 'No');
            }
        })
        ->get();

    	foreach ($product2 as $obj) {
    		if($obj->name == $req->name && $obj->category_id == $req->category_id)
    		{
    			return redirect()->back();
    		}
    	}

    	$product = new Product();
    	$product->name = $req->name;
    	$product->category_id = $req->category_id;
    	$product->description = $req->description;
    	$product->model = $req->model;
    	$product->year = $req->year;
    	$product->is_featured = $req->is_featured;
    	$product->discount_id = $req->discount_id;
    	$product->stock = $req->stock;
    	$product->stock_sold = "0";
    	$product->o_price = $req->o_price;
    	$product->s_price = $req->s_price;
    	$product->is_deleted = "No";
    	$product->status = $req->status;
    	$product->user_id = Auth::User()->id;

    	if($req->image)
		{
			$product->image = $req->image->store('Images/Products','public');
		}

		if($product->save())
		{
            $users = DB::table('users')
            ->join('role_users','role_users.user_id','=','users.id')
            ->join('roles','roles.role_id','=','role_users.role_id')
            ->where('users.id', Auth::user()->id)
            ->first();

            $child_users = DB::table('users')
            ->where('users.parent_id', $users->parent_id)
            ->get();

			$category = Category::where('user_id', Auth::User()->id)
            ->orWhere('user_id', $users->parent_id)
	    	->where('is_deleted','No')
            ->orWhere(function($query) use($child_users)
            {
                foreach ($child_users as $obj) {
                    $query->orWhere('user_id','=', $obj->id);
                }
            })
	    	->get();
	    	$product = Product::where('user_id', Auth::User()->id)
            ->orWhere('user_id', $users->parent_id)
	    	->where('is_deleted','No')
	    	->orderBy('product_id')
            ->orWhere(function($query) use($child_users)
            {
                foreach ($child_users as $obj) {
                    $query->orWhere('user_id','=', $obj->id);
                }
            })
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

	    	return view('products.index')
	    	->with('product',$product)
	    	->with('category',$category)
            ->with('discount',$discount)
	    	->with('status',"Submitted")
	    	;
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

    	if($req->image)
    	{
    		$product = Product::where(["product_id"=>$req->product_id])->update([
	    		"image" => $req->image->store('Images/Products','public'),
	    		"name" => $req->name,
		    	"category_id" => $req->category_id,
		    	"description" => $req->description,
		    	"model" => $req->model,
		    	"year" => $req->year,
		    	"is_featured" => $req->is_featured,
		    	"discount_id" => $req->discount_id,
		    	"stock" => $req->stock,
		    	"o_price" => $req->o_price,
		    	"s_price" => $req->s_price,
		    	"status" => $req->status,
	    	]);
            
	    	$category = Category::where('user_id', Auth::User()->id)
            ->orWhere('user_id', $users->parent_id)
	    	->where('is_deleted','No')

            ->orWhere(function($query) use($child_users)
            {
                foreach ($child_users as $obj) {
                    $query->orWhere('user_id','=', $obj->id);
                }
            })
	    	->get();
	    	$product = Product::where('user_id', Auth::User()->id)
            ->orWhere('user_id', $users->parent_id)
	    	->where('is_deleted','No')
	    	->orderBy('product_id')
            
            ->orWhere(function($query) use($child_users)
            {
                foreach ($child_users as $obj) {
                    $query->orWhere('user_id','=', $obj->id);
                }
            })
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

	    	return view('products.index')
	    	->with('product',$product)
	    	->with('category',$category)
            ->with('discount',$discount)
	    	->with('status',"Updated")
	    	;
    	}
        
    	$product = Product::where(["product_id"=>$req->product_id])->update([
    		"name" => $req->name,
	    	"category_id" => $req->category_id,
	    	"description" => $req->description,
	    	"model" => $req->model,
	    	"year" => $req->year,
	    	"is_featured" => $req->is_featured,
	    	"discount_id" => $req->discount_id,
	    	"stock" => $req->stock,
	    	"o_price" => $req->o_price,
	    	"s_price" => $req->s_price,
	    	"status" => $req->status,
    	]);
        
    	if($product)
    	{
    		$category = Category::where('user_id', Auth::User()->id)
            ->orWhere('user_id', $users->parent_id)
	    	->where('is_deleted','No')
            ->orWhere(function($query) use($child_users)
            {
                foreach ($child_users as $obj) {
                    $query->orWhere('user_id','=', $obj->id);
                }
            })
	    	->get();
	    	$product = Product::where('user_id', Auth::User()->id)
            ->orWhere('user_id', $users->parent_id)
	    	->where('is_deleted','No')
	    	->orderBy('product_id')
            ->orWhere(function($query) use($child_users)
            {
                foreach ($child_users as $obj) {
                    $query->orWhere('user_id','=', $obj->id);
                }
            })
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

	    	return view('products.index')
	    	->with('product',$product)
	    	->with('category',$category)
            ->with('discount',$discount)
	    	->with('status',"Updated")
	    	;
    	}
        
    }
    
    
    public function delete(Request $req)
    {
        $product = Product::where(["product_id"=>$req->product_id])->delete();

    	// $product = Product::where(["product_id"=>$req->product_id])->update([
    	// 	"is_deleted" => "Yes"
    	// ]);

    	if($product)
    	{
			return redirect()->action('ProductController@index');
    	}
    }

}