@extends('layouts.app')
@section('title', isset($product) ? 'Edit Product' : 'Add Product')
@section('content')
<div class="container">
    <form action="{{ isset($product) ? route('products.update', $product->id) : route('products.store') }}" method="POST">
        @csrf
        @if(isset($product))
            @method('PUT')
        @endif
        <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $product->name ?? '') }}" required>
        </div>
        <div class="form-group">
            <label>Category:</label>
            <select name="category_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ isset($product) && $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Price:</label>
            <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $product->price ?? '') }}" required>
        </div>
        <div class="form-group">
            <label>Stock:</label>
            <input type="number" name="stock" class="form-control" value="{{ old('stock', $product->stock ?? '') }}" required>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection