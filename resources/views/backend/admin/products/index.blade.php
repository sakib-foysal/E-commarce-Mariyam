@extends('layouts.NiceAdmin')

@section('content')

<main id="main" class="main">


<div class="pagetitle">
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Dashboard</a></li>
      <li class="breadcrumb-item active">Product List</li>
    </ol>
  </nav>
</div>

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col"><h5 class="card-title">Product List</h5></div>
                <div class="col text-end align-self-center"><a href="{{route('products.create')}}" class="btn btn-primary">Create Product</a></div>
            </div>
          <div class="table-responsive">
              <table class="table datatable table-responsive">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Action</th>
                    <th>Type</th>
                    <th>Product_Title2</th>
                    <th>Front_Image</th>
                    <th>Back_Image</th>
                    <th>Sale_price</th>
                    <th>MinOrderQty</th>
                    <th>Quantity</th>
                    <th>Unit</th>
                  </tr>
                </thead>
                <tbody>
                  @php $q=0; @endphp
                  @foreach($products as $data)
                  <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>
                        <a href="{{route('products.edit',$data->id)}}" class="btn btn-outline-success"><i class="bi bi-pencil-fill"></i></a>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#Delete{{$data->id}}" class="btn btn-outline-danger"><i class="bi bi-trash-fill"></i></a>
                    </td>
                    <td>{{$data->type}}</td>
                    <td>
                        {{$data->title}}<br>
                        <!--{{$data->sub_category->name}}<br>-->
                        <!--{{$data->sub_category->category->name}}-->
                    </td>
                    <td><img src="{{asset('/images/products/'.$data->image)}}" style="width:70px;height:auto;" alt=""></td>
                    <td><img src="{{asset('/images/products/'.$data->image_hover)}}" style="width:70px;height:auto;" alt=""></td>
                    <td>{{$data->sale_price}}</td>
                    <td>{{$data->min_quantity}}</td>
                    <td>{{$q}}</td>
                    <td>{{$data->unit->name}}</td>
                    @php $q=0; @endphp
                  </tr>

                    <!-- Delete -->
                    <div class="modal fade" id="Delete{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body text-center fs-3 text-danger">
                            <span class="fs-6">Deleted all productVariant related this Product.</span><br>
                            Are you sure ?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <form action="{{route('products.destroy',$data->id)}}" method="post"> @csrf @method('delete')
                            <button type="submit" class="btn btn-danger">Yes</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  @endforeach
                </tbody>
              </table>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>




@endsection
