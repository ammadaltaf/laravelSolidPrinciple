<?php
namespace App\Services;

use App\Repositories\Interfaces\CategoryRepositoryInterface;

class CategoryService {
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository) {
        $this->categoryRepository = $categoryRepository;
    }

    public function getAllCategories() {
        return $this->categoryRepository->all();
    }

    public function getCategoryById(int $id) {
        return $this->categoryRepository->findById($id);
    }

    public function createCategory(array $data) {
        return $this->categoryRepository->create($data);
    }

    public function updateCategory(int $id, array $data) {
        return $this->categoryRepository->update($id, $data);
    }

    public function deleteCategory(int $id) {
        return $this->categoryRepository->delete($id);
    }
}