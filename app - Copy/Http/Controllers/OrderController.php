<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Order;
use App\Models\OrderVariant;
use App\Models\Setting;
use Auth;

class OrderController extends Controller


{

    public function success()
    {
        // You can return a view for the order success page here
        return view('success');
    }
    public function index(){
        $data['setting'] = Setting::first();
        $data['orders'] = Order::latest()->get();
        return view('backend.admin.orders.index',$data);
    }
    public function destroy($id){
        $data = Order::find($id);
        $data->delete();
        return redirect()->back()->with('error','Deleted Successfully Done.');
    }
    public function orderNow(Request $request){
        $orders  = new Order;
        $orders->product_id = $request->product_id;
        $orders->name = $request->name;
        $orders->mobile = $request->mobile;
        $orders->quantity = $request->quantity;
        $orders->email = $request->email;
        $orders->message = $request->message;
        $orders->save();
        return back()->with('success','Thanks '.'" '.$request->name.' "');
    }
    public function store(Request $request){
        $all_order = Order::count();
        if($all_order>0){
            $last_order_on_user = Order::latest()->where('user_id',Auth::user()->id)->first();
            if($last_order_on_user){
                if($last_order_on_user->order_status=='incomplete'){
                    $order_variants  = new OrderVariant;
                    $order_variants->order_id = $last_order_on_user->id;
                    $order_variants->product_variant_id = $request->product_variant_id;
                    $order_variants->quantity = $request->quantity;
                    $order_variants->save();
                }
                else{
                    $orders  = new Order;
                    $orders->user_id = Auth::user()->id;
                    $orders->order_status = 'incomplete';
                    $orders->save();
                        $last_order_on_user = Order::latest()->where('user_id',Auth::user()->id)->first();
                        $order_variants  = new OrderVariant;
                        $order_variants->order_id = $last_order_on_user->id;
                        $order_variants->product_variant_id = $request->product_variant_id;
                        $order_variants->quantity = $request->quantity;
                        $order_variants->save();
                }
            }
            else{
                $orders  = new Order;
                $orders->user_id = Auth::user()->id;
                $orders->order_status = 'incomplete';
                $orders->save();
                    $last_order_on_user = Order::latest()->where('user_id',Auth::user()->id)->first();
                    $order_variants  = new OrderVariant;
                    $order_variants->order_id = $last_order_on_user->id;
                    $order_variants->product_variant_id = $request->product_variant_id;
                    $order_variants->quantity = $request->quantity;
                    $order_variants->save();
            }
        }
        else{
            $orders  = new Order;
            $orders->user_id = Auth::user()->id;
            $orders->order_status = 'incomplete';
            $orders->save();
                $last_order_on_user = Order::latest()->where('user_id',Auth::user()->id)->first();
                $order_variants  = new OrderVariant;
                $order_variants->order_id = $last_order_on_user->id;
                $order_variants->product_variant_id = $request->product_variant_id;
                $order_variants->quantity = $request->quantity;
                $order_variants->save();
        }
        return back();
    }
    public function index2(){
        $data['orders'] = Order::latest()->get();
        $data['order_variants'] = OrderVariant::latest()->get();
        $data['categories'] = Category::latest()->get();
        $data['sub_categories'] = SubCategory::latest()->get();
        if(auth()->check()){
        $last_incomplete_order_on_user = Order::latest()->where('user_id',Auth::user()->id)->where('order_status','incomplete')->first();
        $data['count_variant'] = OrderVariant::latest()->where('order_id',$last_incomplete_order_on_user->id)->count();
        }
        return view('frontend.cart',$data);
    }
    public function update($id){
        $data = Order::find($id);
        $data->order_status = 'complete';
        $data->update();
        return redirect()->to('/');
    }
}
