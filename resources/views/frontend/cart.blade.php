@extends('layouts.SurfsideMedia')

@section('content')
        
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Home</a>
                    <span></span> Shop
                    <span></span> Your Cart
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table shopping-summery text-center clean">
                                <thead>
                                    <tr class="main-heading">
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Subtotal</th>
                                        <th scope="col">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $get_signle_price=0; $get_total=0; $get_order_id=0; @endphp
                                    @foreach($order_variants as $order_variant)
                                    @if($order_variant->order->user_id==Auth::user()->id && $order_variant->order->order_status=='incomplete')
                                    
                                    <tr>
                                        <td class="image product-thumbnail"><img src="{{asset('/images/products/'.$order_variant->product_variant->product->image)}}" alt="#"></td>
                                        <td class="product-des product-name">
                                            <h5 class="product-name"><a href="{{url('/product_details',$order_variant->product_variant->product->id)}}">{{$order_variant->product_variant->product->title}}</a></h5>
                                            <p class="font-xs">
                                                {{$order_variant->product_variant->product->brand->name}}<br>
                                                {{$order_variant->product_variant->color->name}},
                                                {{$order_variant->product_variant->size->name}}
                                            </p>
                                        </td>
                                        <td class="price" data-title="Price"><span>
                                            @php $get_signle_price=$order_variant->product_variant->product->sale_price-(($order_variant->product_variant->product->sale_price*$order_variant->product_variant->product->discount)/100); @endphp
                                            {{$get_signle_price}} taka
                                        </span></td>
                                        <td class="text-center" data-title="Stock">
                                            <div class="detail-qty border radius  m-auto">
                                                <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                                <span class="qty-val">{{$order_variant->quantity}}</span>
                                                <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                            </div>
                                        </td>
                                        <td class="text-right" data-title="Cart">
                                            <span>{{$get_signle_price*$order_variant->quantity}} taka</span>
                                        </td>
                                        <td class="action" data-title="Remove">
                                            <a href="{{url('/delete_order_variant',$order_variant->id)}}" class="text-muted"><i class="fi-rs-trash"></i></a>
                                        </td>
                                    </tr>
                                    @php $get_total+=$get_signle_price*$order_variant->quantity; @endphp
                                    @php $get_order_id=$order_variant->order_id; @endphp
                                    @endif
                                    @endforeach
                                    
                                    <tr>
                                        <td colspan="6" class="text-end">
                                            <a href="#" class="text-muted"> <i class="fi-rs-cross-small"></i> Clear Cart</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="cart-action text-end">
                            <a class="btn  mr-10 mb-sm-15"><i class="fi-rs-shuffle mr-10"></i>Update Cart</a>
                            <a href="{{route('shop')}}" class="btn "><i class="fi-rs-shopping-bag mr-10"></i>Continue Shopping</a>
                        </div>
                        <div class="divider center_icon mt-50 mb-50"><i class="fi-rs-fingerprint"></i></div>
                        <div class="row mb-50">
                            <div class="col-md-6">
                                <div class="order_review">
                                    <div class="mb-20">
                                        <h4>Your Details</h4>
                                    </div>
                                    <form action="{{url('/update_user_address')}}" method="post"> @csrf @method('put')
                                        <div class="form-group">
                                            <input type="text" name="name" required value="{{Auth::user()->name}}">
                                        </div>
                                        <div class="form-group">
                                            <input type="disabled" name="" value="{{Auth::user()->email}}">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="mobile" required value="{{Auth::user()->mobile}}" placeholder="Mobile *">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="location" value="{{Auth::user()->location}}" placeholder="Location">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="district" value="{{Auth::user()->district}}" placeholder="District">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="division" value="{{Auth::user()->division}}" placeholder="Division">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="country" value="{{Auth::user()->country}}" placeholder="Country">
                                        </div>
                                        
                                        <button type="submit" class="btn btn-fill-out btn-block mt-30">Update Now</button>

                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="border p-md-4 p-30 border-radius cart-totals">
                                    <div class="heading_s1 mb-3">
                                        <h4>Cart Totals</h4>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td class="cart_total_label">Cart Subtotal</td>
                                                    <td class="cart_total_amount"><span class="font-lg fw-900 text-brand">{{$get_total}} taka</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="cart_total_label">Shipping</td>
                                                    <td class="cart_total_amount"> <i class="ti-gift mr-5"></i> Free Shipping</td>
                                                </tr>
                                                <tr>
                                                    <td class="cart_total_label">Total</td>
                                                    <td class="cart_total_amount"><strong><span class="font-xl fw-900 text-brand">{{$get_total}} taka</span></strong></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="payment_method">
                                        <div class="mb-25">
                                            <h5>Payment</h5>
                                        </div>
                                        <div class="payment_option">
                                            <div class="custome-radio">
                                                <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios3">
                                                <label class="form-check-label" for="exampleRadios3" data-bs-toggle="collapse" data-target="#cashOnDelivery" aria-controls="cashOnDelivery">Cash On Delivery</label>                                        
                                            </div>
                                            <div class="custome-radio">
                                                <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios4">
                                                <label class="form-check-label" for="exampleRadios4" data-bs-toggle="collapse" data-target="#cardPayment" aria-controls="cardPayment">Card Payment</label>                                        
                                            </div>
                                            <div class="custome-radio">
                                                <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios5">
                                                <label class="form-check-label" for="exampleRadios5" data-bs-toggle="collapse" data-target="#paypal" aria-controls="paypal">Paypal</label>                                        
                                            </div>
                                        </div>
                                    </div>
                                    <form action="{{route('orders.update',$get_order_id)}}" method="post"> @csrf @method('put')
                                    <button type="submit" class="btn btn-fill-out btn-block mt-30">Place Order</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection 