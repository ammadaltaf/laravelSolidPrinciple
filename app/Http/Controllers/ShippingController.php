<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\ShippingService;
use Illuminate\Http\Request;

class ShippingController extends Controller {
    private $shippingService;

    public function __construct(ShippingService $shippingService) {
        $this->shippingService = $shippingService;
    }

    public function index() {
        return response()->json($this->shippingService->getAllShippings());
    }

    public function show(int $id) {
        return response()->json($this->shippingService->getShippingById($id));
    }

    public function store(Request $request) {
        $data = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'tracking_number' => 'required|string|unique:shippings,tracking_number',
            'status' => 'required|string',
            'estimated_delivery' => 'nullable|date'
        ]);
        return response()->json($this->shippingService->createShipping($data), 201);
    }

    public function update(Request $request, int $id) {
        $data = $request->validate([
            'status' => 'sometimes|string',
            'estimated_delivery' => 'sometimes|date'
        ]);
        return response()->json(['success' => $this->shippingService->updateShipping($id, $data)]);
    }

    public function destroy(int $id) {
        return response()->json(['success' => $this->shippingService->deleteShipping($id)]);
    }
}