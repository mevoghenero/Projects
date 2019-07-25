<?php

namespace App\Http\Controllers;

use App\Outlet;
use App\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductTypeController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    
	public function index($id)
	{

		$outlet = Outlet::find($id);
		$types = ProductType::all()->sortByDesc('created_at');
		return view('product_types.index', compact('types', 'outlet'));
	}

	public function store(Request $request)
	{
		Validator::make($request->all(), [
			'name' => 'required|string|max:200'
		])->validate();

		$type = new ProductType;
		$type->outlet_id = $request->outlet_id;
		$type->name = $request->name;
		$type->save();

		return back()->with('success', 'Product Type Has Been Created!');
	}


	public function update(Request $request, $id)
	{
		Validator::make($request->all(), [
			'name' => 'required|string|max:200'
		])->validate();

		$type = ProductType::find($request->typeid);
		//dd($type);
		$type->update($request->all());

		return redirect()->back()->with('success', 'Product Type Has Been Updated!');
	}

	public function delete($id)
	{
		ProductType::find($id)->delete();
		return redirect()->back();
	}
}
