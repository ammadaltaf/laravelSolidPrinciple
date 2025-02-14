@extends('layouts.app')
@section('title', 'Payments List')
@section('content')
<div class="container">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Order ID</th>
                <th>Payment Method</th>
                <th>Amount</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($payments as $payment)
                <tr>
                    <td>{{ $payment->id }}</td>
                    <td>{{ $payment->order_id }}</td>
                    <td>{{ $payment->method }}</td>
                    <td>${{ $payment->amount }}</td>
                    <td>{{ $payment->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection