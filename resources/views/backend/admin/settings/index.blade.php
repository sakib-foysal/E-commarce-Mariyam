@extends('layouts.NiceAdmin')

@section('content')


<main id="main" class="main">

<div class="pagetitle">
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Dashboard</a></li>
      <li class="breadcrumb-item active">Account Settings</li>
    </ol>
  </nav>
</div>

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card p-4">
        <form action="{{route('settings.update',$setting->id)}}" method="post" enctype="multipart/form-data"> @csrf @method('put')
            <div class="row">

                <div class="col-md-6 pb-2">
                    <label for="">Title:</label>
                    <input type="text" name="title" value="{{$setting->title}}" id="" class="form-control my-2" required>
                </div>
                <div class="col-md-6 pb-2">
                    <label for="">Mobile:</label>
                    <input type="text" name="mobile" value="{{$setting->mobile}}" id="" class="form-control my-2">
                </div>
                <div class="col-md-7 pb-2">
                    <label for="">Icon:</label>
                    <img src="{{asset('images/settings/'.$setting->icon)}}" alt="" class="img-fluid"> <br>
                    <span class="text-danger">[ Note: Best image ration (62*62)px ]</span>
                    <input type="file" name="icon" id="" class="form-control my-2">
                </div>
                <div class="col-md-5 pb-2">
                    <label for="">Logo:</label>
                    <img src="{{asset('images/settings/'.$setting->logo)}}" alt="" class="img-fluid"> <br>
                    <span class="text-danger">[ Note: Best image ration (150*62)px ]</span>
                    <input type="file" name="logo" id="" class="form-control my-2">
                </div>
                <div class="col-md-6 pb-2">
                    <label for="">Email:</label>
                    <input type="email" name="email" value="{{$setting->email}}" id="" class="form-control my-2">
                </div>
                <div class="col-md-6 pb-2">
                    <label for="">Facebook:</label>
                    <input type="text" name="facebook" value="{{$setting->facebook}}" id="" class="form-control my-2">
                </div>
                <div class="col-12 pb-2">
                    <label for="">Address:</label>
                    <textarea name="address" id="" cols="30" rows="1" class="form-control my-2">{{$setting->address}}</textarea>
                </div>
                <div class="col-md-4 pb-2">
                    <label for="">B-Kash Number:</label>
                    <input type="text" name="bkash" value="{{$setting->bkash}}" id="" class="form-control my-2">
                </div>
                <div class="col-md-4 pb-2">
                    <label for="">Nagad Number:</label>
                    <input type="text" name="nagad" value="{{$setting->nagad}}" id="" class="form-control my-2">
                </div>
                <div class="col-md-4 pb-2">
                    <label for="">Rocket Number:</label>
                    <input type="text" name="rocket" value="{{$setting->rocket}}" id="" class="form-control my-2">
                </div>
                <div class="col-12 pb-2 text-center">
                    <button type="submit" class="btn btn-primary px-5">Save Changes</button>
                </div>

            </div>
        </form>
      </div>

    </div>
  </div>
</section>

</main>

@endsection
