<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\TransactionService;
use Illuminate\Http\Request;

class TransactionController extends Controller {
    private $transactionService;

    public function __construct(TransactionService $transactionService) {
        $this->transactionService = $transactionService;
    }

    public function index() {
        return response()->json($this->transactionService->getAllTransactions());
    }

    public function show(int $id) {
        return response()->json($this->transactionService->getTransactionById($id));
    }

    public function store(Request $request) {
        $data = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'payment_id' => 'required|exists:payments,id',
            'amount' => 'required|numeric|min:0',
            'status' => 'required|string'
        ]);
        return response()->json($this->transactionService->createTransaction($data), 201);
    }

    public function update(Request $request, int $id) {
        $data = $request->validate([
            'status' => 'sometimes|string',
            'amount' => 'sometimes|numeric|min:0'
        ]);
        return response()->json(['success' => $this->transactionService->updateTransaction($id, $data)]);
    }

    public function destroy(int $id) {
        return response()->json(['success' => $this->transactionService->deleteTransaction($id)]);
    }
}