<!-- resources/views/form-submissions/index.blade.php -->

@extends('layouts.NiceAdmin')

@section('content')
<div class="container">
    <h1>Form Submissions</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Message</th>
                <th>Submitted At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($submissions as $submission)
            <tr>
                <td>{{ $submission->id }}</td>
                <td>{{ $submission->name }}</td>
                <td>{{ $submission->email }}</td>
                <td>{{ $submission->phone }}</td>
                <td>{{ $submission->message }}</td>
                <td>{{ $submission->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
