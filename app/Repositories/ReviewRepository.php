<?php
namespace App\Repositories;

use App\Models\Review;
use App\Repositories\Interfaces\ReviewRepositoryInterface;

class ReviewRepository implements ReviewRepositoryInterface {
    public function all() {
        return Review::all();
    }

    public function findById(int $id) {
        return Review::find($id);
    }

    public function create(array $data) {
        return Review::create($data);
    }

    public function update(int $id, array $data) {
        $review = $this->findById($id);
        return $review ? $review->update($data) : false;
    }

    public function delete(int $id) {
        $review = $this->findById($id);
        return $review ? $review->delete() : false;
    }
}
