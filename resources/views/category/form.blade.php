@extends('layouts.app')
@section('title', isset($category) ? 'Edit Category' : 'Add Category')
@section('content')
<div class="container">
    <form action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}" method="POST">
        @csrf
        @if(isset($category))
            @method('PUT')
        @endif
        <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $category->name ?? '') }}" required>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection