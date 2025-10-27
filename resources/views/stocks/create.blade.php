@extends('layouts.NiceAdmin')

@section('content')

    <div class="pagetitle">
      <h1>Create Stock</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item">Stock</li>
          <li class="breadcrumb-item active">Create</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Create New Stock</h5>

              <!-- General Form Elements -->
              <form action="{{ route('stocks.store') }}" method="POST">
                @csrf
                <div class="row mb-3">
                  <label for="product_id" class="col-sm-2 col-form-label">Product</label>
                  <div class="col-sm-10">
                    <select name="product_id" id="product_id" class="form-control" required>
                        <option value="" style="background-color: #f8f9fa; color: #000;">Select Product</option>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}" style="background-color: #f8f9fa; color: #000;">{{ $product->title }}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="source_id" class="col-sm-2 col-form-label">Source</label>
                  <div class="col-sm-10">
                    <select name="source_id" id="source_id" class="form-control" required>
                        <option value="" style="background-color: #f8f9fa; color: #000;">Select Source</option>
                        @foreach($sources as $source)
                            <option value="{{ $source->id }}" style="background-color: #f8f9fa; color: #000;">{{ $source->name }} - {{ $source->phone_number }}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
                  <div class="col-sm-10">
                    <input type="number" name="quantity" id="quantity" class="form-control" required min="0">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Create Stock</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>
      </div>
    </section>

  
@endsection
