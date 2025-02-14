<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller {
    private $categoryService;

    public function __construct(CategoryService $categoryService) {
        $this->categoryService = $categoryService;
    }

    public function index() {
        return response()->json($this->categoryService->getAllCategories());
    }

    public function show(int $id) {
        return response()->json($this->categoryService->getCategoryById($id));
    }

    public function store(Request $request) {
        $data = $request->validate(['name' => 'required|string|max:255']);
        return response()->json($this->categoryService->createCategory($data), 201);
    }

    public function update(Request $request, int $id) {
        $data = $request->validate(['name' => 'sometimes|string|max:255']);
        return response()->json(['success' => $this->categoryService->updateCategory($id, $data)]);
    }

    public function destroy(int $id) {
        return response()->json(['success' => $this->categoryService->deleteCategory($id)]);
    }
}