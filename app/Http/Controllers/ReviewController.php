<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\ReviewService;
use Illuminate\Http\Request;

class ReviewController extends Controller {
    private $reviewService;

    public function __construct(ReviewService $reviewService) {
        $this->reviewService = $reviewService;
    }

    public function index() {
        return response()->json($this->reviewService->getAllReviews());
    }

    public function show(int $id) {
        return response()->json($this->reviewService->getReviewById($id));
    }

    public function store(Request $request) {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string'
        ]);
        return response()->json($this->reviewService->createReview($data), 201);
    }

    public function update(Request $request, int $id) {
        $data = $request->validate([
            'rating' => 'sometimes|integer|min:1|max:5',
            'comment' => 'sometimes|string'
        ]);
        return response()->json(['success' => $this->reviewService->updateReview($id, $data)]);
    }

    public function destroy(int $id) {
        return response()->json(['success' => $this->reviewService->deleteReview($id)]);
    }
}