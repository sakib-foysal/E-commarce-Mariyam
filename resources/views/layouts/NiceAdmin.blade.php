<!DOCTYPE html>
<html lang="en">
  <!-- {{asset('/NiceAdmin/')}} -->
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{$setting->title}}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('images/settings/'.$setting->icon)}}?version={{ time() }}" rel="icon">
    <link href="{{asset('images/settings/'.$setting->icon)}}?version={{ time() }}" rel="apple-touch-icon">
    <link href="{{asset('images/settings/'.$setting->icon)}}?version={{ time() }}" rel="shortcut icon" type="image/x-icon" >

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('/NiceAdmin/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/NiceAdmin/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('/NiceAdmin/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('/NiceAdmin/assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
    <link href="{{asset('/NiceAdmin/assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
    <link href="{{asset('/NiceAdmin/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('/NiceAdmin/assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('/NiceAdmin/assets/css/style.css')}}?version={{ time() }}" rel="stylesheet">

    <!--toastr css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  </head>

  <body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

      <div class="d-flex align-items-center justify-content-between">
        <a href="{{url('/')}}" class="logo d-flex align-items-center">
          <img src="{{asset('images/settings/'.$setting->logo)}}?version={{ time() }}" class="img-fluid" alt="">
          <!--<span class="d-block d-lg-block">{{$setting->title}}</span>-->
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
      </div>

      <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="POST" action="#">
          <input type="text" name="query" placeholder="Search" title="Enter search keyword">
          <button type="submit" title="Search"><i class="bi bi-search"></i></button>
        </form>
      </div>

      <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

          <li class="nav-item d-none d-lg-none">
            <a class="nav-link nav-icon search-bar-toggle " href="#">
              <i class="bi bi-search"></i>
            </a>
          </li>

          <li class="nav-item dropdown pe-3">

            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
              {{-- <img src="{{asset('/NiceAdmin/assets/img/profile-img.jpg')}}" alt="Profile" class="rounded-circle"> --}}
              <span class="d-block d-md-block dropdown-toggle px-2">{{ Auth::user()->name }}</span>
            </a>

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
              <li class="dropdown-header">
                <h6>{{ Auth::user()->name }}</h6>
                <span>{{ Auth::user()->type }}</span>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li>
                <a class="dropdown-item d-flex align-items-center {{'/'==request()->path()?'active':''}}" href="{{url('/')}}">
                  <i class="bi bi-person"></i>
                  <span>Home</span>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <!--<li>-->
              <!--  <a class="dropdown-item d-flex align-items-center {{'goNiceAdminProfile'==request()->path()?'active':''}}" href="/goNiceAdminProfile">-->
              <!--    <i class="bi bi-person"></i>-->
              <!--    <span>My Profile</span>-->
              <!--  </a>-->
              <!--</li>-->
              <!--<li>-->
              <!--  <hr class="dropdown-divider">-->
              <!--</li>-->

              <li>
                <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <i class="bi bi-box-arrow-right"></i>
                  <span>Sign Out</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
              </li>

            </ul><!-- End Profile Dropdown Items -->
          </li><!-- End Profile Nav -->

        </ul>
      </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

      <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
          <a class="nav-link {{'admin/home'==request()->path()?'active':''}}" href="{{route('admin.home')}}">
            <i class="bi bi-speedometer"></i>
            <span>Dashboard</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link
          {{''==request()->path()?'active':'collapsed'}}
          " data-bs-target="#Report" data-bs-toggle="collapse" href="#">
            <i class="bi bi-graph-up-arrow"></i><span>Report</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="Report" class="nav-content collapse
          {{''==request()->path()?'show':''}}
          " data-bs-parent="#sidebar-nav">

            <li>
              <a  class="{{''==request()->path()?'active':''}}">
                <i class="bi bi-circle"></i><span>Daily</span>
              </a>
            </li>
            <li>
              <a  class="{{''==request()->path()?'active':''}}">
                <i class="bi bi-circle"></i><span>Monthly</span>
              </a>
            </li>
            <li>
              <a  class="{{''==request()->path()?'active':''}}">
                <i class="bi bi-circle"></i><span>Total</span>
              </a>
            </li>

          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link
          {{'earnnames'==request()->path()?'active':'collapsed'}}
          {{'expensenames'==request()->path()?'active':'collapsed'}}
          {{'earns'==request()->path()?'active':'collapsed'}}
          {{'expenses'==request()->path()?'active':'collapsed'}}
          " data-bs-target="#Accounting" data-bs-toggle="collapse" href="#">
            <i class="bi bi-calculator"></i><span>Accounting</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="Accounting" class="nav-content collapse
          {{'earnnames'==request()->path()?'show':''}}
          {{'expensenames'==request()->path()?'show':''}}
          {{'earns'==request()->path()?'show':''}}
          {{'expenses'==request()->path()?'show':''}}
          " data-bs-parent="#sidebar-nav">

            <li>
              <a href="{{route('earnnames.index')}}" class="{{'earnnames'==request()->path()?'active':''}}">
                <i class="bi bi-circle"></i><span>Earn Names</span>
              </a>
            </li>
            <li>
              <a href="{{route('earns.index')}}" class="{{'earns'==request()->path()?'active':''}}">
                <i class="bi bi-circle"></i><span>Earns</span>
              </a>
            </li>
            <li>
              <a href="{{route('expensenames.index')}}" class="{{'expensenames'==request()->path()?'active':''}}">
                <i class="bi bi-circle"></i><span>Expense Names</span>
              </a>
            </li>
            <li>
              <a href="{{route('expenses.index')}}" class="{{'expenses'==request()->path()?'active':''}}">
                <i class="bi bi-circle"></i><span>Expenses</span>
              </a>
            </li>

          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link
          {{'products'==request()->path()?'active':'collapsed'}}
          {{'products/create'==request()->path()?'active':'collapsed'}}
          {{'categories'==request()->path()?'active':'collapsed'}}
          {{'units'==request()->path()?'active':'collapsed'}}
          " data-bs-target="#products-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-menu-button-wide"></i><span>Products</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="products-nav" class="nav-content collapse
          {{'products'==request()->path()?'show':''}}
          {{'products/create'==request()->path()?'show':''}}
          {{'categories'==request()->path()?'show':''}}
          {{'units'==request()->path()?'show':''}}
          " data-bs-parent="#sidebar-nav">

            <li>
              <a href="{{route('products.index')}}" class="{{'products'==request()->path()?'active':''}}">
                <i class="bi bi-circle"></i><span>Product List</span>
              </a>
            </li>
            <li>
              <a href="{{route('products.create')}}" class="{{'products/create'==request()->path()?'active':''}}">
                <i class="bi bi-circle"></i><span>Product Create</span>
              </a>
            </li>
            <li>
              <a href="{{route('categories.index')}}" class="{{'categories'==request()->path()?'active':''}}">
                <i class="bi bi-circle"></i><span>Categories</span>
              </a>
            </li>
            <li>
              <a href="{{route('units.index')}}" class="{{'units'==request()->path()?'active':''}}">
                <i class="bi bi-circle"></i><span>Units</span>
              </a>
            </li>
            <li>
                <a href="{{route('orderlist.orderlist')}}" class="{{'units'==request()->path()?'active':''}}">
                  <i class="bi bi-circle"></i><span>Order List</span>
                </a>
              </li>
            <li>
                <a href="{{ route('source') }}">
                    <i class="bi bi-circle"></i><span>Source</span>
                </a>
            </li>
            <li>
                <a href="{{ route('stocks.index') }}">
                    <i class="bi bi-circle"></i><span>Stock</span>
                </a>
            </li>
            <li>
                <a href="{{ route('ofline_sales') }}">
                    <i class="bi bi-circle"></i><span>Offline Sales</span>
                </a>
            </li>

          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link {{'orders'==request()->path()?'active':''}}" href="{{route('orders.index')}}">
            <i class="bi bi-inboxes-fill"></i>
            <span>Orders</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{'users'==request()->path()?'active':''}}" href="{{route('users.index')}}">
            <i class="bi bi-people-fill"></i>
            <span>Users</span>
          </a>
        </li>

        <!-- Add this inside the sidebar navigation menu in the layout file -->

<li class="nav-item">
  <a class="nav-link {{'form-submissions'==request()->path()?'active':''}}" href="{{route('form-submissions.index2')}}">
    <i class="bi bi-table"></i>
    <span>Form Submissions</span>
  </a>
</li>


        <li class="nav-item">
          <a class="nav-link {{'settings'==request()->path()?'active':''}}" href="{{route('settings.index')}}">
            <i class="bi bi-gear-fill"></i>
            <span>Account Settings</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{'socials'==request()->path()?'active':''}}" href="{{route('socials.index')}}">
            <i class="bi bi-browser-edge"></i>
            <span>Social Medias</span>
          </a>
        </li>

        <!--<li class="nav-heading">Pages</li>-->

        <!--<li class="nav-item">-->
        <!--  <a class="nav-link " href="#">-->
        <!--    <i class="bi bi-gear"></i>-->
        <!--    <span>Account Settings</span>-->
        <!--  </a>-->
        <!--</li>-->

      </ul>

    </aside><!-- End Sidebar-->

    <main class="main">

    @yield('content')

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
      <div class="copyright">
        &copy; Copyright <strong><span>{{$setting->title}}</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
        Designed by <a >P2C IT</a>
      </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{asset('/NiceAdmin/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('/NiceAdmin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('/NiceAdmin/assets/vendor/chart.js/chart.umd.js')}}"></script>
    <script src="{{asset('/NiceAdmin/assets/vendor/echarts/echarts.min.js')}}"></script>
    <script src="{{asset('/NiceAdmin/assets/vendor/quill/quill.min.js')}}"></script>
    <script src="{{asset('/NiceAdmin/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
    <script src="{{asset('/NiceAdmin/assets/vendor/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('/NiceAdmin/assets/vendor/php-email-form/validate.js')}}"></script>

    <!-- Template Main JS File -->
    <script src="{{asset('/NiceAdmin/assets/js/main.js')}}"></script>

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

  </body>

</html>
