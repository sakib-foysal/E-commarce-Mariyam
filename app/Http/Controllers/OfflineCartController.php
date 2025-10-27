<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class OfflineCartController extends Controller
{
    //
    public function index()
{
    $products = Product::all(); // Fetch all products for live search
    $cartItems = DB::table('offline_cart')
        ->join('products', 'offline_cart.product_id', '=', 'products.id')
        ->select('offline_cart.*', 'products.title', 'products.sale_price', 'products.type')
        ->get();

    return view('offline_cart', compact('products', 'cartItems'));
}

public function addToCart(Request $request)
{
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'quantity' => 'required|integer|min:1',
        'phone' => 'required|digits:10',
        'pay' => 'required|numeric|min:0',
    ]);

    $product = Product::find($request->product_id);
    $total = $product->sale_price * $request->quantity;
    $due = $total - $request->pay;

    DB::table('offline_cart')->insert([
        'product_id' => $request->product_id,
        'quantity' => $request->quantity,
        'total' => $total,
        'pay' => $request->pay,
        'due' => $due,
        'phone' => $request->phone,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return redirect()->route('offline.cart')->with('success', 'Product added to offline cart!');
}

public function showOrders()
{
    $orders = DB::table('offline_cart')
        ->join('products', 'offline_cart.product_id', '=', 'products.id')
        ->select('offline_cart.*', 'products.title', 'products.sale_price', 'products.type')
        ->get();

    return view('offline_orders', compact('orders'));
}


}
