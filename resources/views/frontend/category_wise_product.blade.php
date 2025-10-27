@extends('layouts.SurfsideMedia')

@section('content')
<main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{url('/')}}" rel="nofollow">Home</a>
                    <span></span> {{$category->name}}
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="shop-product-fillter">
                            <div class="totall-product">
                                <p> We found <strong class="text-brand">{{count($products)}}</strong> items for you!</p>
                            </div>
                            <div class="sort-by-product-area">
                                <div class="sort-by-cover mr-10">
                                    <div class="sort-by-product-wrap">
                                        <div class="sort-by">
                                            <span><i class="fi-rs-apps"></i>Show:</span>
                                        </div>
                                        <div class="sort-by-dropdown-wrap">
                                            <span> 50 <i class="fi-rs-angle-small-down"></i></span>
                                        </div>
                                    </div>
                                    <div class="sort-by-dropdown">
                                        <ul>
                                            <li><a class="active" href="#">50</a></li>
                                            <li><a href="#">100</a></li>
                                            <li><a href="#">150</a></li>
                                            <li><a href="#">200</a></li>
                                            <li><a href="#">All</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="sort-by-cover">
                                    <div class="sort-by-product-wrap">
                                        <div class="sort-by">
                                            <span><i class="fi-rs-apps-sort"></i>Sort by:</span>
                                        </div>
                                        <div class="sort-by-dropdown-wrap">
                                            <span> Featured <i class="fi-rs-angle-small-down"></i></span>
                                        </div>
                                    </div>
                                    <div class="sort-by-dropdown">
                                        <ul>
                                            <li><a class="active" href="#">Featured</a></li>
                                            <li><a href="#">Price: Low to High</a></li>
                                            <li><a href="#">Price: High to Low</a></li>
                                            <li><a href="#">Release Date</a></li>
                                            <li><a href="#">Avg. Rating</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row product-grid-3">
                            @php $new=0; @endphp
                            @foreach($sub_categories as $data1)
                            @if($data1->category->id==$category->id)
                            @foreach($products as $data)
                            @if($data1->id==$data->sub_category_id)
                            <div class="col-lg-4 col-md-4 col-6 col-sm-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{url('/product_details',$data->id)}}">
                                                <img class="default-img" src="{{asset('/images/products/'.$data->image)}}" alt="">
                                                <img class="hover-img" src="{{asset('/images/products/'.$data->image_hover)}}" alt="">
                                            </a>
                                        </div>
                                        <!--<div class="product-action-1">-->
                                        <!--    <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal">-->
                                        <!--        <i class="fi-rs-search"></i></a>-->
                                        <!--    <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a>-->
                                        <!--    <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a>-->
                                        <!--</div>-->
                                        @if($data->discount)
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">-{{$data->discount}}%</span>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="#">{{$data->sub_category->name}}</a>
                                        </div>
                                        <h2><a href="{{url('/product_details',$data->id)}}">{{$data->title}}</a></h2>
                                        <div class="rating-result" title="90%">
                                            <span>
                                                <span>90%</span>
                                            </span>
                                        </div>
                                        @if($data->discount)
                                        <div class="product-price">
                                            @php $new=$data->sale_price-(($data->sale_price*$data->discount)/100); @endphp
                                            <span>{{$new}} tk </span>
                                            <span class="old-price">{{$data->sale_price}} tk</span>
                                        </div>
                                        @else
                                        <div class="product-price">
                                            <span>{{$data->sale_price}} tk </span>
                                        </div>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#OrderNow{{$data->id}}" class="btn mt-2 d-block">Contact supplier</a>
                                        <!-- OrderNow -->
                                        <div class="modal fade" id="OrderNow{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Order Now - {{$data->title}}</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{url('/orderNow')}}" method="post"> @csrf
                                                        <input type="hidden" name="product_id" value="{{$data->id}}">
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-6 pb-3">
                                                                    <label>Your Name * :</label>
                                                                    <input type="text" name="name" class="form-control my-2" required>
                                                                </div>
                                                                <div class="col-md-6 pb-3">
                                                                    <label>Your Mobile * :</label>
                                                                    <input type="number" name="mobile" class="form-control my-2" required>
                                                                </div>
                                                                <div class="col-md-6 pb-3">
                                                                    <label>Order Quantity * : [minimum : {{$data->min_quantity}} {{$data->unit->name}}] </label>
                                                                    <input type="number" name="quantity" class="form-control my-2" required>
                                                                </div>
                                                                <div class="col-md-6 pb-3">
                                                                    <label>Your Email :</label>
                                                                    <input type="email" name="email" class="form-control my-2" required>
                                                                </div>
                                                                <div class="col-12 pb-3">
                                                                    <label>Message :</label>
                                                                    <textarea name="message" cols="33" rows="2" style="min-height:0;" required></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Order Now</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        <!--<div class="product-action-1 show">-->
                                        <!--    <a aria-label="Add To Cart" class="action-btn hover-up" href="shop-cart.php"><i class="fi-rs-shopping-bag-add"></i></a>-->
                                        <!--</div>-->
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                            @endif
                            @endforeach
                        </div>

                    </div>
                    <div class="col-lg-3 primary-sidebar sticky-sidebar">
                        <div class="row">
                            <div class="col-lg-12 col-mg-6"></div>
                            <div class="col-lg-12 col-mg-6"></div>
                        </div>
                        <div class="widget-category mb-30">
                            <h5 class="section-title style-1 mb-10 wow fadeIn animated">Type Of Products</h5>
                            <ul class="categories">
                                <li class="pb-3">
                                    <a href="{{url('/import_products')}}">Import Products</a><br>
                                    <a href="{{url('/export_products')}}">Export Products</a><br>
                                    <a href="{{url('/trade_products')}}">Trade Products</a><br>
                                </li>
                            </ul>
                            <h5 class="section-title style-1 mb-10 wow fadeIn animated">Category</h5>
                            <ul class="categories">
                                @foreach($categories as $data)
                                <li class="pb-3">
                                    @if($category->id==$data->id)
                                        <a class="fs-4" href="{{url('/category_wise_product',$data->id)}}" style="color:#F15412;">{{$data->name}}</a><br>
                                    @else
                                        <a class="fs-4" href="{{url('/category_wise_product',$data->id)}}">{{$data->name}}</a><br>
                                    @endif
                                </li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
