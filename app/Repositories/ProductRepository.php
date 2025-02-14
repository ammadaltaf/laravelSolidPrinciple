<?php
namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ProductRepository implements ProductRepositoryInterface {
    public function all(): Collection {
        return Product::all();
    }

    public function findById(int $id): ?Product {
        return Product::find($id);
    }

    public function create(array $data): Product {
        return Product::create($data);
    }

    public function update(int $id, array $data): bool {
        $product = $this->findById($id);
        return $product ? $product->update($data) : false;
    }

    public function delete(int $id): bool {
        $product = $this->findById($id);
        return $product ? $product->delete() : false;
    }
}
