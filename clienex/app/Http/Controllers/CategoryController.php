<?php

namespace App\Http\Controllers;

use App\Category;
use App\Outlet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function index($id)
	{
		$cats = Category::all();
		$outlet = Outlet::find($id);
		return view('categories.index', compact('cats', 'outlet'));
	}

	public  function store(Request $request)
	{
		Validator::make($request->all(), [
			'cat_name' => 'required|string|max:200'
		]);

		$cats = new Category;
		$cats->cat_name = $request->cat_name;
		$cats->outlet_id = $request->outlet_id;
		$cats->save();

		return redirect()->back()
		->with('success', 'Product Category Has Been Created!!');
	}

	public function update(Request $request)
	{
		//dd($request->all());
		Validator::make($request->all(), [
			'cat_name' => 'required|string|max:200'
		]);

		$cats = Category::find($request->cat_id);

		$cats->update($request->all());

		return redirect()->back()->with('success', 'Product Category Has Been Updated!!');
	}

	public function delete($id)
	{
		Category::find($id)->delete();
		return redirect()->back();
	}
}
