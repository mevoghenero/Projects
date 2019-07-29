<?php

namespace App\Http\Controllers;

use App\Organisation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrganisationController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
		
	}

	public function index()
	{
		$this->admin();

		$orgs  = Organisation::all()->sortByDesc('created_at');
		return view('organisations.index', compact('orgs'));
	}

	public function create()
	{
		$this->admin();
		
		return view('organisations.create');
	}

	public function store(Request $request)
	{
		$this->admin();

		Validator::make($request->all(), [
			'name' 		=> 'required|string|max:250',
			'email' 	=> 'required|string|unique:organisations',
			'phone_no'  => 'required|string|max:14',
			'subdomain' => 'required|string|max:250'
		])->validate();

		$url = '.clienex.com';
		$domain = $request->subdomain.$url;

		$org = new Organisation;
		$org->name 		  = $request->name;
		$org->email 	  = $request->email;
		$org->phone_no 	  = $request->phone_no;
		$org->subdomain   = $domain;
		$org->reg_number  = $request->reg_number;
		//dd($org);
		$org->save();

		return redirect(route('org.index'))->with('success', 'Organisation Has Been Created!!');
	}

	public function edit($id)
	{
		$this->admin();

		$orgs = Organisation::find($id);
		return view('organisations.update', compact('orgs'));
	}

	public function update(Request $request, $id)
	{
		$this->admin();

		Validator::make($request->all(), [
			'name' 		=> 'required|string|max:250',
			'email' 	=> 'required|string',
			'phone_no'  => 'required|string|max:14',
			

		])->validate();

		$org = Organisation::find($request->orgid);
		$org->name 		  = $request->name;
		$org->email 	  = $request->email;
		$org->phone_no 	  = $request->phone_no;
		$org->reg_number  = $request->reg_number;
		$org->subdomain   = $request->subdomain;
		
		$org->save();

		return back()->with('success', 'Organisation Has Been Updated!!');
	}

	public function delete($id)
	{
		Organisation::find($id)->delete();
		return back();
	}

	protected function admin()
	{
		$this->authorize('admin', auth()->user());
	}
}