@extends('layouts.NiceAdmin')

@section('content')

<main id="main" class="main">

<div class="container">
    <div class="pagetitle">
      <h1>Source Management</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item">Source</li>
          <li class="breadcrumb-item active">Create</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Create New Source</h5>

              <!-- General Form Elements -->
              <form action="{{ route('sources.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Phone Number</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="phone_number" name="phone_number" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">NID</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nid" name="nid" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Description</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Address</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Image</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Create Source</button>
                  </div>
                </div>
              </form><!-- End General Form Elements -->
            </div>
          </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Source List</h5>
                    <a href="{{ route('sources.index') }}" class="btn btn-info mb-3">View Source List</a>
                    <div class="mb-3">
                        <input type="text" id="search" class="form-control" placeholder="Search by phone number">
                    </div>
                    <div id="sources-list">
                        @foreach(\App\Models\Source::latest()->take(5)->get() as $source)
                        <div class="card mb-2">
                            <div class="card-body">
                                <h5 class="card-title">{{ $source->name }}</h5>
                                <p class="card-text">Phone: {{ $source->phone_number }}</p>
                                <a href="{{ route('sources.edit', $source->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('sources.destroy', $source->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>
<script>
$(document).ready(function(){
    $('#search').on('keyup', function(){
        var search = $(this).val();
        $.ajax({
            url: '{{ route("sources.index") }}',
            type: 'GET',
            data: {search: search, ajax: 1},
            success: function(data){
                $('#sources-list').html(data);
            }
        });
    });
});
</script>

</main>
@endsection
