<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\OrderItemService;
use Illuminate\Http\Request;

class OrderItemController extends Controller {
    private $orderItemService;

    public function __construct(OrderItemService $orderItemService) {
        $this->orderItemService = $orderItemService;
    }

    public function index() {
        return response()->json($this->orderItemService->getAllOrderItems());
    }

    public function show(int $id) {
        return response()->json($this->orderItemService->getOrderItemById($id));
    }

    public function store(Request $request) {
        $data = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer',
            'price' => 'required|numeric'
        ]);
        return response()->json($this->orderItemService->createOrderItem($data), 201);
    }

    public function update(Request $request, int $id) {
        $data = $request->validate([
            'quantity' => 'sometimes|integer',
            'price' => 'sometimes|numeric'
        ]);
        return response()->json(['success' => $this->orderItemService->updateOrderItem($id, $data)]);
    }

    public function destroy(int $id) {
        return response()->json(['success' => $this->orderItemService->deleteOrderItem($id)]);
    }
}