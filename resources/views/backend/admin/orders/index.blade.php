@extends('layouts.NiceAdmin')

@section('content')

<main id="main" class="main">

<div class=""></div>



<div class="pagetitle">
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Dashboard</a></li>
      <li class="breadcrumb-item active">Order List</li>
    </ol>
  </nav>
</div>

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
              <table class="table datatable table-responsive">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Quantity</th>
                    <th>Message</th>
                    <th>Product</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($orders as $data)
                  <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->mobile}}</td>
                    <td>{{$data->email}}</td>
                    <td>{{$data->quantity}}</td>
                    <td>{{$data->message}}</td>
                    <td>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#View{{$data->id}}" class="btn btn-primary px-1 py-0 mb-1">View</a>
                    </td>
                    <td>{{$data->status}}</td>
                    <td>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#Edit{{$data->id}}" class="btn btn-outline-success px-1 py-0 mb-1"><i class="bi bi-pencil-fill"></i></a>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#Delete{{$data->id}}" class="btn btn-outline-danger px-1 py-0 mb-1"><i class="bi bi-trash-fill"></i></a>
                    </td>
                  </tr>

                    <!-- View -->
                    <div class="modal fade" id="View{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <h3>Product Information</h3>
                            <hr>
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    @if($data->product)
                                        <span><span class="fw-bold">Name :</span> {{$data->product->title}}</span> <br>
                                        <span><span class="fw-bold">Type :</span> {{$data->product->type}}</span> <br>
                                        <span><span class="fw-bold">Price :</span> {{$data->product->sale_price}} taka per ({{$data->product->unit->name}})</span> <br>
                                        <img src="{{asset('images/products/'.$data->product->image)}}" alt="" class="img-fluid p-5 rounded">
                                    @else
                                        <span>Product not found</span>
                                    @endif
                                </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Edit -->
                    <div class="modal fade" id="Edit{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit User</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <form action="{{route('orders.update',$data->id)}}" method="post" enctype="multipart/form-data"> @csrf @method('put')
                          <div class="modal-body">
                            <div class="row">

                                <div class="col-12 pb-3">
                                    <label>Status :</label>
                                    <input type="text" name="name" required value="" class="form-control my-2">
                                </div>

                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success">Save Changes</button>
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>

                    <!-- Delete -->
                    <div class="modal fade" id="Delete{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Order</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body text-center fs-3 text-danger">
                            {{-- <span class="fs-6">Deleted all Product related this Unit.</span><br> --}}
                            Are you sure ?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <form action="{{route('orders.destroy',$data->id)}}" method="post"> @csrf @method('delete')
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


</main>

@endsection
