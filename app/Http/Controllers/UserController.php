<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\RoleUser;
use Hash;
use Auth;
use DB;

class UserController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}

// ALL USERS VIEW FOR ADMINS
    public function index()
    {
    	$roles = Role::where('role_name','!=','Super Admin')
        ->where('role_name','!=', 'Admin')
    	->get();

    	$users = DB::table('users')
    	->join('role_users','role_users.user_id','=','users.id')
    	->join('roles','roles.role_id','=','role_users.role_id')
    	->where('users.parent_id',Auth::user()->id)
    	->where('users.id','!=',Auth::user()->id)
    	->get();

    	return view('users.index')
    	->with('users', $users)
    	->with('status', '0')
    	->with('roles', $roles)
    	;
        
    }

// WHEN ADMIN ADDING USERS
    public function submit(Request $req)
    {
    	$req->validate([
    		"email"=>'unique:users'
    	]);

    	$role = new Role();
    	$user = new User();
    	$user->name = $req->name;
    	$user->email = $req->email;
    	$user->password =  Hash::make($req->password);
    	$user->phone = $req->phone;
    	$user->status = $req->status;
    	$user->parent_id = Auth::user()->id;

    	if($req->image)
		{
			$user->image = $req->image->store('Images/Users','public');
		}

		if($user->save())
		{
			$role_user = new RoleUser();
    		$role_user->role_id = $req->role;
    		$role_user->user_id = $user->id;

    		if($role_user->save())
    		{
    			return redirect()->action('UserController@index');
    		}

		}
    }
    
    public function update(Request $req)
    {
    	if($req->image)
    	{
			$user = User::where(["id"=>$req->user_id])->update([
				"image" => $req->image->store('Images/Users','public'),
	    		"name" => $req->name,
	    		"email" => $req->email,
	    		"phone" => $req->phone,
	    		"status" => $req->status
	    	]);

	    	$role_users = RoleUser::where(["user_id"=>$req->user_id])->update([
	    		"role_id" => $req->role
	    	]);

			return redirect()->action('UserController@index');

    	}

    	$user = User::where(["id"=>$req->user_id])->update([
	    		"name" => $req->name,
	    		"email" => $req->email,
	    		"phone" => $req->phone,
	    		"status" => $req->status
	    	]);

    	$role_users = RoleUser::where(["user_id"=>$req->user_id])->update([
    		"role_id" => $req->role
    	]);
    	
    	return redirect()->action('UserController@index');

    }

    public function delete(Request $req)
    {
    	$role_users = RoleUser::where(["user_id"=>$req->id])->delete();
		$user = User::where(["id"=>$req->id])->delete();
    	if($user)
    	{
    		return redirect()->back();
    	}
    }

// VIEW ADMIN FOR SUPER ADMIN

	public function view_admin()
	{
		$users = DB::table('users')
		->join('role_users', 'role_users.user_id', '=', 'users.id')
		->join('roles', 'roles.role_id', '=' ,'role_users.role_id')
		->where('roles.role_name','Admin')
		->get();

		$roles = Role::where('role_name','!=','Super Admin')
		->where('role_name','!=','Admin')
    	->get();

    	return view('users.view_admin')
    	->with('users', $users)
    	->with('status', '0')
    	->with('roles', $roles)
    	;
	}    
    
	public function submit_admin(Request $req)
	{
		$req->validate([
    		"email"=>'unique:users'
    	]);

    	$role = new Role();
    	$user = new User();
    	$user->name = $req->name;
    	$user->email = $req->email;
    	$user->password =  Hash::make($req->password);
    	$user->phone = $req->phone;
    	$user->status = $req->status;
    	$user->parent_id = $user->id;

    	if($req->image)
		{
			$user->image = $req->image->store('Images/Users','public');
		}
        
		if($user->save())
		{
			$user_to_update = User::where('id', $user->id)->update([
				"parent_id" => $user->id
			]);

			$role_user = new RoleUser();
    		$role_user->role_id = "2";
    		$role_user->user_id = $user->id;

    		if($role_user->save())
    		{
    			return redirect()->action('UserController@view_admin');
    		}

		}
	}

	public function update_admin(Request $req)
	{

        $users = DB::table('users')
        ->join('role_users','role_users.user_id','=','users.id')
        ->join('roles','roles.role_id','=','role_users.role_id')
        ->where('users.id', $req->user_id)
        ->first();
        
        $child_users = DB::table('users')
        ->where('users.parent_id', $users->parent_id)
        ->get();

        if($req->status == 'Inactive')
        {
            for($i = 0; $i < $child_users->count(); $i++)
            {
                $user = User::where('id', $child_users[$i]->id)->update([
                    "status"=>"Inactive"
                ]);
            }
        }

        if($req->status == 'Active')
        {
            for($i = 0; $i < $child_users->count(); $i++)
            {
                $user = User::where('id', $child_users[$i]->id)->update([
                    "status"=>"Active"
                ]);
            }
        }

		if($req->image)
    	{
			$user = User::where(["id"=>$req->user_id])->update([
				"image" => $req->image->store('Images/Users','public'),
	    		"name" => $req->name,
	    		"email" => $req->email,
	    		"phone" => $req->phone,
	    		"status" => $req->status
	    	]);

	    	$role_users = RoleUser::where(["user_id"=>$req->user_id])->update([
	    		"role_id" => "2"
	    	]);

			return redirect()->action('UserController@view_admin');

    	}

    	$user = User::where(["id"=>$req->user_id])->update([
	    		"name" => $req->name,
	    		"email" => $req->email,
	    		"phone" => $req->phone,
	    		"status" => $req->status
	    	]);

    	$role_users = RoleUser::where(["user_id"=>$req->user_id])->update([
    		"role_id" => "2"
    	]);
    	
    	return redirect()->action('UserController@view_admin');
	}

}