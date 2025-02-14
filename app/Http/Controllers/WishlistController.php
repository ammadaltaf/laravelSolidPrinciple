<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\WishlistService;
use Illuminate\Http\Request;

class WishlistController extends Controller {
    private $wishlistService;

    public function __construct(WishlistService $wishlistService) {
        $this->wishlistService = $wishlistService;
    }

    public function index() {
        return response()->json($this->wishlistService->getAllWishlists());
    }

    public function show(int $id) {
        return response()->json($this->wishlistService->getWishlistById($id));
    }

    public function store(Request $request) {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id'
        ]);
        return response()->json($this->wishlistService->createWishlist($data), 201);
    }

    public function destroy(int $id) {
        return response()->json(['success' => $this->wishlistService->deleteWishlist($id)]);
    }
}