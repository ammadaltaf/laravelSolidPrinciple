@extends('layouts.app')
@section('title', 'Coupons')
@section('content')
<div class="container">
    <a href="{{ route('coupons.create') }}" class="btn btn-primary mb-3">Add Coupon</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Code</th>
                <th>Discount</th>
                <th>Expiration Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($coupons as $coupon)
                <tr>
                    <td>{{ $coupon->id }}</td>
                    <td>{{ $coupon->code }}</td>
                    <td>{{ $coupon->discount }}%</td>
                    <td>{{ $coupon->expiration_date }}</td>
                    <td>
                        <a href="{{ route('coupons.edit', $coupon->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{ route('coupons.delete', $coupon->id) }}" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection