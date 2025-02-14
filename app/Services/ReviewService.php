<?php
namespace App\Services;

use App\Repositories\Interfaces\ReviewRepositoryInterface;

class ReviewService {
    private $reviewRepository;

    public function __construct(ReviewRepositoryInterface $reviewRepository) {
        $this->reviewRepository = $reviewRepository;
    }

    public function getAllReviews() {
        return $this->reviewRepository->all();
    }

    public function getReviewById(int $id) {
        return $this->reviewRepository->findById($id);
    }

    public function createReview(array $data) {
        return $this->reviewRepository->create($data);
    }

    public function updateReview(int $id, array $data) {
        return $this->reviewRepository->update($id, $data);
    }

    public function deleteReview(int $id) {
        return $this->reviewRepository->delete($id);
    }
}