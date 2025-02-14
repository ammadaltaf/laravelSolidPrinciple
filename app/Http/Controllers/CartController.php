<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller {
    private $cartService;

    public function __construct(CartService $cartService) {
        $this->cartService = $cartService;
    }

    public function index() {
        return response()->json($this->cartService->getAllCarts());
    }

    public function show(int $id) {
        return response()->json($this->cartService->getCartById($id));
    }

    public function store(Request $request) {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer'
        ]);
        return response()->json($this->cartService->createCart($data), 201);
    }

    public function update(Request $request, int $id) {
        $data = $request->validate([
            'quantity' => 'sometimes|integer'
        ]);
        return response()->json(['success' => $this->cartService->updateCart($id, $data)]);
    }

    public function destroy(int $id) {
        return response()->json(['success' => $this->cartService->deleteCart($id)]);
    }
}