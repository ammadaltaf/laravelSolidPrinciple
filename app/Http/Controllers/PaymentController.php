<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\PaymentService;
use Illuminate\Http\Request;

class PaymentController extends Controller {
    private $paymentService;

    public function __construct(PaymentService $paymentService) {
        $this->paymentService = $paymentService;
    }

    public function index() {
        return response()->json($this->paymentService->getAllPayments());
    }

    public function show(int $id) {
        return response()->json($this->paymentService->getPaymentById($id));
    }

    public function store(Request $request) {
        $data = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'payment_method' => 'required|string',
            'amount' => 'required|numeric',
            'status' => 'required|string'
        ]);
        return response()->json($this->paymentService->createPayment($data), 201);
    }

    public function update(Request $request, int $id) {
        $data = $request->validate([
            'status' => 'sometimes|string'
        ]);
        return response()->json(['success' => $this->paymentService->updatePayment($id, $data)]);
    }

    public function destroy(int $id) {
        return response()->json(['success' => $this->paymentService->deletePayment($id)]);
    }
}