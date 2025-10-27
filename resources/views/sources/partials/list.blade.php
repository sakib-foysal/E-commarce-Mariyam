<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone Number</th>
            <th>NID</th>
            <th>Description</th>
            <th>Address</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sources as $source)
        <tr>
            <td>{{ $source->id }}</td>
            <td>{{ $source->name }}</td>
            <td>{{ $source->phone_number }}</td>
            <td>{{ $source->nid }}</td>
            <td>{{ Str::limit($source->description, 50) }}</td>
            <td>{{ Str::limit($source->address, 50) }}</td>
            <td>
                @if($source->image)
                    <img src="{{ asset('storage/' . $source->image) }}" alt="Image" width="50">
                @else
                    No Image
                @endif
            </td>
            <td>
                <a href="{{ route('sources.edit', $source->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('sources.destroy', $source->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
