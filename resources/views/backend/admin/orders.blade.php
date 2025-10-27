@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Order Management</h1>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Date</th>
                    <th>Customer</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>#{{ $order->id }}</td>
                    <td>{{ $order->created_at->format('d M Y') }}</td>
                    <td>{{ $order->user->name ?? 'Guest' }}</td>
                    <td>{{ ucfirst($order->order_status) }}</td>
                    <td>
                        <!-- Edit Button to Open Modal -->
                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editOrderStatus{{$order->id}}">
                            Edit
                        </button>
                    </td>
                </tr>

                <!-- Edit Modal -->
                <div class="modal fade" id="editOrderStatus{{$order->id}}" tabindex="-1" aria-labelledby="editOrderStatusLabel{{$order->id}}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editOrderStatusLabel{{$order->id}}">Edit Order #{{ $order->id }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('admin.updateOrderStatus') }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <input type="hidden" name="order_id" value="{{ $order->id }}">
                                    <div class="mb-3">
                                        <label for="orderStatus" class="form-label">Order Status</label>
                                        <select name="order_status" id="orderStatus" class="form-select" required>
                                            <option value="" disabled>Select Status</option>
                                            <option value="processed" {{ $order->order_status == 'processed' ? 'selected' : '' }}>Processed</option>
                                            <option value="shipped" {{ $order->order_status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                                            <option value="delivered" {{ $order->order_status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
