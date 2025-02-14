@extends('layouts.app')
@section('title', 'Shipping')
@section('content')
<div class="container">
    <a href="{{ route('shipping.create') }}" class="btn btn-primary mb-3">Add Shipping Method</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Method</th>
                <th>Cost</th>
                <th>Estimated Delivery</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($shippingMethods as $shipping)
                <tr>
                    <td>{{ $shipping->id }}</td>
                    <td>{{ $shipping->method }}</td>
                    <td>${{ number_format($shipping->cost, 2) }}</td>
                    <td>{{ $shipping->estimated_delivery }}</td>
                    <td>
                        <a href="{{ route('shipping.edit', $shipping->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{ route('shipping.delete', $shipping->id) }}" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection