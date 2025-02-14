@extends('layouts.app')
@section('title', 'Wishlist')
@section('content')
<div class="container">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>User</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($wishlistItems as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td>
                        <a href="{{ route('wishlist.remove', $item->id) }}" class="btn btn-danger btn-sm">Remove</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection