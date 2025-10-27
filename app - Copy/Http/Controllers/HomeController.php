<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Order;
use App\Models\OrderVariant;
use App\Models\Setting;
use App\Models\Social;
use App\Models\CartItem;

use Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(): View
    {
        $data['setting'] = Setting::first();
        $data['categories'] = Category::latest()->get();
        $data['sub_categories'] = SubCategory::latest()->get();
        $data['socials'] = Social::latest()->get();
    
        if(auth()->check()) {
            $data['orders'] = Order::latest()
                ->where('user_id', Auth::user()->id)
                ->where('order_status', 'complete')
                ->get();
    
            // Check if there is any incomplete order for the user
            $last_incomplete_order_on_user = Order::latest()
                ->where('user_id', Auth::user()->id)
                ->where('order_status', 'incomplete')
                ->first();
    
            if($last_incomplete_order_on_user) {
                // If an incomplete order exists, count its variants
                $data['count_variant'] = OrderVariant::latest()
                    ->where('order_id', $last_incomplete_order_on_user->id)
                    ->count();
            } else {
                // If no incomplete order, set count_variant to 0
                $data['count_variant'] = 0;
            }
        }
    
        return view('home', $data);
    }
    public function adminHome(): View
    {
        $data['setting'] = Setting::first();
        $data['t_product'] = Product::count();
        $data['orders'] = Order::latest()->get();
        return view('adminHome',$data);
    }
    public function addToCart($productId)
{
    $user = Auth::user();

    // Check if product already exists in the cart
    $cartItem = CartItem::where('user_id', $user->id)
                        ->where('product_id', $productId)
                        ->first();

    if ($cartItem) {
        // If product exists, increase the quantity
        $cartItem->quantity += 1;
        $cartItem->save();
    } else {
        // If product does not exist, create new cart item
        CartItem::create([
            'user_id' => $user->id,
            'product_id' => $productId,
            'quantity' => 1,
        ]);
    }

    return redirect()->back()->with('success', 'Product added to cart!');
}
public function cart()
{
    $cartItems = CartItem::where('user_id', Auth::user()->id)->get();
    return view('cart', compact('cartItems'));
}
public function checkout()
{
    $cartItems = CartItem::where('user_id', Auth::user()->id)->get();

    if ($cartItems->isEmpty()) {
        return redirect()->back()->with('error', 'Your cart is empty!');
    }

    foreach ($cartItems as $cartItem) {
        Order::create([
            'user_id' => Auth::user()->id,
            'product_id' => $cartItem->product_id,
            'quantity' => $cartItem->quantity,
            'order_status' => 'incomplete',
        ]);
    }

    // Clear the cart after placing the order
    CartItem::where('user_id', Auth::user()->id)->delete();

    return redirect()->route('order.success')->with('success', 'Order placed successfully!');
}

}
