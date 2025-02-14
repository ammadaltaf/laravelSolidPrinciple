@extends('layouts.app')
@section('title', 'Notifications')
@section('content')
<div class="container">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Message</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($notifications as $notification)
                <tr>
                    <td>{{ $notification->id }}</td>
                    <td>{{ $notification->message }}</td>
                    <td>{{ $notification->status }}</td>
                    <td>{{ $notification->created_at }}</td>
                    <td>
                        <a href="{{ route('notifications.show', $notification->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('notifications.delete', $notification->id) }}" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection