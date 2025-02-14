<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\CouponService;
use Illuminate\Http\Request;

class CouponController extends Controller {
    private $couponService;

    public function __construct(CouponService $couponService) {
        $this->couponService = $couponService;
    }

    public function index() {
        return response()->json($this->couponService->getAllCoupons());
    }

    public function show(int $id) {
        return response()->json($this->couponService->getCouponById($id));
    }

    public function store(Request $request) {
        $data = $request->validate([
            'code' => 'required|string|unique:coupons,code',
            'discount' => 'required|numeric|min:0',
            'expires_at' => 'nullable|date'
        ]);
        return response()->json($this->couponService->createCoupon($data), 201);
    }

    public function update(Request $request, int $id) {
        $data = $request->validate([
            'code' => 'sometimes|string|unique:coupons,code,' . $id,
            'discount' => 'sometimes|numeric|min:0',
            'expires_at' => 'sometimes|date'
        ]);
        return response()->json(['success' => $this->couponService->updateCoupon($id, $data)]);
    }

    public function destroy(int $id) {
        return response()->json(['success' => $this->couponService->deleteCoupon($id)]);
    }
}