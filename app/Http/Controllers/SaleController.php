<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\ProductSale;
use App\Models\Category;
use App\Models\Product;
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
    	$sale = Sale::where('user_id', Auth::User()->id)
    	->where('is_deleted', 'No')
    	->orderBy('sale_id','desc')
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
    	$category = Category::where('user_id', Auth::User()->id)
    	->where('is_deleted', 'No')
    	->orderBy('category_id','desc')
    	->get();
    	return view('sales.pos_category')
    	->with('category',$category)
    	->with('status',"0")
    	;
    }

    public function pos(Request $req)
    {
    	$category = Category::where(["category_id"=>$req->category_id])->first();
        $all_category = Category::get();
    	return view('sales.pos')
    	->with('category', $category)
        ->with('all_category', $all_category)
    	->with('status', "0")
    	;
    }

    public function generate_sales(Request $req)
    {
        
        $product_id = $req->product_id;
        $quantity = $req->quantity;
        $price = $req->price;
        
        $sale = new Sale();
        $sale->total = $req->grand_total_input;
        $sale->is_deleted = "No";
        $sale->user_id = Auth::User()->id;
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
                    "stock_sold" =>$product_update->stock_available+$quantity[$key],
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

}

// $sale = Sale::where(["sale_id"=>$req->sale_id])->first();
//     	// $sale = Sale::get();
//     	// dd($sale->product_sale);
//   //   	$product_sale = DB::table('product_sales')
// 		// ->join('products','product_sales.product_id','=','products.product_id')
// 		// ->distinct()
// 		// ->get(['product_sales.product_id AS product_id', 'products.name as product_name', 'products.s_price'])
// 		// ;


//     	// return $product_sale;
//     	return view('sales.sale_detail')
//     	->with('sale', $sale)
//     	;
//     }