@extends('layouts.SurfsideMedia')

@section('content')
<main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{url('/')}}" rel="nofollow">Home</a>
                    <span></span> Shop
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
                            @foreach($products as $data)
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
                                            <span>{{$data->sale_price}} tk</span>
                                            <span class="text-dark fw-none">per</span>
                                            <span>{{$data->unit->name}}</span>
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
                            @endforeach
                        </div>

                        {{-- <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-start">
                                    <li class="page-item active"><a class="page-link" href="#">01</a></li>
                                    <li class="page-item"><a class="page-link" href="#">02</a></li>
                                    <li class="page-item"><a class="page-link" href="#">03</a></li>
                                    <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                                    <li class="page-item"><a class="page-link" href="#">16</a></li>
                                    <li class="page-item"><a class="page-link" href="#"><i class="fi-rs-angle-double-small-right"></i></a></li>
                                </ul>
                            </nav>
                        </div> --}}

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
                                    <a href="{{url('/import_products')}}">Import Products ({{$import_products}})</a><br>
                                    <a href="{{url('/export_products')}}">Export Products ({{$export_products}})</a><br>
                                    <a href="{{url('/trade_products')}}">Trade Products ({{$trade_products}})</a><br>
                                </li>
                            </ul>
                            <h5 class="section-title style-1 mb-10 wow fadeIn animated">Category</h5>
                            <ul class="categories">
                                @foreach($categories as $data)
                                <li class="pb-3">
                                    <span class="fs-4">{{$data->name}}</span><br>
                                    @foreach($data->sub_categories as $data2)
                                        <a href="{{url('/sub_category_wise_product',$data2->id)}}">{{$data2->name}}</a><br>
                                    @endforeach
                                </li>
                                @endforeach
                            </ul>
                        </div>

                        {{-- <div class="sidebar-widget price_range range mb-30">
                            <div class="widget-header position-relative mb-20 pb-10">
                                <h5 class="widget-title mb-10">Fill by price</h5>
                                <div class="bt-1 border-color-1"></div>
                            </div>
                            <div class="price-filter">
                                <div class="price-filter-inner">
                                    <div id="slider-range"></div>
                                    <div class="price_slider_amount">
                                        <div class="label-input">
                                            <span>Range:</span><input type="text" id="amount" name="price" placeholder="Add Your Price">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group">
                                <div class="list-group-item mb-10 mt-10">
                                    <label class="fw-900">Color</label>
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="">
                                        <label class="form-check-label" for="exampleCheckbox1"><span>Red (56)</span></label>
                                        <br>
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox2" value="">
                                        <label class="form-check-label" for="exampleCheckbox2"><span>Green (78)</span></label>
                                        <br>
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox3" value="">
                                        <label class="form-check-label" for="exampleCheckbox3"><span>Blue (54)</span></label>
                                    </div>
                                    <label class="fw-900 mt-15">Item Condition</label>
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox11" value="">
                                        <label class="form-check-label" for="exampleCheckbox11"><span>New (1506)</span></label>
                                        <br>
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox21" value="">
                                        <label class="form-check-label" for="exampleCheckbox21"><span>Refurbished (27)</span></label>
                                        <br>
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox31" value="">
                                        <label class="form-check-label" for="exampleCheckbox31"><span>Used (45)</span></label>
                                    </div>
                                </div>
                            </div>
                            <a href="shop.html" class="btn btn-sm btn-default"><i class="fi-rs-filter mr-5"></i> Fillter</a>
                        </div> --}}

                        {{-- <div class="sidebar-widget product-sidebar  mb-30 p-30 bg-grey border-radius-10">
                            <div class="widget-header position-relative mb-20 pb-10">
                                <h5 class="widget-title mb-10">New products</h5>
                                <div class="bt-1 border-color-1"></div>
                            </div>
                            <div class="single-post clearfix">
                                <div class="image">
                                    <img src="{{asset('/SurfsideMedia/assets/imgs/shop/thumbnail-3.jpg')}}" alt="#">
                                </div>
                                <div class="content pt-10">
                                    <h5><a href="product-details.html">Chen Cardigan</a></h5>
                                    <p class="price mb-0 mt-5">$99.50</p>
                                    <div class="product-rate">
                                        <div class="product-rating" style="width:90%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-post clearfix">
                                <div class="image">
                                    <img src="{{asset('/SurfsideMedia/assets/imgs/shop/thumbnail-4.jpg')}}" alt="#">
                                </div>
                                <div class="content pt-10">
                                    <h6><a href="product-details.html">Chen Sweater</a></h6>
                                    <p class="price mb-0 mt-5">$89.50</p>
                                    <div class="product-rate">
                                        <div class="product-rating" style="width:80%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-post clearfix">
                                <div class="image">
                                    <img src="{{asset('/SurfsideMedia/assets/imgs/shop/thumbnail-5.jpg')}}" alt="#">
                                </div>
                                <div class="content pt-10">
                                    <h6><a href="product-details.html">Colorful Jacket</a></h6>
                                    <p class="price mb-0 mt-5">$25</p>
                                    <div class="product-rate">
                                        <div class="product-rating" style="width:60%"></div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        {{-- <div class="banner-img wow fadeIn mb-45 animated d-lg-block d-none">
                            <img src="{{asset('/SurfsideMedia/assets/imgs/banner/banner-11.jpg')}}" alt="">
                            <div class="banner-text">
                                <span>Women Zone</span>
                                <h4>Save 17% on <br>Office Dress</h4>
                                <a href="shop.html">Shop Now <i class="fi-rs-arrow-right"></i></a>
                            </div>
                        </div> --}}

                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
