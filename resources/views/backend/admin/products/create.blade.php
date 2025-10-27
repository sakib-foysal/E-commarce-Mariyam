@extends('layouts.NiceAdmin')

@section('content')

<main id="main" class="main">

<div class="pagetitle">
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Dashboard</a></li>
      <li class="breadcrumb-item active">Product Create Form</li>
    </ol>
  </nav>
</div>

<section class="section">
  <div class="row">

    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col"><h5 class="card-title">Product Create Form</h5></div>
                <div class="col text-end align-self-center"><a href="{{route('products.index')}}" class="btn btn-primary">Product List</a></div>
            </div>
          <!-- Floating Labels Form -->
          <form action="{{route('products.store')}}" method="post" class="row g-3" enctype="multipart/form-data"> @csrf

            <div class="col-md-6">
                <label for="">Product Name *</label>
                <input type="text" name="title" required value="{{old('title')}}" class="form-control mt-2 mb-3 @error('title') is-invalid @enderror" id="title">
                @error('title') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-6">
                <label for="">Product Slug *</label>
                <input type="text" name="slug" value="{{old('slug')}}" class="form-control mt-2 mb-3" id="slug">
            </div>
            <div class="col-md-6">
                <label for="">Product Sale Price *</label>
                <input type="number" name="sale_price" required value="{{old('sale_price')}}" class="form-control mt-2 mb-3" id="">
            </div>
            <div class="col-md-6">
                <label for="">Minimum Order Quantity *</label>
                <input type="number" name="min_quantity" required value="{{old('min_quantity')}}" class="form-control mt-2 mb-3" id="">
            </div>
            <div class="col-md-6">
                <label for="">Product Image *</label>
                <input type="file" name="image" required accept="image/*" class="form-control mt-2 mb-3" id="">
            </div>
            <div class="col-md-6">
                <label for="">Product Image Hover</label>
                <input type="file" name="image_hover" accept="image/*" class="form-control mt-2 mb-3" id="">
            </div>
            <div class="col-md-6">
                <label for="">Category *</label>
                <select id="dropdown-one" name="category_id" required class="form-select mt-2 mb-3" id="">
                  <option value="" hidden>Choose</option>
                  @foreach($categories as $data)
                  <option value="{{$data->id}}">{{$data->name}}</option>
                  @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="">Sub Category *</label>
                <select id="dropdown-two" name="sub_category_id" required class="form-select mt-2 mb-3" id=""></select>
            </div>
            <div class="col-md-6">
                <label for="">Type *</label>
                <select name="type" required class="form-select mt-2 mb-3" id="">
                  <option value="" hidden>Choose</option>
                  <option value="Import">Import</option>
                  <option value="Export">Export</option>
                  <option value="Trade">Trade</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="">Unit *</label>
                <select name="unit_id" required class="form-select mt-2 mb-3" id="">
                  <option value="" hidden>Choose</option>
                  @foreach($units as $data)
                  <option value="{{$data->id}}">{{$data->name}}</option>
                  @endforeach
                </select>
            </div>
            <div class="col-12">
                <label for="">Description</label>
                <textarea name="description" class="form-control mt-2 mb-3" id="">{{old('description')}}</textarea>
            </div>
            <div class="col-12">
                <label for="">Custom Description</label>
                <textarea name="custom_description" class="form-control mt-2 mb-3" id="">{{old('custom_description')}}</textarea>
            </div>

            <div class="text-center">
              <button type="submit" class="btn btn-primary px-5">Save</button>
              <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
          </form><!-- End floating Labels Form -->

        </div>
      </div>

    </div>
  </div>
</section>





<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('#dropdown-one').on('change', function () {
            var idFirst = this.value;
            $("#dropdown-two").html('');
            $.ajax({
                url: "{{url('/fetch_sub_categories')}}",
                type: "POST",
                data: { category_id: idFirst, _token: '{{csrf_token()}}' },
                dataType: 'json',
                success: function (result) {
                    $('#dropdown-two').html('<option value="" hidden>Choose</option>');
                    $.each(result.sub_categories, function (key, value) {
                        $("#dropdown-two").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            });
        });
    });
</script>

<!--Slug Generate Start-->
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const titleInput = document.getElementById('title');
      const slugInput = document.getElementById('slug');
      titleInput.addEventListener('input', function () {
        const titleValue = titleInput.value.trim().toLowerCase();
        const slugValue = titleValue.replace(/\s+/g, '-').replace(/[^a-z0-9-]/g, '');
        slugInput.value = slugValue;
      });
    });
  </script>
<!--Slug Generate End-->



<script>
    function addImage() {
        var container = document.getElementById('imageRepeater');
        var newRow = container.firstElementChild.cloneNode(true);
        container.appendChild(newRow);
    }
    function deleteImage(button) {
      var row = button.closest('.imageRepeater');
      row.parentNode.removeChild(row);
    }
    function addVariant() {
        var container = document.getElementById('repeaterVariant');
        var newRow = container.firstElementChild.cloneNode(true);
        container.appendChild(newRow);
    }
    function deleteVariant(button) {
      var row = button.closest('.repeaterVariant');
      row.parentNode.removeChild(row);
    }
</script>
@endsection
