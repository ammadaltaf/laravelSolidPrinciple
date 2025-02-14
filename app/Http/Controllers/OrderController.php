<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller {
    private $orderService;

    public function __construct(OrderService $orderService) {
        $this->orderService = $orderService;
    }

    public function index() {
        return response()->json($this->orderService->getAllOrders());
    }

    public function show(int $id) {
        return response()->json($this->orderService->getOrderById($id));
    }

    public function store(Request $request) {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'total_price' => 'required|numeric',
            'status' => 'required|string|max:255'
        ]);
        return response()->json($this->orderService->createOrder($data), 201);
    }

    public function update(Request $request, int $id) {
        $data = $request->validate([
            'status' => 'sometimes|string|max:255'
        ]);
        return response()->json(['success' => $this->orderService->updateOrder($id, $data)]);
    }

    public function destroy(int $id) {
        return response()->json(['success' => $this->orderService->deleteOrder($id)]);
    }
}
