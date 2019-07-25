<?php

namespace App\Http\Controllers;

use App\Organisation;
use App\Outlet;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
		
	}

	public function index()
	{
		$this->superAdmin();

		$users = User::where('admin_id', Auth::id())->get()->sortByDesc('created_at');
		$roles   = Role::all()->except(['517c43667db388101e00000f']);
		$orgs  = Organisation::all();
		$outlets = Outlet::all();
		return view('organUsers.index', compact('users', 'orgs', 'outlets', 'roles'));
	}

	public function status()
	{
		$this->superAdmin();

		$users   = User::where('admin_id', Auth::id())->get()->sortByDesc('created_at');
		$orgs  	 = Organisation::all();
		$outlets = Outlet::all();
		return view('organUsers.status', compact('users', 'orgs', 'outlets'));
	}

	public function updateStatus(Request $request, $id)
	{
		$this->superAdmin();

		$status = User::find($id);
		if ($request->status == 3) {
			$status->status = $request->status;
		} elseif ($request->status == 0) {
			$status->status = $request->status;
		}
		
		//dd($request->all());
		$status->save();
		return back();
	}

	// public function create()
	// {
	// 	$roles = Role::all();
	// 	$orgs = Organisation::all();
	// 	$outlets = Outlet::all();
	// 	$users = User::all();
	// 	return view('organUsers.create', compact('roles', 'orgs', 'outlets', 'users'));
	// }

	public function store(Request $request)
	{
		$this->superAdmin();

		Validator::make($request->all(), [
			'first_name' 		=> 'required|string|max:255',
			'last_name'  		=> 'required|string', 'max:255',
			'outlet_id'  		=>  'required',
			'phone'   			=> 'required|max:15',
			'role'     			=> 'required',
			'email' 	 		=> 'required|string|email|max:255|unique:users',
			'password' 	 		=> 'required|string|min:8|confirmed',

		])->validate();
		

		$user = $request->only([
			'first_name', 'last_name', 'password', 'phone', 'email',  'outlet_id', 'admin_id', 'status'
		]);

		//dd($users->name);
		foreach ($request->role as $role) {
			$status = Role::find($role);
			if ($status->name == 'Pharmacist') {
				$user['status'] = 3;
			} elseif ($status->name == 'Sales Person') {
				$user['status'] = 4;
			}
		}
		
		$user['admin_id'] = auth()->user()->_id;
		$user['password'] = bcrypt($user['password']);

		//dd($request->all());
		$user = User::create($user);

		$user->roles()->sync($request->role);

		return redirect(route('user.index'))->with('success', 'User Has Been Added Successfully.');
	}

	// public function edit($id)
	// {
	// 	$roles   = Role::all();
	// 	$users   = User::find($id);
	// 	$outlets = Outlet::all();
	// 	$orgs    = Organisation::all();
	// 	return view('organUsers.update', compact('roles', 'orgs', 'outlets', 'users'));
	// }

	public function update(Request $request, $id)
	{
		$this->superAdmin();

		Validator::make($request->all(), [
			'first_name' 		=> 'required|string|max:255',
			'last_name'  		=> 'required|string', 'max:255',
			'outlet_id'  		=>  'required',
			'phone'   			=> 'required|max:15',
			'role'     			=> 'required',
			'email' 	 		=> 'required|string|email|max:255|unique:users',
			'password' 	 		=> 'required|string|min:8|confirmed',
		]);

		$user = User::find($id);
		$user->first_name = $request->first_name;
		$user->last_name  = $request->last_name;
		$user->phone  = $request->phone;
		$user->email      = $request->email;
		$user->outlet_id   = $request->outlet_id;
		$user->role  = $request->role;



		if (trim(Input::get('password')) != '') {
			$user->password = Hash::make(trim(Input::get('password')));
		}

		$user->save();

		$user->roles()->sync($request->role);

		return redirect(route('user.index'))->with('success', 'User Has Been Updated Successfully.');
	}

	public function delete($id)
	{
		User::find($id)->delete();
		return back();
	}


	protected function superAdmin()
	{
		$this->authorize('manager', auth()->user());
	}
}
