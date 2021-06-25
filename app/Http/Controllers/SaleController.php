<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\ProductSale;
use App\Models\Category;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Discount;
use DB;
use Auth;

class SaleController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
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

    	$sale = Sale::where('user_id', Auth::User()->id)
    	->where('is_deleted', 'No')
    	->orderBy('sale_id','desc')
        ->orderBy('sale_id','desc')
        ->orWhere('user_id', $users->parent_id)
        ->orWhere(function($query) use($child_users)
        {
            foreach ($child_users as $obj) {
                $query->orWhere('user_id','=', $obj->id);
            }
        })
        
    	->get();
    	return view('sales.index')
    	->with('sale',$sale)
    	->with('status',"0");
    	;
    }

    public function sale_detail(Request $req)
    {
    	$sale = Sale::where(["sale_id"=>$req->sale_id])->first();
    	// $sale = Sale::get();
    	// dd($sale->product_sale);
    	return view('sales.sale_detail')
    	->with('sale', $sale)
    	;
    }

    public function pos_category()
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
    	->where('is_deleted', 'No')
    	->orderBy('category_id','desc')

        ->orWhere('user_id', $users->parent_id)
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

    	return view('sales.pos_category')
    	->with('category',$category)
    	->with('status',"0")
    	;
    }
    
    public function pos(Request $req)
    {
        $users = DB::table('users')
            ->join('role_users','role_users.user_id','=','users.id')
            ->join('roles','roles.role_id','=','role_users.role_id')
            ->where('users.id', Auth::user()->id)
            ->first();

            $child_users = DB::table('users')
            ->where('users.parent_id', $users->parent_id)
            ->get();

        $category = Category::where(["category_id"=>$req->category_id])->first();
        $all_category = Category::where('user_id', Auth::User()->id)
        ->orWhere('user_id', $users->parent_id)
        ->where('is_deleted','No')

        ->orWhere(function($query) use($child_users)
        {
            foreach ($child_users as $obj) {
                $query->orWhere('user_id','=', $obj->id);
            }
        })

        ->get();

        $customers = Customer::orWhere('user_id', Auth::User()->id)
        
        ->where('is_deleted','No')
        ->orderBy('customer_id', 'desc')
        ->orWhere('user_id', $users->parent_id)
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

        if($req->category_id == 0)
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

            $products = Product::where('user_id', Auth::User()->id)
            ->orWhere('user_id', $users->parent_id)
            ->where('is_deleted','No')
            ->orderBy('product_id')
            ->orWhere(function($query) use($child_users)
            {
                foreach ($child_users as $obj) {
                    $query->orWhere('user_id','=', $obj->id);
                }
            })
            ->paginate(12);

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
            return view('sales.pos_all')
            ->with('category', $category)
            ->with('all_category', $all_category)
            ->with('products', $products)
            ->with('customers', $customers)
            ->with('discount',$discount)
            ->with('status', '0')
            ;
        }

    	return view('sales.pos')
    	->with('category', $category)
        ->with('all_category', $all_category)
        ->with('customers', $customers)
        ->with('discount',$discount)
        ->with('status', '0')
    	;
        
    }

    public function generate_sales(Request $req)
    {
        
        $product_id = $req->product_id;
        $quantity = $req->quantity;
        $price = $req->price;
        
        $sale = new Sale();
        $sale->total = $req->grand_total_input;
        $sale->paid = $req->paid;
        $sale->is_deleted = "No";
        $sale->user_id = Auth::User()->id;
        $sale->customer_id = $req->customer_id;
        $sale->receiver_id = $req->receiver_id;
        $sale->status = "Completed";
        
        if($sale->save())
        {
            foreach ($product_id as $key => $value) {
                $product_sale = new ProductSale();
                $product_sale->sale_id = $sale->sale_id;
                $product_sale->product_id = $value;
                $product_sale->quantity = $quantity[$key];
                $product_sale->price = $price[$key];
                $product_sale->save();

                $product_update = Product::where('product_id',$value)->first();
                $product = Product::where('product_id',$value)->update([
                    "stock" => $product_update->stock-$quantity[$key],
                    "stock_sold" =>$product_update->stock_sold+$quantity[$key],
                ]);
            }
            
            foreach ($product_id as $key => $value) {
                $product = Product::where('product_id',$value)->first();
                if($product->stock <= 0)
                {
                    $product = Product::where('product_id',$value)->update([
                        "status" => "Inactive"
                    ]);
                }
            }
        }
        
        return redirect()->back();
        
    }

    public function search_products(Request $req)
    {
        // $products = Product::where('name', 'like', '%' . $req->get('search_text') . '%' )->get();
        // return json_encode($products);
        return json_encode('value');
    }

}