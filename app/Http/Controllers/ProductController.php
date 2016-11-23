<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Purcasher;
use App\Models\Category;

use App\Http\Requests;
use Auth;
use Session;
use Stripe\Charge;
use Stripe\Stripe;

class ProductController extends Controller
{
    public function getIndex(Request $request){
        $q = $request->get('q');
        if ($request->has('cat')) {
            $selected_category = Category::find($request->get('cat'));

            // can't use this to get selected category > child's > product
            // $products = $selected_category->products()->where('name', 'LIKE', '%'.$q.'%')->paginate(4);

            // we use this to get product from current category and its child
            $products = Product::whereIn('id', $selected_category->related_products_id)
                ->where('title', 'LIKE', '%'.$q.'%')->paginate(6);
        } else {
            $products = Product::where('title', 'LIKE', '%'.$q.'%')->paginate(6);
        }
		return view('shop.index', compact('products', 'q', 'cat', 'selected_category'));
	}

    public function getAddToCart(Request $request, $id){
		$product = Product::find($id);
		$oldCart = Session::has('cart') ? Session::get('cart') : null;
		$cart = new Cart($oldCart);
		$cart->add($product, $product->id);

		$request->session()->put('cart', $cart);
		return redirect()->route('product.index');
	}

    public function getReduceByOne($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->route('product.shoppingCart');
    }

    public function getRemoveItem($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->route('product.shoppingCart');
    }

    public function getCart(){
    	if (!Session::has('cart')) {
			return view('shop.shopping-cart', ['products' => null]);
    	}
    	$oldCart = Session::get('cart');
    	$cart = new Cart($oldCart);
		return view('shop.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
	}

    public function getOrder(){
    	if (!Session::has('cart')) {
			return view('shop.shopping-cart');
    	}
    	$oldCart = Session::get('cart');
    	$cart = new Cart($oldCart);
    	$total = $cart->totalPrice;
		return view('shop.order', ['total' => $total]);

	}

    public function postOrder(){
    	
	}

    public function getCheckout(){
    	if (!Session::has('cart')) {
			return view('shop.shopping-cart');
    	}
    	$oldCart = Session::get('cart');
    	$cart = new Cart($oldCart);
    	$total = $cart->totalPrice;
		return view('shop.checkout', ['total' => $total]);

	}

    public function postCheckout(Request $request){
    	if (!Session::has('cart')) {
			return redirect()->route('shop.shoppingCart');
    	}
    	$oldCart = Session::get('cart');
    	$cart = new Cart($oldCart);
    	Stripe::setApiKey("sk_test_QQRYxUzUHBw7xUWzTylYYbng");
    	try {
    		$charge = Charge::create(array(
    			"amount" => $cart->totalPrice,
    			"currency" => "usd",
    			"source" => $request->input('stripeToken'),
    			"description" => "Test Charge"
    		));	
            $purcasher = new Purcasher();
            $purcasher->cart = serialize($cart);
            $purcasher->name = $request->input('name');
            $purcasher->address = $request->input('address');
            $purcasher->payment_id = $charge->id;

            Auth::user()->purcashers()->save($purcasher);
    	} catch (\Exception $e) {
    		return redirect()->route('checkout')->with('error', $e->getMessage());
    	}
    	Session::forget('cart');
    	return redirect()->route('product.index')->with('success', 'Successfully Purchased Product!');
	}
}
