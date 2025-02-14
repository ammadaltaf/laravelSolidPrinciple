<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            display: flex;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background: #343a40;
            color: white;
            padding: 15px;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px;
            margin: 5px 0;
        }
        .sidebar a:hover {
            background: #495057;
        }
        .content {
            flex-grow: 1;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h4>Admin Panel</h4>
        <a href="{{ route('products.create') }}">Add Product</a>
        <a href="{{ route('products.index') }}">Product List</a>
        <h4>Category</h4>
        <a href="{{ route('categories.create') }}">Add Category</a>
        <a href="{{ route('categories.index') }}">Category List</a>
        <h4>Orders</h4>
        <a href="{{ route('orders.index') }}">Orders</a>
        <h4>Order Items</h4>
        <a href="{{ route('order-items.index') }}">Order Items</a>
        <h4>Payments</h4>
        <a href="{{ route('payments.index') }}">Payments</a>
        <h4>Cart</h4>
        <a href="{{ route('cart.index') }}">Cart</a>
        <h4>Reviews</h4>
        <a href="{{ route('reviews.index') }}">Reviews</a>
        <h4>Wishlist</h4>
        <a href="{{ route('wishlists.index') }}">Wishlist</a>
        <h4>Coupons</h4>
        <a href="{{ route('coupons.index') }}">Coupons</a>
        <h4>Transactions</h4>
        <a href="{{ route('transactions.index') }}">Transactions</a>
        <h4>Shipping</h4>
        <a href="{{ route('shipping.index') }}">Shipping</a>
        <h4>Notifications</h4>
        <a href="{{ route('notifications.index') }}">Notifications</a>
    </div>
    <div class="content">
        <header class="mb-4">
            <h2>@yield('title')</h2>
        </header>
        @yield('content')
    </div>
</body>
</html>