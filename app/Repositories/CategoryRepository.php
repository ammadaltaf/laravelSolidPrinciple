<?php
namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface {
    public function all() {
        return Category::all();
    }

    public function findById(int $id) {
        return Category::find($id);
    }

    public function create(array $data) {
        return Category::create($data);
    }

    public function update(int $id, array $data) {
        $category = $this->findById($id);
        return $category ? $category->update($data) : false;
    }

    public function delete(int $id) {
        $category = $this->findById($id);
        return $category ? $category->delete() : false;
    }
}