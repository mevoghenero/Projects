<?php

namespace App\Http\Controllers;


use App\Category;
use App\Outlet;
use App\Product;
use App\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index($id)
	{
		$products = Product::all();
		$types = ProductType::all();
		$outlets = Outlet::find($id);
		$categories = Category::all();
		return view('products.index', compact('products', 'types', 'outlets', 'categories'));
	}

	public function store(Request $request)
	{
		//dd($request->all());
		Validator::make($request->all(), [
			'name'    	   => 'required|string|max:250',
			'qty'   	   => 'required|integer',
			'unit_cp' 	   => 'required|integer',
			'unit_sp' 	   => 'required|integer',
			'type_id' 	   => 'required',
			'ref_no'  	   => 'required|string|max:250',
			'manu_date'    => 'required',
			'expire_date'  => 'required',
			'manufacturer' => 'required|string|max:250',
		])->validate();

		$total_cp = ($request->qty * $request->unit_cp);

		$products = new Product;
		$products->total_cp 	= $total_cp;
		$products->name 		= $request->name;
		$products->qty 			= $request->qty;
		$products->unit_cp 		= $request->unit_cp;
		$products->unit_sp 		= $request->unit_sp;
		$products->type_id 		= $request->type_id;
		$products->ref_no 		= $request->ref_no;
		$products->manu_date 	= $request->manu_date;
		$products->expire_date  = $request->expire_date;
		$products->manufacturer = $request->manufacturer;
		$products->outlet_id    = $request->outlet_id;

		$products->save();
		//dd($products);
		$products->category()->sync($request->category);
		return redirect()->back()->with('success', 'Product Has Been Uploaded Successfully!!');
	}

	public function update(Request $request, $id)
	{
		//dd($request->all());
		Validator::make($request->all(), [
			'name'    	   => 'required|string|max:250',
			'qty'   	   => 'required|integer',
			'unit_cp' 	   => 'required|integer',
			'unit_sp' 	   => 'required|integer',
			'type_id' 	   => 'required',
			'ref_no'  	   => 'required|string|max:250',
			'manu_date'    => 'required',
			'expire_date'  => 'required',
			'manufacturer' => 'required|string|max:250',
		])->validate();

		$total_cp = ($request->qty * $request->unit_cp);

		$products = Product::find($request->product_id);
		$products->total_cp 	= $total_cp;
		$products->name 		= $request->name;
		$products->qty 			= $request->qty;
		$products->unit_cp 		= $request->unit_cp;
		$products->unit_sp 		= $request->unit_sp;
		$products->type_id 		= $request->type_id;
		$products->ref_no 		= $request->ref_no;
		$products->manu_date 	= $request->manu_date;
		$products->expire_date  = $request->expire_date;
		$products->manufacturer = $request->manufacturer;

		$products->save();
		$products->category()->sync($request->category);
		//dd($products);
		return back()->with('success', 'Product Has Been Updated Successfully!!');
	}

	public function delete($id)
	{
		Product::find($id)->delete();
		return redirect()->back();
	}
}

