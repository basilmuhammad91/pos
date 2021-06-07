<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\ProductSale;
use App\Models\Category;
use App\Models\Products;
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
    	return view('sales.pos')
    	->with('category', $category)
    	->with('status', "0")
    	;
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