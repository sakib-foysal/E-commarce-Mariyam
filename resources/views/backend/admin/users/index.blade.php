@extends('layouts.NiceAdmin')

@section('content')
<div class=""></div>

<!-- Add -->
<div class="modal fade" id="Add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add New User</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('users.store')}}" method="post" enctype="multipart/form-data"> @csrf
      <div class="modal-body">
        <div class="row">
            <div class="col-12 pb-3">
                <label>Name :</label>
                <input type="text" name="name" class="form-control my-2" required>
            </div>
            <div class="col-12 pb-3">
                <label>Email :</label>
                <input type="email" name="email" class="form-control my-2" required>
            </div>
            <div class="col-12 pb-3">
                <label>Type :</label>
                <select name="type" id="" class="form-control my-2" required>
                    <option value="" hidden>Choose</option>
                    <option value="1">Admin</option>
                    <option value="0">User</option>
                </select>
            </div>
            <div class="col-12 pb-3">
                <label>Password :</label>
                <input type="password" name="password" class="form-control my-2" required>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>

<main id="main" class="main">

<div class="pagetitle">
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Dashboard</a></li>
      <li class="breadcrumb-item active">User List</li>
    </ol>
  </nav>
</div>

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col"><h5 class="card-title">User List</h5></div>
                <div class="col text-end align-self-center"><a href="#" data-bs-toggle="modal" data-bs-target="#Add" class="btn btn-primary">Add User</a></div>
            </div>
          <div class="table-responsive">
              <table class="table datatable table-responsive">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Email</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($users as $data)
                  <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->type}}</td>
                    <td>{{$data->email}}</td>
                    <td>
                        @if ($data->email=='arman.p2c@gmail.com')
                        @else
                        <a href="#" data-bs-toggle="modal" data-bs-target="#Edit{{$data->id}}" class="btn btn-outline-success px-1 py-0 mb-1"><i class="bi bi-pencil-fill"></i></a>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#Delete{{$data->id}}" class="btn btn-outline-danger px-1 py-0 mb-1"><i class="bi bi-trash-fill"></i></a>
                        @endif
                    </td>
                  </tr>

                    <!-- Edit -->
                    <div class="modal fade" id="Edit{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit User</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <form action="{{route('users.update',$data->id)}}" method="post" enctype="multipart/form-data"> @csrf @method('put')
                          <div class="modal-body">
                            <div class="row">

                                <div class="col-12 pb-3">
                                    <label>Name :</label>
                                    <input type="text" name="name" required value="{{$data->name}}" class="form-control my-2">
                                </div>
                                <div class="col-12 pb-3">
                                    <label>Email :</label>
                                    <input type="email" name="email" required value="{{$data->email}}" class="form-control my-2">
                                </div>
                                <div class="col-12 pb-3">
                                    <label>Type :</label>
                                    <select name="type" id="" class="form-select my-2" required>
                                        @if ($data->type=='admin')
                                        <option value="1" hidden>{{$data->type}}</option>
                                        @else
                                        <option value="0" hidden>{{$data->type}}</option>
                                        @endif
                                        <option value="1">Admin</option>
                                        <option value="0">User</option>
                                    </select>
                                </div>

                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Save Changes</button>
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
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete User</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body text-center fs-3 text-danger">
                            {{-- <span class="fs-6">Deleted all Product related this Unit.</span><br> --}}
                            Are you sure ?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <form action="{{route('users.destroy',$data->id)}}" method="post"> @csrf @method('delete')
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

</main><!-- End #main -->


@endsection
