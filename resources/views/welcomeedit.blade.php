@extends('layouts.SurfsideMedia')

@section('content')

    <main class="main">

        <section class="home-slider position-relative pt-50">
            <div class="hero-slider-1 dot-style-1 dot-style-1-position-1">
                <div class="single-hero-slider single-animation-wrap">
                    <div class="container">
                        <div class="row align-items-center slider-animated-1">
                            <div class="col-lg-5 col-md-6">
                                <div class="hero-slider-content-2">
                                    <h4 class="animated">Trade-in offer</h4>
                                    <h2 class="animated fw-900">Supper value deals</h2>
                                    <h1 class="animated fw-900 text-brand">On all products</h1>
                                    <p class="animated">Save more with coupons & up to 70% off</p>
                                    <a class="animated btn btn-brush btn-brush-3" href="#"> Shop Now </a>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-6">
                                <div class="single-slider-img single-slider-img-1">
                                    <img class="animated slider-1-1" src="{{asset('/SurfsideMedia/assets/imgs/slider/slider-1.png')}}" alt="" oncontextmenu="return false;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-hero-slider single-animation-wrap">
                    <div class="container">
                        <div class="row align-items-center slider-animated-1">
                            <div class="col-lg-5 col-md-6">
                                <div class="hero-slider-content-2">
                                    <h4 class="animated">Hot promotions</h4>
                                    <h2 class="animated fw-900">Fashion Trending</h2>
                                    <h1 class="animated fw-900 text-7">Great Collection</h1>
                                    <p class="animated">Save more with coupons & up to 20% off</p>
                                    <a class="animated btn btn-brush btn-brush-2" href="#"> Discover Now </a>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-6">
                                <div class="single-slider-img single-slider-img-1">
                                    <img class="animated slider-1-2" src="{{asset('/SurfsideMedia/assets/imgs/slider/slider-2.png')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slider-arrow hero-slider-1-arrow"></div>
        </section>


        <section class="popular-categories section-padding mt-15 mb-25">
            <div class="container wow fadeIn animated">
                <h3 class="section-title mb-20"><span>Popular</span> Categories</h3>
                <div class="carausel-6-columns-cover position-relative">
                    <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-arrows"></div>
                    <div class="carausel-6-columns" id="carausel-6-columns">
                        @foreach($categories as $data)
                        <div class="card-1">
                            <figure class=" img-hover-scale overflow-hidden">
                                <a href="{{url('/category_wise_product',$data->id)}}"><img src="{{asset('/images/categories/'.$data->image)}}" alt=""></a>
                            </figure>
                            <h5><a >{{$data->name}}</a></h5>
                        </div>
                        @endforeach
                        <!--<div class="card-1">-->
                        <!--    <figure class=" img-hover-scale overflow-hidden">-->
                        <!--        <a href="shop.html"> <img src="{{asset('/SurfsideMedia/assets/imgs/shop/category-thumb-2.jpg')}}" alt=""></a>-->
                        <!--    </figure>-->
                        <!--    <h5><a href="shop.html">Bags</a></h5>-->
                        <!--</div>-->
                        <!--<div class="card-1">-->
                        <!--    <figure class=" img-hover-scale overflow-hidden">-->
                        <!--        <a href="shop.html"><img src="{{asset('/SurfsideMedia/assets/imgs/shop/category-thumb-3.jpg')}}" alt=""></a>-->
                        <!--    </figure>-->
                        <!--    <h5><a href="shop.html">Sandan</a></h5>-->
                        <!--</div>-->
                        <!--<div class="card-1">-->
                        <!--    <figure class=" img-hover-scale overflow-hidden">-->
                        <!--        <a href="shop.html"><img src="{{asset('/SurfsideMedia/assets/imgs/shop/category-thumb-4.jpg')}}" alt=""></a>-->
                        <!--    </figure>-->
                        <!--    <h5><a href="shop.html">Scarf Cap</a></h5>-->
                        <!--</div>-->
                        <!--<div class="card-1">-->
                        <!--    <figure class=" img-hover-scale overflow-hidden">-->
                        <!--        <a href="shop.html"><img src="{{asset('/SurfsideMedia/assets/imgs/shop/category-thumb-5.jpg')}}" alt=""></a>-->
                        <!--    </figure>-->
                        <!--    <h5><a href="shop.html">Shoes</a></h5>-->
                        <!--</div>-->
                        <!--<div class="card-1">-->
                        <!--    <figure class=" img-hover-scale overflow-hidden">-->
                        <!--        <a href="shop.html"><img src="{{asset('/SurfsideMedia/assets/imgs/shop/category-thumb-6.jpg')}}" alt=""></a>-->
                        <!--    </figure>-->
                        <!--    <h5><a href="shop.html">Pillowcase</a></h5>-->
                        <!--</div>-->
                        <!--<div class="card-1">-->
                        <!--    <figure class=" img-hover-scale overflow-hidden">-->
                        <!--        <a href="shop.html"><img src="{{asset('/SurfsideMedia/assets/imgs/shop/category-thumb-7.jpg')}}" alt=""></a>-->
                        <!--    </figure>-->
                        <!--    <h5><a href="shop.html">Jumpsuits</a></h5>-->
                        <!--</div>-->
                        <!--<div class="card-1">-->
                        <!--    <figure class=" img-hover-scale overflow-hidden">-->
                        <!--        <a href="shop.html"><img src="{{asset('/SurfsideMedia/assets/imgs/shop/category-thumb-8.jpg')}}" alt=""></a>-->
                        <!--    </figure>-->
                        <!--    <h5><a href="shop.html">Hats</a></h5>-->
                        <!--</div>-->

                    </div>
                </div>
            </div>
        </section>


        <section class="featured section-padding position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="{{asset('/SurfsideMedia/assets/imgs/theme/icons/feature-1.png')}}" alt="">
                            <h4 class="bg-1">Free Shipping</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="{{asset('/SurfsideMedia/assets/imgs/theme/icons/feature-2.png')}}" alt="">
                            <h4 class="bg-3">Online Order</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="{{asset('/SurfsideMedia/assets/imgs/theme/icons/feature-3.png')}}" alt="">
                            <h4 class="bg-2">Save Money</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="{{asset('/SurfsideMedia/assets/imgs/theme/icons/feature-4.png')}}" alt="">
                            <h4 class="bg-4">Promotions</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="{{asset('/SurfsideMedia/assets/imgs/theme/icons/feature-5.png')}}" alt="">
                            <h4 class="bg-5">Happy Sell</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="{{asset('/SurfsideMedia/assets/imgs/theme/icons/feature-6.png')}}" alt="">
                            <h4 class="bg-6">24/7 Support</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="product-tabs section-padding position-relative wow fadeIn animated">
            <div class="bg-square"></div>
            <div class="container">
                <div class="tab-header">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one" aria-selected="true">Trade</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link " id="nav-tab-three" data-bs-toggle="tab" data-bs-target="#tab-three" type="button" role="tab" aria-controls="tab-three" aria-selected="false">Import</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link " id="nav-tab-two" data-bs-toggle="tab" data-bs-target="#tab-two" type="button" role="tab" aria-controls="tab-two" aria-selected="false">Export</button>
                        </li>
                    </ul>
                    <a href="{{url('/shop')}}" class="view-more d-none d-md-flex">View More<i class="fi-rs-angle-double-small-right"></i></a>
                </div>
                <!--End nav-tabs-->
                <div class="tab-content wow fadeIn animated" id="myTabContent">
                    <!--1-->
                    <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                        <div class="row product-grid-4">

                            @php $new=0; @endphp
                            @foreach($categories as $category)
                            @foreach($products as $data)
                            @if($data->type=='Trade')
                            @if($category->id==$data->sub_category->category->id)
                            
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6 pb-3">
                                <div class="product-cart-wrap mb-xs-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{url('/product_details',$data->id)}}">
                                                <img class="default-img" src="{{asset('/images/products/'.$data->image)}}" alt="">
                                                <img class="hover-img" src="{{asset('/images/products/'.$data->image_hover)}}" alt="">
                                            </a>
                                        </div>
                                        <!--<div class="product-action-1">-->
                                        <!--    <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>-->
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
                                        <!--<div class="rating-result" title="">-->
                                        <!--    <span>-->
                                        <!--        <span></span>-->
                                        <!--    </span>-->
                                        <!--</div>-->
                                        Minimum Order : {{$data->min_quantity}} {{$data->unit->name}}
                                        @if($data->discount)
                                        <div class="product-price">
                                            @php $new=$data->sale_price-(($data->sale_price*$data->discount)/100); @endphp
                                            <span>{{$new}} tk </span>
                                            <span class="old-price">{{$data->sale_price}} tk</span>
                                        </div>
                                        @else
                                        <div class="product-price">
                                            <span>{{$data->sale_price}} tk</span>
                                            <span class="text-dark fw-none">per</span>
                                            <span>{{$data->unit->name}}</span>
                                        </div>
                                        @endif
                                        <!--<div class="product-action-1 show">-->
                                        <!--    <a aria-label="Order Now" class="action-btn hover-up"><i class="fi-rs-shopping-bag-add"></i></a>-->
                                        <!--</div>-->
                                        <div>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#OrderNow{{$data->id}}" class="btn mt-2 d-block">Contact supplier</a>
                                        </div>
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
                                    </div>
                                </div>
                            </div>
                            
                            @endif
                            @endif
                            @endforeach
                            @endforeach

                        </div>
                    </div>
                    <!--2-->
                    <div class="tab-pane fade" id="tab-three" role="tabpanel" aria-labelledby="tab-three">
                        <div class="row product-grid-4">

                            @php $new=0; @endphp
                            @foreach($categories as $category)
                            @foreach($products as $data)
                            @if($data->type=='Import')
                            @if($category->id==$data->sub_category->category->id)
                            
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6 pb-3">
                                <div class="product-cart-wrap mb-xs-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{url('/product_details',$data->id)}}">
                                                <img class="default-img" src="{{asset('/images/products/'.$data->image)}}" alt="">
                                                <img class="hover-img" src="{{asset('/images/products/'.$data->image_hover)}}" alt="">
                                            </a>
                                        </div>
                                        <!--<div class="product-action-1">-->
                                        <!--    <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>-->
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
                                        <!--<div class="rating-result" title="">-->
                                        <!--    <span>-->
                                        <!--        <span></span>-->
                                        <!--    </span>-->
                                        <!--</div>-->
                                        Minimum Order : {{$data->min_quantity}} {{$data->unit->name}}
                                        @if($data->discount)
                                        <div class="product-price">
                                            @php $new=$data->sale_price-(($data->sale_price*$data->discount)/100); @endphp
                                            <span>{{$new}} tk </span>
                                            <span class="old-price">{{$data->sale_price}} tk</span>
                                        </div>
                                        @else
                                        <div class="product-price">
                                            <span>{{$data->sale_price}} tk</span>
                                            <span class="text-dark fw-none">per</span>
                                            <span>{{$data->unit->name}}</span>
                                        </div>
                                        @endif
                                        <!--<div class="product-action-1 show">-->
                                        <!--    <a aria-label="Order Now" class="action-btn hover-up"><i class="fi-rs-shopping-bag-add"></i></a>-->
                                        <!--</div>-->
                                        <div>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#OrderNow{{$data->id}}" class="btn mt-2 d-block">Contact supplier</a>
                                        </div>
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
                                                            <input type="text" name="name" class="form-control my-2">
                                                        </div>
                                                        <div class="col-md-6 pb-3">
                                                            <label>Your Mobile * :</label>
                                                            <input type="number" name="mobile" class="form-control my-2">
                                                        </div>
                                                        <div class="col-md-6 pb-3">
                                                            <label>Order Quantity * : [minimum : {{$data->min_quantity}} {{$data->unit->name}}] </label>
                                                            <input type="number" name="quantity" class="form-control my-2">
                                                        </div>
                                                        <div class="col-md-6 pb-3">
                                                            <label>Your Email :</label>
                                                            <input type="email" name="email" class="form-control my-2">
                                                        </div>
                                                        <div class="col-12 pb-3">
                                                            <label>Message :</label>
                                                            <textarea name="message" cols="33" rows="2" style="min-height:0;"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Order</button>
                                                </div>
                                                </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            @endif
                            @endif
                            @endforeach
                            @endforeach

                        </div>
                    </div>
                    <!--3-->
                    <div class="tab-pane fade" id="tab-two" role="tabpanel" aria-labelledby="tab-two">
                        <div class="row product-grid-4">

                            @php $new=0; @endphp
                            @foreach($categories as $category)
                            @foreach($products as $data)
                            @if($data->type=='Export')
                            @if($category->id==$data->sub_category->category->id)
                            
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6 pb-3">
                                <div class="product-cart-wrap mb-xs-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{url('/product_details',$data->id)}}">
                                                <img class="default-img" src="{{asset('/images/products/'.$data->image)}}" alt="">
                                                <img class="hover-img" src="{{asset('/images/products/'.$data->image_hover)}}" alt="">
                                            </a>
                                        </div>
                                        <!--<div class="product-action-1">-->
                                        <!--    <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>-->
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
                                        <!--<div class="rating-result" title="">-->
                                        <!--    <span>-->
                                        <!--        <span></span>-->
                                        <!--    </span>-->
                                        <!--</div>-->
                                        Minimum Order : {{$data->min_quantity}} {{$data->unit->name}}
                                        @if($data->discount)
                                        <div class="product-price">
                                            @php $new=$data->sale_price-(($data->sale_price*$data->discount)/100); @endphp
                                            <span>{{$new}} tk </span>
                                            <span class="old-price">{{$data->sale_price}} tk</span>
                                        </div>
                                        @else
                                        <div class="product-price">
                                            <span>{{$data->sale_price}} tk</span>
                                            <span class="text-dark fw-none">per</span>
                                            <span>{{$data->unit->name}}</span>
                                        </div>
                                        @endif
                                        <!--<div class="product-action-1 show">-->
                                        <!--    <a aria-label="Order Now" class="action-btn hover-up"><i class="fi-rs-shopping-bag-add"></i></a>-->
                                        <!--</div>-->
                                        <div>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#OrderNow{{$data->id}}" class="btn mt-2 d-block">Contact supplier</a>
                                        </div>
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
                                                        <input type="text" name="name" class="form-control my-2">
                                                    </div>
                                                    <div class="col-md-6 pb-3">
                                                        <label>Your Mobile * :</label>
                                                        <input type="number" name="mobile" class="form-control my-2">
                                                    </div>
                                                    <div class="col-md-6 pb-3">
                                                        <label>Order Quantity * : [minimum : {{$data->min_quantity}} {{$data->unit->name}}] </label>
                                                        <input type="number" name="quantity" class="form-control my-2">
                                                    </div>
                                                    <div class="col-md-6 pb-3">
                                                        <label>Your Email :</label>
                                                        <input type="email" name="email" class="form-control my-2">
                                                    </div>
                                                    <div class="col-12 pb-3">
                                                        <label>Message :</label>
                                                        <textarea name="message" cols="33" rows="2" style="min-height:0;"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Order</button>
                                            </div>
                                            </form>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            @endif
                            @endif
                            @endforeach
                            @endforeach

                        </div>
                    </div>

                </div>

            </div>
        </section>

        <section class="banner-2 section-padding pb-0">
            <div class="container">
                <div class="banner-img banner-big wow fadeIn animated f-none">
                    <img src="{{asset('/SurfsideMedia/assets/imgs/banner/banner-4.png')}}" alt="">
                    <div class="banner-text d-md-block d-none">
                        <h4 class="mb-15 mt-40 text-brand">Repair Services</h4>
                        <h1 class="fw-600 mb-20">We're an Apple <br>Authorised Service Provider</h1>
                        <a href="shop.html" class="btn">Learn More <i class="fi-rs-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </section>

        <section class="banners mb-15">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="banner-img wow fadeIn animated">
                            <img src="{{asset('/SurfsideMedia/assets/imgs/banner/banner-1.png')}}" alt="">
                            <div class="banner-text">
                                <span>Smart Offer</span>
                                <h4>Save 20% on <br>Woman Bag</h4>
                                <a href="shop.html">Shop Now <i class="fi-rs-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="banner-img wow fadeIn animated">
                            <img src="{{asset('/SurfsideMedia/assets/imgs/banner/banner-2.png')}}" alt="">
                            <div class="banner-text">
                                <span>Sale off</span>
                                <h4>Great Summer <br>Collection</h4>
                                <a href="shop.html">Shop Now <i class="fi-rs-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 d-md-none d-lg-flex">
                        <div class="banner-img wow fadeIn animated  mb-sm-0">
                            <img src="{{asset('/SurfsideMedia/assets/imgs/banner/banner-3.png')}}" alt="">
                            <div class="banner-text">
                                <span>New Arrivals</span>
                                <h4>Shop Today’s <br>Deals & Offers</h4>
                                <a href="shop.html">Shop Now <i class="fi-rs-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-padding">
            <div class="container wow fadeIn animated">
                <h3 class="section-title mb-20"><span>New</span> Arrivals</h3>
                <div class="carausel-6-columns-cover position-relative">
                    <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-2-arrows"></div>
                    <div class="carausel-6-columns carausel-arrow-center" id="carausel-6-columns-2">

                        @php $new=0; @endphp
                        @foreach($products as $data)
                        <div class="product-cart-wrap small hover-up">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="{{url('/product_details',$data->id)}}">
                                        <img class="default-img" src="{{asset('/images/products/'.$data->image)}}" alt="">
                                        <img class="hover-img" src="{{asset('/images/products/'.$data->image_hover)}}" alt="">
                                    </a>
                                </div>
                                <!--<div class="product-action-1">-->
                                <!--    <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal">-->
                                <!--        <i class="fi-rs-eye"></i></a>-->
                                <!--    <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="wishlist.php" tabindex="0"><i class="fi-rs-heart"></i></a>-->
                                <!--    <a aria-label="Compare" class="action-btn small hover-up" href="compare.php" tabindex="0"><i class="fi-rs-shuffle"></i></a>-->
                                <!--</div>-->
                                @if($data->discount)
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="hot">-{{$data->discount}}%</span>
                                </div>
                                @endif
                            </div>
                            <div class="product-content-wrap">
                                <h2><a href="{{url('/product_details',$data->id)}}">{{$data->title}}</a></h2>
                                <div class="rating-result" title="90%">
                                    <span>
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
                                @endif
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </section>

        <section class="section-padding">
            <div class="container">
                <h3 class="section-title mb-20 wow fadeIn animated"><span>Featured</span> Brands</h3>
                <div class="carausel-6-columns-cover position-relative wow fadeIn animated">
                    <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-3-arrows"></div>
                    <div class="carausel-6-columns text-center" id="carausel-6-columns-3">
                        <div class="brand-logo">
                            <img class="img-grey-hover" src="{{asset('/SurfsideMedia/assets/imgs/banner/brand-1.png')}}" alt="">
                        </div>
                        <div class="brand-logo">
                            <img class="img-grey-hover" src="{{asset('/SurfsideMedia/assets/imgs/banner/brand-2.png')}}" alt="">
                        </div>
                        <div class="brand-logo">
                            <img class="img-grey-hover" src="{{asset('/SurfsideMedia/assets/imgs/banner/brand-3.png')}}" alt="">
                        </div>
                        <div class="brand-logo">
                            <img class="img-grey-hover" src="{{asset('/SurfsideMedia/assets/imgs/banner/brand-4.png')}}" alt="">
                        </div>
                        <div class="brand-logo">
                            <img class="img-grey-hover" src="{{asset('/SurfsideMedia/assets/imgs/banner/brand-5.png')}}" alt="">
                        </div>
                        <div class="brand-logo">
                            <img class="img-grey-hover" src="{{asset('/SurfsideMedia/assets/imgs/banner/brand-6.png')}}" alt="">
                        </div>
                        <div class="brand-logo">
                            <img class="img-grey-hover" src="{{asset('/SurfsideMedia/assets/imgs/banner/brand-3.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

@endsection
