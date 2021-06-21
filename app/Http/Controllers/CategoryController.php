<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Auth;
use DB;

class CategoryController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('admin');

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
    	->where('is_deleted', 'No')
    	->orderBy('category_id','desc')

        ->orWhere(function($query) use($child_users)
        {
            foreach ($child_users as $obj) {
                $query->orWhere('user_id','=', $obj->id);
            }
        })

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
            ->where('is_deleted', 'No')
            ->orderBy('category_id','desc')

            ->orWhere(function($query) use($child_users)
            {
                foreach ($child_users as $obj) {
                    $query->orWhere('user_id','=', $obj->id);
                }
            })

            ->get();
            return view('categories.index')
            ->with('category',$category)
            ->with('status',"Submitted");
            ;
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
            ->where('is_deleted', 'No')
            ->orderBy('category_id','desc')

            ->orWhere(function($query) use($child_users)
            {
                foreach ($child_users as $obj) {
                    $query->orWhere('user_id','=', $obj->id);
                }
            })

            ->get();
            return view('categories.index')
            ->with('category',$category)
            ->with('status',"Updated");
            ;

    	}

    	$category = Category::where(["category_id"=>$req->category_id])->update([
    		"name" => $req->name
    	]);

    	if($category)
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
            ->where('is_deleted', 'No')
            ->orderBy('category_id','desc')

            ->orWhere(function($query) use($child_users)
            {
                foreach ($child_users as $obj) {
                    $query->orWhere('user_id','=', $obj->id);
                }
            })

            ->get();
            return view('categories.index')
            ->with('category',$category)
            ->with('status',"Updated");
            ;
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
