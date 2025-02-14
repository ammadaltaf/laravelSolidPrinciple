@extends('layouts.app')
@section('title', 'Reviews')
@section('content')
<div class="container">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>User</th>
                <th>Rating</th>
                <th>Comment</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reviews as $review)
                <tr>
                    <td>{{ $review->id }}</td>
                    <td>{{ $review->product->name }}</td>
                    <td>{{ $review->user->name }}</td>
                    <td>{{ $review->rating }}</td>
                    <td>{{ $review->comment }}</td>
                    <td>
                        <a href="{{ route('reviews.delete', $review->id) }}" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection