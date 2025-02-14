<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\Shipping;
use App\Models\Wishlist;
use App\Models\Coupon;
use App\Models\Review;
use App\Models\Payment;
use App\Models\Transaction;
use App\Models\Cart;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'total_products' => Product::count(),
            'total_categories' => Category::count(),
            'total_orders' => Order::count(),
            'total_shipping' => Shipping::count(),
            'total_wishlist' => Wishlist::count(),
            'total_coupons' => Coupon::count(),
            'total_reviews' => Review::count(),
            'total_payments' => Payment::count(),
            'total_transactions' => Transaction::count(),
            'total_cart_items' => Cart::count(),
        ];
        
        return view('dashboard.index', compact('data'));
    }
}
