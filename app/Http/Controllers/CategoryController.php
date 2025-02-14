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
        $categories = $this->categoryService->getAllCategories();
        return view('category.index',compact('categories'));
    }

    public function create() {
        return view('category.form');
    }

    public function edit(int $id) {
        $category = $this->categoryService->getCategoryById($id);
        return view('category.form',compact('category'));
    }

    public function store(Request $request) {
        $data = $request->validate(['name' => 'required|string|max:255','description'=>'required']);
        $this->categoryService->createCategory($data);
        return redirect()->route('categories.index')->with(['message'=>'Category added successfully']);
    }

    public function update(Request $request, int $id) {
        $data = $request->validate(['name' => 'sometimes|string|max:255']);
        $this->categoryService->updateCategory($id, $data);
        return redirect()->route('categories.index')->with(['message'=>'Category updated successfully']);
    }

    public function destroy(int $id) {
        return response()->json(['success' => $this->categoryService->deleteCategory($id)]);
    }
}