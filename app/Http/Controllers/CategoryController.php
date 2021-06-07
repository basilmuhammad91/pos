<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Auth;

class CategoryController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$category = Category::where('user_id', Auth::User()->id)
    	->where('is_deleted', 'No')
    	->orderBy('category_id','desc')
    	->get();
    	return view('categories.index')
    	->with('category',$category)
    	->with('status',"0");
    	;
    }

    public function submit(Request $req)
    {
    	$category = new Category();
    	$category->name = $req->name;
    	$category->is_deleted = "No";
    	$category->user_id = Auth::User()->id;

    	if($req->image)
		{
			$category->image = $req->image->store('Images/Categories','public');
		}

		if($category->save())
		{
			$category = Category::where('user_id', Auth::User()->id)
	    	->where('is_deleted', 'No')
	    	->orderBy('category_id')
	    	->get();
	    	return view('categories.index')
	    	->with('category',$category)
	    	->with('status',"Submitted");
		}
    }

    public function update(Request $req)
    {
    	if($req->image)
    	{
    		Category::where(["category_id"=>$req->category_id])->update([
    			"image" => $req->image->store('Images/Categories','public'),
    			"name" => $req->name,
    		]);

    		$category = Category::where('user_id', Auth::User()->id)
	    	->where('is_deleted', 'No')
	    	->orderBy('category_id')
	    	->get();
	    	return view('categories.index')
	    	->with('category',$category)
	    	->with('status',"Updated");

    	}

    	$category = Category::where(["category_id"=>$req->category_id])->update([
    		"name" => $req->name
    	]);

    	if($category)
    	{
    		$category = Category::where('user_id', Auth::User()->id)
	    	->where('is_deleted', 'No')
	    	->orderBy('category_id')
	    	->get();
	    	return view('categories.index')
	    	->with('category',$category)
	    	->with('status',"Updated");
    	}
    }

    public function delete(Request $req)
    {
    	$category = Category::where(["category_id"=>$req->category_id])->update([
    		"is_deleted" => "Yes"
    	]);

    	if($category)
    	{
			return redirect()->action('CategoryController@index');
    	}

    }

}
