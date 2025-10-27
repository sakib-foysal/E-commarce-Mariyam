@extends('layouts.NiceAdmin')

@section('content')
<div class="container">
    <h1>Edit Source</h1>

    <form action="{{ route('sources.update', $source->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $source->name }}" required>
        </div>

        <div class="mb-3">
            <label for="phone_number" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $source->phone_number }}" required>
        </div>

        <div class="mb-3">
            <label for="nid" class="form-label">NID</label>
            <input type="text" class="form-control" id="nid" name="nid" value="{{ $source->nid }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ $source->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea class="form-control" id="address" name="address" rows="3" required>{{ $source->address }}</textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
            @if($source->image)
                <img src="{{ asset('storage/' . $source->image) }}" alt="Current Image" width="100" class="mt-2">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('sources.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
