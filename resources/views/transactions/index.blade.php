@extends('layouts.app')
@section('title', 'Transactions')
@section('content')
<div class="container">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Order ID</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->id }}</td>
                    <td>{{ $transaction->order_id }}</td>
                    <td>${{ number_format($transaction->amount, 2) }}</td>
                    <td>{{ $transaction->status }}</td>
                    <td>{{ $transaction->created_at }}</td>
                    <td>
                        <a href="{{ route('transactions.show', $transaction->id) }}" class="btn btn-info btn-sm">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection