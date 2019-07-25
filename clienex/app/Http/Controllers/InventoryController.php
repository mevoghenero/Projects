<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class InventoryController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
        //$this->authorize('admin', auth()->user());
        
    }

    public function root()
    {
        return view('inventories.index');
    }

    public function index($id)
    {
        $roles = Role::all();
        $products = Product::all();
        $cart = $this->getCart();
        return view('inventories.index', [
            'products'   => $products,
            'items'      => $cart->items,
            'totalPrice' => $cart->totalPrice
        ]);
    }

    public function cart(Request $request, $id)
    {
        $products = Product::find($id);
        // dd($products);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($products, $products->id);

        $request->session()->put('cart', $cart); 
        return redirect()->back();
    }

    protected function getCart()
    {
        if (!Session::has('cart')) {
           return view('inventories.index');
       }
       $oldCart =  Session::get('cart');
       $cart = new Cart($oldCart);
       return $cart;
   }
}
