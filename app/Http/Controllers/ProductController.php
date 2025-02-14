<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller {
    private ProductService $productService;

    public function __construct(ProductService $productService) {
        $this->productService = $productService;
    }

    public function index(){
        return response()->json($this->productService->getAllProducts());
    }

    public function show(int $id) {
        return response()->json($this->productService->getProductById($id));
    }

    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'stock' => 'required|integer|min:0',
        ]);
        return response()->json($this->productService->createProduct($data), 201);
    }

    public function update(Request $request, int $id) {
        $data = $request->validate([
            'name' => 'sometimes|string|max:255',
            'category_id' => 'sometimes|exists:categories,id',
            'price' => 'sometimes|numeric',
            'stock' => 'sometimes|integer|min:0',
        ]);
        return response()->json(['success' => $this->productService->updateProduct($id, $data)]);
    }

    public function destroy(int $id) {
        return response()->json(['success' => $this->productService->deleteProduct($id)]);
    }
}
