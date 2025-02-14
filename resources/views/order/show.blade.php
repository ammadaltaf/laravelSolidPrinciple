@extends('layouts.app')
@section('title', 'Order Details')
@section('content')
<div class="container">
    <h3>Order #{{ $order->id }}</h3>
    <p><strong>Customer Name:</strong> {{ $order->customer_name }}</p>
    <p><strong>Total Amount:</strong> ${{ $order->total_amount }}</p>
    <p><strong>Status:</strong> {{ $order->status }}</p>
    <h4>Order Items</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->items as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>${{ $item->price }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('orders.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection