@extends('layouts.app')
@section('title', 'Cart')
@section('content')
<div class="container">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cartItems as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>${{ $item->price }}</td>
                    <td>
                        <a href="{{ route('cart.remove', $item->id) }}" class="btn btn-danger btn-sm">Remove</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection