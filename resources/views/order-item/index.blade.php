@extends('layouts.app')
@section('title', 'Order Items List')
@section('content')
<div class="container">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Order ID</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orderItems as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->order_id }}</td>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>${{ $item->price }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection