@extends('layouts.NiceAdmin')

@section('content')

<main id="main" class="main">

<div class=""></div>

<!-- Add -->
<div class="modal fade" id="Add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Category</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data"> @csrf
      <div class="modal-body">
        <div class="row">
            <div class="col-12 pb-3">
                <label>Category Name :</label>
                <input type="text" name="name" required class="form-control my-2">
            </div>
            <div class="col-12 pb-3">
                <label>Category Image :</label>
                <input type="file" name="image" required class="form-control my-2">
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



<div class="pagetitle">
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Dashboard</a></li>
      <li class="breadcrumb-item active">Category List</li>
    </ol>
  </nav>
</div>

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col"><h5 class="card-title">Category List</h5></div>
                <div class="col text-end align-self-center"><a href="#" data-bs-toggle="modal" data-bs-target="#Add" class="btn btn-primary">Add Category</a></div>
            </div>
          <div class="table-responsive">
              <table class="table datatable table-responsive">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Category_Name</th>
                    <th>Image</th>
                    <th>Sub_Category_Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($categories as $data)
                  <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$data->name}}</td>
                    <td><img src="{{asset('/images/categories/'.$data->image)}}" style="width:40px;height:auto;" alt=""></td>
                    <td>
                      @php $co=0; @endphp
                      @foreach($data->sub_categories as $data2)
                        <a href="#" data-bs-toggle="modal" data-bs-target="#Edit2{{$data2->id}}" class="btn btn-outline-success px-1 py-0 mb-1"><i class="bi bi-pencil-fill"></i></a>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#Delete2{{$data2->id}}" class="btn btn-outline-danger px-1 py-0 mb-1"><i class="bi bi-trash-fill"></i></a>
                        {{++$co}} - {{ $data2->name }}<br>

                        <!-- Edit2 -->
                        <div class="modal fade" id="Edit2{{$data2->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Sub Category</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <form action="{{route('subcategories.update',$data2->id)}}" method="post" enctype="multipart/form-data"> @csrf @method('put')
                              <div class="modal-body">
                                <div class="row">
                                    <div class="col-12 pb-3">
                                        <label>Sub Category Name :</label>
                                        <input type="text" name="name" required value="{{$data2->name}}" class="form-control my-2">
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

                        <!-- Delete2 -->
                        <div class="modal fade" id="Delete2{{$data2->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Sub Category</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body text-center fs-3 text-danger">
                                <span class="fs-6">Deleted all Product related this Sub Category.</span><br>
                                Are you sure ?
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <form action="{{route('subcategories.destroy',$data2->id)}}" method="post"> @csrf @method('delete')
                                <button type="submit" class="btn btn-danger">Yes</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>

                      @endforeach
                        <a href="#" data-bs-toggle="modal" data-bs-target="#Add2{{$data->id}}" class="btn btn-outline-primary px-4 py-0 mb-1"><i class="bi bi-plus-lg"></i></a>

                        <!-- Add2 -->
                        <div class="modal fade" id="Add2{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Sub Category</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <form action="{{route('subcategories.store')}}" method="post" enctype="multipart/form-data"> @csrf
                              <input type="hidden" name="category_id" value="{{$data->id}}">
                              <div class="modal-body">
                                <div class="row">
                                    <div class="col-12 pb-3">
                                        <label>Sub Category Name :</label>
                                        <input type="text" name="name" required class="form-control my-2">
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

                    </td>
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
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Category</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <form action="{{route('categories.update',$data->id)}}" method="post" enctype="multipart/form-data"> @csrf @method('put')
                          <div class="modal-body">
                            <div class="row">
                                <div class="col-12 pb-3">
                                    <label>Category Name :</label>
                                    <input type="text" name="name" required value="{{$data->name}}" class="form-control my-2">
                                </div>
                                <div class="col-12 pb-3">
                                    <label>Category Image :
                                        <img src="{{asset('/images/categories/'.$data->image)}}" style="width:40px;height:auto;" alt="">
                                    </label>
                                    <input type="file" name="image" class="form-control my-2">
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
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Category</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body text-center fs-3 text-danger">
                            <span class="fs-6">Deleted all Product and all subCategory related this Category.</span><br>
                            Are you sure ?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <form action="{{route('categories.destroy',$data->id)}}" method="post"> @csrf @method('delete')
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
