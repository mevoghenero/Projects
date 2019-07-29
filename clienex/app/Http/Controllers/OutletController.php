<?php

namespace App\Http\Controllers;

use App\Organisation;
use App\Outlet;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OutletController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
		
	}

	public function index($id)
	{
		$this->superAdmin();

		$orgs = Organisation::find($id);
		$users = User::all();
		$outlets = Outlet::all()->sortByDesc('created_at');
		return view('outlets.index', compact('outlets', 'orgs', 'users'));
	}

	public function store(Request $request)
	{
		$this->superAdmin();

		Validator::make($request->all(), [
			'id' => 'required|string',
			'name' => 'required|string|max:250',
			'city' => 'required|string|max:200',
			'phone' => 'required|string|max:15',
			'state' => 'required|string|max:200',
			'address' => 'required|string|max:250',
		])->validate();

		
        // generate a pin based on 2 * 4 digits
		$pin = mt_rand(1000, 9999)
		. mt_rand(1000, 9999);

        // shuffle the result
		$account_no = str_shuffle($pin);

		$outlet = new Outlet;
		$outlet->city 		     = $request->city;
		$outlet->phone 		     = $request->phone;
		$outlet->state           = $request->state;
		$outlet->address 		 = $request->address;
		$outlet->branch_name 	 = $request->name;
		$outlet->account_no      = $account_no;
		$outlet->organisation_id = $request->id;
		//dd($outlet);
		
		$outlet->save();
		
		//$outlet->user()->sync($request->user);

		//dd(User::update('outlet_id') == [$outlet->id]);
		return back()->with('success', 'Outlet Has Been Created!!');
	}

	public function edit($id)
	{
		$this->superAdmin();

		$outlets = Outlet::find($id);
		$orgs = Organisation::all();
		return view('outlets.update', compact('outlets', 'orgs'));
	}

	public function update(Request $request, $id)
	{
		$this->superAdmin();
		
		Validator::make($request->all(), [
			'name' => 'required|string|max:250',
			'city' => 'required|string|max:200',
			'phone' => 'required|string|max:15',
			'state' => 'required|string|max:200',
			'address' => 'required|string|max:250',
		])->validate();

		$outlet = Outlet::find($request->id);
		$outlet->city 		     = $request->city;
		$outlet->phone 		     = $request->phone;
		$outlet->state           = $request->state;
		$outlet->address 		 = $request->address;
		$outlet->branch_name 	 = $request->name;
		//dd($outlet);
		$outlet->save();

		return back()->with('success', 'Outlet Has Been Updated!!');
	}

	public function delete($id)
	{
		Outlet::find($id)->delete();
		return redirect()->back();
	}

	protected function superAdmin()
	{
		$this->authorize('manager', auth()->user());
	}
}
