@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Offline Orders</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Type</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Pay</th>
                    <th>Due</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->title }}</td>
                        <td>{{ $order->type }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ $order->total }}</td>
                        <td>{{ $order->pay }}</td>
                        <td>{{ $order->due }}</td>
                        <td>{{ $order->phone }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
