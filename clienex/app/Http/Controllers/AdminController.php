<?php

namespace App\Http\Controllers;

use App\Organisation;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function index()
	{
		$admins = User::all();
		//  $roles = Role::all();
		return view('manageAdmins.index', compact('admins'));
	}

	public function view()
	{
		$roles = Role::all();
		$orgs = Organisation::all();
		return view('manageAdmins.add', compact('roles', 'orgs'));
	}

	public function store(Request $request)
	{
		
		Validator::make($request->all(), [
			'first_name' => 'required|string|max:255',
			'last_name'  => 'required|string', 'max:255',
			'phone_no'   => 'required|max:15',
			'email' 	 => 'required|string|email|max:255|unique:users',
			'password' 	 => 'required|string|min:8|confirmed',
			'organisation_id' => 'required|string'
			
		])->validate();

		$admin = $request->only([
			'first_name', 'last_name', 'status', 'password', 'phone_no', 'email', 'organisation_id'
		]);
		if ($request->role) {
			$admin['status'] = 2;
		}
		$admin['password'] = bcrypt($admin['password']);

		//dd($admin);
		$admin = User::create($admin);

		$admin->roles()->sync($request->role);

		return redirect(route('company.index'))->with('success', 'User Has Been Added Successfully.');
	}

	public function edit($id)
	{
		$admins = User::find($id);
		$roles = Role::all();
		$orgs = Organisation::all();
		return view('manageAdmins.update', compact('admins', 'roles', 'orgs'));
	}

	public function update(Request $request, $id)
	{
		Validator::make($request->all(), [
			'first_name' => 'required|string|max:255',
			'last_name'  => 'required|string|max:255',
			'phone_no'   => 'required|max:15',
			'email' 	 => 'required|string|email|max:255|unique:users',
			'password' 	 => 'min:8|confirmed',
			'organisation_id' => 'required|string'
		]);

		$admin = User::find($id);
		$admin->organisation_id = $request->organisation_id;
		$admin->first_name = $request->first_name;
		$admin->last_name  = $request->last_name;
		$admin->phone_no   = $request->phone_no;
		$admin->email      = $request->email;

		if (trim(Input::get('password')) != '') {
			$admin->password = Hash::make(trim(Input::get('password')));
		}

		$admin->save();

		$admin->roles()->sync($request->role);

		return redirect(route('company.index'))->with('success', 'User Has Been Updated Successfully.');
	}

	public function delete($id)
	{
		User::find($id)->delete();
		return redirect()->back();
	}
}
