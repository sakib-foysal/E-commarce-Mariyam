@extends('layouts.NiceAdmin')

@section('content')
<div class=""></div>

<!-- Add -->
<div class="modal fade" id="Add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('earns.store')}}" method="post" enctype="multipart/form-data"> @csrf
      <div class="modal-body">
        <div class="row">
            
            <div class="col-12 pb-3">
                <label>Earn Name :</label>
                <select name="earnname_id" class="form-select my-2" required>
                    <option value="" hidden>Choose</option>
                    @foreach($earnnames as $data)
                    <option value="{{$data->id}}">{{$data->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 pb-3">
                <label>Amount :</label>
                <input type="number" name="amount" class="form-control my-2" required>
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
      <li class="breadcrumb-item active">Earn List</li>
    </ol>
  </nav>
</div>

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col"><h5 class="card-title">Earn List</h5></div>
                <div class="col text-end align-self-center"><a href="#" data-bs-toggle="modal" data-bs-target="#Add" class="btn btn-primary">Add New</a></div>
            </div>
          <div class="table-responsive">
              <table class="table datatable table-responsive">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Earn Name</th>
                    <th>Amount</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($earns as $data)
                  <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$data->earnname->title}}</td>
                    <td>{{$data->amount}}</td>
                    <td>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#Edit{{$data->id}}" class="btn btn-outline-success px-1 py-0 mb-1"><i class="bi bi-pencil-fill"></i></a>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#Delete{{$data->id}}" class="btn btn-outline-danger px-1 py-0 mb-1"><i class="bi bi-trash-fill"></i></a>
                    </td>
                  </tr>

                    <!-- Edit -->
                    <div class="modal fade" id="Edit{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <form action="{{route('earns.update',$data->id)}}" method="post" enctype="multipart/form-data"> @csrf @method('put')
                          <div class="modal-body">
                            <div class="row">

                                <div class="col-12 pb-3">
                                    <label>Amount :</label>
                                    <input type="number" name="amount" value="{{$data->amount}}" class="form-control my-2" required>
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
                            <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body text-center fs-3 text-danger">
                            Are you sure ?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <form action="{{route('earns.destroy',$data->id)}}" method="post"> @csrf @method('delete')
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
