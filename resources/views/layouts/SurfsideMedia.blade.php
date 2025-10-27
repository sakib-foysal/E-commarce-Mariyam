<!DOCTYPE html>
<html class="no-js" lang="en">
<!-- {{asset('/SurfsideMedia/')}} -->
<head>
    <meta charset="utf-8">
    <title>{{$setting->title}}</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Favicons -->
    <link href="{{asset('images/settings/'.$setting->icon)}}?version={{ time() }}" rel="icon">
    <link href="{{asset('images/settings/'.$setting->icon)}}?version={{ time() }}" rel="apple-touch-icon">
    <link href="{{asset('images/settings/'.$setting->icon)}}?version={{ time() }}" rel="shortcut icon" type="image/x-icon" >

    <link rel="stylesheet" href="{{asset('/SurfsideMedia/assets/css/main.css')}}?version={{ time() }}">
    <link rel="stylesheet" href="{{asset('/SurfsideMedia/assets/css/custom.css')}}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rowdies:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Rowdies:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Rowdies:wght@700&family=Young+Serif&display=swap" rel="stylesheet">

    {{-- bootstrap icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!--toastr css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
:root{
  --primary-color1: #53a302;
  --primary-color2: #004274;
}

#searchResults {
    list-style: none;
    padding: 0;
    margin: 0;
    position: absolute;
    background-color: white;
    border: 1px solid #ccc;
    width: 100%;
}

#searchResults li {
    padding: 10px;
    border-bottom: 1px solid #ccc;
    cursor: pointer;
}

#searchResults li:hover {
    background-color: #f0f0f0;
}

</style>
</head>
<body>

    <header class="header-area header-style-1 header-height-2">

        <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="header-wrap">
                    <div class="logo logo-width-1 d-flex align-items-center">
                        @if ($setting->icon)
                        <a href="{{url('/')}}">
                            <img src="{{asset('images/settings/'.$setting->logo)}}?version={{ time() }}" class="img-fluid" alt="logo">
                        </a>
                        @endif

                        <a href="{{url('/')}}"><span class="ps-2 fw-bold fs-4 text-dark" style="font-family: 'Young Serif', serif;" >
                            <!--{{$setting->title}}-->
                        </span></a>
                    </div>
                    <div class="header-right">
                    <div class="search-style-1" style="position: relative;">
    <form id="searchForm" action="javascript:void(0);">
        <input type="text" id="searchQuery" placeholder="Search for items...">
    </form>
    <ul id="searchResults" style="z-index: 999; position: absolute; top: 100%; width: 100%; background-color: white;"></ul>
</div>


                        <div class="header-action-right">
                            <div class="header-action-2">


                                @auth



                                 <div class="header-action-icon-2">
                                    <a class="mini-cart-icon" href="/cart">
                                        <i class="bi bi-cart3"></i>
                                        <span class="pro-count blue">{{ $cartCount ?? '0' }}</span>

                                    </a>
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2">

                                        <div class="shopping-cart-footer">

                                            <div class="shopping-cart-button">
                                                <a href="/cart" class="outline">View cart</a>
                                                <a href="/cart">Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @endauth

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="header-bottom header-bottom-bg-color sticky-bar">
            <div class="container">
                <div class="header-wrap header-space-between position-relative">
                    <!--<div class="logo logo-width-1 d-block d-lg-none">-->
                    <div class="logo logo-width-1 d-flex align-items-center d-lg-none">
                        <a href="{{url('/')}}"><img src="{{asset('images/settings/'.$setting->logo)}}?version={{ time() }}" class="img-fluid" alt="logo"></a>
                        <!--#F15412-->
                        <!--<span class="ps-2 fw-bold fs-4 text-dark" style="font-family: 'Young Serif', serif;" >{{ config('app.name') }}</span>-->
                    </div>
                        <!--<a href="{{url('/')}}"><img src="{{asset('/SurfsideMedia/assets/imgs/logo/logo.png')}}?version={{ time() }}" alt="logo"></a>-->
                    <!--</div>-->
                    <div class="header-nav d-none d-lg-flex">
                        <div class="main-categori-wrap d-none d-lg-block">
                            <a class="categori-button-active" href="#">
                                <span class="fi-rs-apps"></span> Browse Categories
                            </a>
                            <div class="categori-dropdown-wrap categori-dropdown-active-large">
                                <ul>
                                    @foreach($categories as $category)
                                    <li class="has-children">
                                        <a href="#"><i class="surfsidemedia-font-dress"></i>{{$category->name}}</a>
                                        <div class="dropdown-menu">
                                            <ul class="mega-menu d-lg-flex">
                                                <li class="mega-menu-col col-lg-7">
                                                    <ul class="d-lg-flex">
                                                        <li class="mega-menu-col col-lg-6">
                                                            <ul>
                                                                <!--<li><span class="submenu-title">Hot & Trending</span></li>-->
                                                                @foreach($category->sub_categories as $sub_category)
                                                                <li><a class="dropdown-item nav-link nav_item" href="{{url('/sub_category_wise_product',$sub_category->id)}}">{{$sub_category->name}}</a></li>
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>


                                            </ul>
                                        </div>
                                    </li>
                                    @endforeach

                                </ul>

                            </div>
                        </div>
                        <!--main top menu-->
                        <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                            <nav>
                                <ul>
                                    <li><a class="{{'/'==request()->path()?'active':''}}" href="{{url('/')}}">Home</a></li>
                                    <li><a class="{{'shop'==request()->path()?'active':''}}" href="{{route('shop')}}">Shop</a></li>


                                    @auth
                                    <li><a href="#">{{Auth::user()->name}}<i class="fi-rs-angle-down"></i></a>
                                        <ul class="sub-menu">
                                            @if (auth()->user()->type == 'admin')
                                            <li><a href="{{route('admin.home')}}">Dashboard</a></li>
                                            @else
                                            <li><a href="{{route('home')}}">Dashboard</a></li>
                                            @endif

                                            <li>
                                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                                            </li>
                                        </ul>
                                    </li>
                                    @else
                                    <li><a href="{{route('login3')}}">Login</a></li>
                                    <li><a href="{{route('register2')}}">SignUp</a></li>
                                    @endauth
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="hotline d-none d-lg-block">
                        <p><i class="fi-rs-smartphone"></i><span>Toll Free</span> {{$setting->mobile}} </p>
                    </div>
                    <!--<p class="mobile-promotion">Happy <span class="text-brand">Mother's Day</span>. Big Sale Up to 40%</p>-->
                    <div class="header-action-right d-block d-lg-none">
                        <div class="header-action-2">
                            @auth


                            <!--cartlist-->
                            <div class="header-action-icon-2">
                                <a class="mini-cart-icon" href="{{route('orders.index')}}">
                                    <img alt="Surfside Media" src="{{asset('/SurfsideMedia/assets/imgs/theme/icons/icon-cart.svg')}}">
                                    <span class="pro-count white">00</span>
                                </a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                    <ul>
                                        <li>
                                            <div class="shopping-cart-img">
                                                <a href="/cart"><img alt="Surfside Media" src="{{asset('/SurfsideMedia/assets/imgs/shop/thumbnail-3.jpg')}}">Cart</a>
                                            </div>


                                        </li>
                                        <li>
                                            <div class="shopping-cart-img">
                                                <a href="/cart"><img alt="Surfside Media" src="{{asset('/SurfsideMedia/assets/imgs/shop/thumbnail-4.jpg')}}">Cart</a>
                                            </div>


                                        </li>
                                    </ul>

                                </div>
                            </div>
                            @endauth
                            <div class="header-action-icon-2 d-block d-lg-none">
                                <div class="burger-icon burger-icon-white">
                                    <span class="burger-icon-top"></span>
                                    <span class="burger-icon-mid"></span>
                                    <span class="burger-icon-bottom"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>

    <div class="mobile-header-active mobile-header-wrapper-style">
        <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-top">
                <div class="mobile-header-logo">
                    <!--<div class="logo logo-width-1 d-flex align-items-center d-lg-none">-->
                        <a href="{{url('/')}}"><img src="{{asset('images/settings/'.$setting->logo)}}?version={{ time() }}" class="img-fluid" alt="logo"></a>
                        <!--#F15412-->
                        <!--<span class="ps-2 fw-bold fs-4 text-dark" style="font-family: 'Young Serif', serif;" >{{ config('app.name') }}</span>-->
                    <!--</div>-->
                    <!--<a href="{{url('/')}}"><img src="{{asset('/SurfsideMedia/assets/imgs/logo/logo.png')}}?version={{ time() }}" alt="logo"></a>-->
                </div>
                <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                    <button class="close-style search-close">
                        <i class="icon-top"></i>
                        <i class="icon-bottom"></i>
                    </button>
                </div>
            </div>
            <div class="mobile-header-content-area">
                <div class="mobile-search search-style-3 mobile-header-border">
                    <form action="#">
                        <input type="text" placeholder="Search for items…">
                        <button type="submit"><i class="fi-rs-search"></i></button>
                    </form>
                </div>
                <div class="mobile-menu-wrap mobile-header-border">
                    <div class="main-categori-wrap mobile-header-border">
                        <a class="categori-button-active-2" href="#">
                            <span class="fi-rs-apps"></span> Browse Categories
                        </a>
                        <div class="categori-dropdown-wrap categori-dropdown-active-small">
                            <ul>
                                @foreach($categories as $category)
                                <li>
                                    <span class="fw-bold"><i class="surfsidemedia-font-dress"></i>{{$category->name}}</span>
                                    @foreach($category->sub_categories as $sub_category)
                                    <a href="{{url('/sub_category_wise_product',$sub_category->id)}}"><i class="surfsidemedia-font-dress"></i>{{$sub_category->name}}</a>
                                    @endforeach
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- mobile menu start -->
                    <nav>
                        <ul class="mobile-menu">
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="{{url('/')}}">Home</a></li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="{{route('shop')}}">shop</a></li>


                            @auth
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">{{Auth::user()->name}}</a>
                                <ul class="dropdown">
                                    @if (auth()->user()->type == 'admin')
                                    <li><a href="{{route('admin.home')}}">Dashboard</a></li>
                                    @else
                                    <li><a href="{{route('home')}}">Dashboard</a></li>
                                    @endif
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>

                                </ul>
                            </li>
                            @endauth
                        </ul>
                    </nav>
                    <!-- mobile menu end -->
                </div>
                <div class="mobile-header-info-wrap mobile-header-border">
                    <!--<div class="single-mobile-header-info mt-30">-->
                    <!--    <a href="contact.html"> Our location </a>-->
                    <!--</div>-->
                    @auth
                    @else
                    <div class="single-mobile-header-info">
                        <a href="{{ route('login') }}">Log In </a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="{{ route('login') }}">Sign Up</a>
                    </div>
                    @endauth
                    <div class="single-mobile-header-info">
                        <a href="#">{{$setting->mobile}}</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @yield('content')

    <footer class="main">

        <section class="section-padding footer-mid">
            <div class="container pt-15 pb-20">
                <div class="row">

                    <div class="col-lg-6 col-md-6">
                        <div class="widget-about font-md mb-md-5 mb-lg-0">
                            <div class="logo logo-width-1 wow fadeIn animated d-flex align-items-center">
                                <a href="{{url('/')}}"><img src="{{asset('images/settings/'.$setting->logo)}}?version={{ time() }}" alt="logo" class="img-fluid"></a>
                                <!--<span class="ps-2 fw-bold fs-4 text-dark" style="font-family: 'Young Serif', serif;" >{{$setting->title}}</span>-->
                            </div>
                            <h5 class="mt-20 mb-10 fw-600 text-grey-4 wow fadeIn animated">Contact</h5>
                            <p class="wow fadeIn animated">
                                <strong>Address: </strong>{{$setting->address}}
                            </p>
                            <p class="wow fadeIn animated">
                                <strong>Phone: </strong>{{$setting->mobile}}
                            </p>
                            <p class="wow fadeIn animated">
                                <strong>Email: </strong>{{$setting->email}}
                            </p>
                            <h5 class="mb-10 mt-30 fw-600 text-grey-4 wow fadeIn animated">Follow Us</h5>
                            <div class="mobile-social-icon wow fadeIn animated mb-sm-5 mb-md-0">
                            @foreach($socials as $data)
                            <a href="{{$data->link}}" target="_blank">
                                <img src="{{asset('images/socials/'.$data->logo)}}?version={{ time() }}" class="img-fluid" alt="logo">
                            </a>
                            @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <h5 class="widget-title wow fadeIn animated">About</h5>
                        <ul class="footer-list wow fadeIn animated mb-sm-5 mb-md-0">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Delivery Information</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms &amp; Conditions</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3  col-md-3">
                        <h5 class="widget-title wow fadeIn animated">My Account</h5>
                        <ul class="footer-list wow fadeIn animated">
                            <li><a href="my-account.html">My Account</a></li>
                            <li><a href="#">View Cart</a></li>
                            <li><a href="#">My Wishlist</a></li>
                            <li><a href="#">Track My Order</a></li>
                            <li><a href="#">Order</a></li>
                        </ul>
                    </div>
                    <!--<div class="col-lg-4 mob-center">-->
                    <!--    <h5 class="widget-title wow fadeIn animated">Install App</h5>-->
                    <!--    <div class="row">-->
                    <!--        <div class="col-md-8 col-lg-12">-->
                    <!--            <p class="wow fadeIn animated">From App Store or Google Play</p>-->
                    <!--            <div class="download-app wow fadeIn animated mob-app">-->
                    <!--                <a href="#" class="hover-up mb-sm-4 mb-lg-0"><img class="active" src="{{asset('/SurfsideMedia/assets/imgs/theme/app-store.jpg')}}" alt=""></a>-->
                    <!--                <a href="#" class="hover-up"><img src="{{asset('/SurfsideMedia/assets/imgs/theme/google-play.jpg')}}" alt=""></a>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--        <div class="col-md-4 col-lg-12 mt-md-3 mt-lg-0">-->
                    <!--            <p class="mb-20 wow fadeIn animated">Secured Payment Gateways</p>-->
                    <!--            <img class="wow fadeIn animated" src="{{asset('/SurfsideMedia/assets/imgs/theme/payment-method.png')}}" alt="">-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->

                </div>
            </div>
        </section>
        <div class="container pb-20 wow fadeIn animated mob-center">
            <div class="row">
                <div class="col-12 mb-20">
                    <div class="footer-bottom"></div>
                </div>
                <div class="col-lg-6">
                    <p class="float-md-left font-sm text-muted mb-0">
                        <a href="#">Privacy Policy</a> | <a href="#">Terms & Conditions</a>
                    </p>
                </div>
                <div class="col-lg-6">
                    <p class="text-lg-end text-start font-sm text-muted mb-0">
                        &copy; <strong class="text-brand">{{$setting->title}}</strong> All rights reserved
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <style>
        .sIconContainer{
            height:100vh;
            background:transparent;
            display:flex;
            align-items:center;
            position:fixed;
            right:5px;
            top:0px;
            z-index:1000;
        }
        .sIcon{
            opacity:.7;
            width:40px;
            height:auto;
        }
        .sIcon:hover{
            opacity:1;
        }
    </style>
    <div class="sIconContainer">
        <div class=" d-inline-block" >
            @foreach($socials as $data)
            <div class="">
                <a href="{{$data->link}}" target="_blank">
                    <img class="rounded-circle sIcon" src="{{asset('images/socials/'.$data->logo)}}?version={{ time() }}" >
                </a>
            </div>
            @endforeach
        </div>
    </div>

<!-- whatsapp1 -->
<a href="https://wa.me/+8801511194611" class="" target="_blank" style="position: fixed; right:5px; bottom:100px; z-index:1000;">
    <img class="rounded-circle sIcon" src="{{asset('SurfsideMedia/assets/imgs/logo/whatsapp-icon.jpg')}}" >
</a>
    <!--MASSANGER START-->
    <div id="fb-root"></div>
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>
    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "102411262060619");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v18.0'
        });
      };
      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
    <!--MASSANGER END-->

    <script>
        document.getElementById('searchQuery').addEventListener('input', function () {
    let query = this.value;

    // Check if query is not empty
    if (query.length > 0) {
        fetch(`/search-products?query=${query}`)
            .then(response => response.json())
            .then(products => {
                let results = document.getElementById('searchResults');
                results.innerHTML = ''; // Clear previous results

                // Check if products are found
                if (products.length > 0) {
                    products.forEach(product => {
                        let li = document.createElement('li');

                        // Create a link to the product details page
                        let a = document.createElement('a');
                        a.href = `/product_details/${product.id}`;
                        a.textContent = product.title;
                        a.style.display = 'block';
                        a.style.padding = '10px';
                        a.style.textDecoration = 'none';
                        a.style.color = '#000';

                        // Append the link to the list item
                        li.appendChild(a);
                        results.appendChild(li);
                    });
                } else {
                    results.innerHTML = '<li>No products found</li>';
                }
            });
    } else {
        // Clear the results if the query is empty
        document.getElementById('searchResults').innerHTML = '';
    }
});

    </script>

    <!-- Vendor JS-->
    <script src="{{asset('/SurfsideMedia/assets/js/vendor/modernizr-3.6.0.min.js')}}"></script>
    <script src="{{asset('/SurfsideMedia/assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('/SurfsideMedia/assets/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
    <script src="{{asset('/SurfsideMedia/assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('/SurfsideMedia/assets/js/plugins/slick.js')}}"></script>
    <script src="{{asset('/SurfsideMedia/assets/js/plugins/jquery.syotimer.min.js')}}"></script>
    <script src="{{asset('/SurfsideMedia/assets/js/plugins/wow.js')}}"></script>
    <script src="{{asset('/SurfsideMedia/assets/js/plugins/jquery-ui.js')}}"></script>
    <script src="{{asset('/SurfsideMedia/assets/js/plugins/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('/SurfsideMedia/assets/js/plugins/magnific-popup.js')}}"></script>
    <script src="{{asset('/SurfsideMedia/assets/js/plugins/select2.min.js')}}"></script>
    <script src="{{asset('/SurfsideMedia/assets/js/plugins/waypoints.js')}}"></script>
    <script src="{{asset('/SurfsideMedia/assets/js/plugins/counterup.js')}}"></script>
    <script src="{{asset('/SurfsideMedia/assets/js/plugins/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('/SurfsideMedia/assets/js/plugins/images-loaded.js')}}"></script>
    <script src="{{asset('/SurfsideMedia/assets/js/plugins/isotope.js')}}"></script>
    <script src="{{asset('/SurfsideMedia/assets/js/plugins/scrollup.js')}}"></script>
    <script src="{{asset('/SurfsideMedia/assets/js/plugins/jquery.vticker-min.js')}}"></script>
    <script src="{{asset('/SurfsideMedia/assets/js/plugins/jquery.theia.sticky.js')}}"></script>
    <script src="{{asset('/SurfsideMedia/assets/js/plugins/jquery.elevatezoom.js')}}"></script>
    <!-- Template  JS -->
    <script src="{{asset('/SurfsideMedia/assets/js/main.js?v=3.3')}}"></script>
    <script src="{{asset('/SurfsideMedia/assets/js/shop.js?v=3.3')}}"></script></body>

    <!--ajax js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!--toastr js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        @if(Session::has('success'))
            toastr.options={ "closeButton":true, "progressBar":true, }
            toastr.success("{{ session('success')}}")
        @endif
        @if(Session::has('error'))
            toastr.options={ "closeButton":true, "progressBar":true, }
            toastr.error("{{ session('error')}}")
        @endif
    </script>
    <script>
        function updateCartCount() {
    fetch('/cart/count')
        .then(response => response.json())
        .then(data => {
            document.querySelector('.pro-count.blue').textContent = data.count;
        });
}

// Call this function after adding/removing cart items
updateCartCount();

    </script>

</body>
</html>

<!--Developer Information-->
<!--Name: Md Arman Sharif-->
<!--Mobile: 01632109022-->
