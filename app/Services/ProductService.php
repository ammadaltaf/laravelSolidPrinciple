<?php
namespace App\Services;

use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Product;
use App\Models\Category;

class ProductService {
    private ProductRepositoryInterface $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository) {
        $this->productRepository = $productRepository;
    }

    public function getAllProducts(): Collection {
        return $this->productRepository->all();
    }
    public function getAllCategories() {
        return Category::all(); 
    }
    public function getProductById(int $id): ?Product {
        return $this->productRepository->findById($id);
    }

    public function createProduct(array $data): Product {
        return $this->productRepository->create($data);
    }

    public function updateProduct(int $id, array $data): bool {
        return $this->productRepository->update($id, $data);
    }

    public function deleteProduct(int $id): bool {
        return $this->productRepository->delete($id);
    }
}
