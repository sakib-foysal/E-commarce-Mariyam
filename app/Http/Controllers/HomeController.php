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
    public function index(Request $request): View
    {
        $data['setting'] = Setting::first();
        $data['categories'] = Category::latest()->get();
        $data['sub_categories'] = SubCategory::latest()->get();
        $data['socials'] = Social::latest()->get();

        if (auth()->check()) {
            // Update all null order_status to 'processing' for the user
            Order::where('user_id', auth()->id())
                ->whereNull('order_status')
                ->update(['order_status' => 'processing']);

            // Retrieve orders for the user
            $data['orders'] = Order::where('user_id', auth()->id())->latest()->get();

            // Count variants for the last incomplete order
            $last_incomplete_order = Order::latest()
                ->where('user_id', auth()->id())
                ->where('order_status', 'incomplete')
                ->first();

            $data['count_variant'] = $last_incomplete_order
                ? OrderVariant::where('order_id', $last_incomplete_order->id)->count()
                : 0;
        }

        return view('home', $data);
    }
    public function searchOrders(Request $request)
{
    if ($request->ajax() && auth()->check()) {
        $query = Order::where('user_id', auth()->id());

        if ($request->has('search_order_id') && $request->search_order_id != '') {
            $query->where('id', $request->search_order_id);
        }

        $orders = $query->latest()->get();

        return response()->json(['orders' => $orders]);
    }

    return response()->json(['message' => 'Unauthorized'], 401);
}
public function orderlist(Request $request)
{
    $data['setting'] = Setting::first();
    $data['categories'] = Category::latest()->get();
    $data['sub_categories'] = SubCategory::latest()->get();
    $data['socials'] = Social::latest()->get();
    $data['orders'] = Order::latest()->get(); // Fetch all orders for admin

    return view('backend.admin.orders', $data);
}
public function updateOrderStatus(Request $request)
{
    $request->validate([
        'order_id' => 'required|exists:orders,id',
        'order_status' => 'required|in:processed,shipped,delivered'
    ]);

    $order = Order::find($request->order_id);

    if (!$order) {
        return redirect()->back()->with('error', 'Order not found.');
    }

    $order->order_status = $request->order_status;
    $order->save();

    return redirect()->back()->with('success', 'Order status updated successfully.');
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
public function updateCartItem(Request $request, $id)
{
    $request->validate([
        'quantity' => 'required|integer|min:1',
    ]);

    $cartItem = CartItem::find($id);
    if (!$cartItem) {
        return redirect()->back()->with('error', 'Cart item not found.');
    }

    $cartItem->quantity = $request->quantity;
    $cartItem->save();

    return redirect()->back()->with('success', 'Cart item updated successfully.');
}

public function deleteCartItem($id)
{
    $cartItem = CartItem::find($id);
    if (!$cartItem) {
        return redirect()->back()->with('error', 'Cart item not found.');
    }

    $cartItem->delete();

    return redirect()->back()->with('success', 'Cart item deleted successfully.');
}


public function checkout(Request $request)
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
    $order = new Order();
    $order->user_id = auth()->id();
    $order->mobile = $request->mobile;
    $order->email = $request->email;
    $order->message = $request->description;
    $order->order_status = 'pending';
    $order->total_price = CartItem::with('product')->get()->sum(function ($item) {
        return $item->product->sale_price * $item->quantity;
    });
    $order->save();

    // Clear the cart after placing the order
    CartItem::where('user_id', Auth::user()->id)->delete();

    return redirect()->route('order.success')->with('success', 'Order placed successfully!');
}
public function getCartCount()
{
    $count = CartItem::where('user_id', Auth::id())->count();
    return response()->json(['count' => $count]);
}
    public function source()
    {
        $data['setting'] = Setting::first();
        return view('products.source', $data);
    }

    public function stock()
    {
        $data['setting'] = Setting::first();
        return view('products.stock', $data);
    }

    public function ofline_sales()
    {
        $data['setting'] = Setting::first();
        return view('products.ofline_sales', $data);
    }

}
