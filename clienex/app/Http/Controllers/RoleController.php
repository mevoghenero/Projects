<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    
	public function index()
	{
		$roles = Role::all();
		return view('roles.index', compact('roles'));
	}

	public function store(Request $request)
	{
		//dd($request->all());
		$this->validate($request, [
			'name' => 'required',
			'description' => 'required|max:350'
		]);

		$role = new Role;
		$role->name = $request->name;
		$role->description = $request->description;
		$role->save();

		return redirect(route('role.index'))->with('success', 'Role Has Been Added Successfully.');
	}

	public function update(Request $request, $id)
	{
		$roles = Role::find($request->roleid);
		$roles->name = $request->name;
		$roles->description = $request->description;
		$roles->save();

		return back()->with('success', 'Role Has Been Updated Successfully.');
	}

	public function delete($id)
	{
		Role::find($id)->delete();
		return back();
	}
}
