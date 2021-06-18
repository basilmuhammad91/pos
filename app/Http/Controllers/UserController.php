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
    public function index()
    {
    	$roles = Role::where('role_name','!=','Super Admin')
    	->get();

    	$users = DB::table('users')
    	->join('role_users','role_users.user_id','=','users.id')
    	->join('roles','roles.role_id','=','role_users.role_id')
    	->where('users.parent_id',Auth::user()->id)
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
			$user->image = $req->image->store('Users/Products','public');
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

}