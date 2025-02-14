<?php
namespace App\Services;

use App\Repositories\Interfaces\WishlistRepositoryInterface;

class WishlistService {
    private $wishlistRepository;

    public function __construct(WishlistRepositoryInterface $wishlistRepository) {
        $this->wishlistRepository = $wishlistRepository;
    }

    public function getAllWishlists() {
        return $this->wishlistRepository->all();
    }

    public function getWishlistById(int $id) {
        return $this->wishlistRepository->findById($id);
    }

    public function createWishlist(array $data) {
        return $this->wishlistRepository->create($data);
    }

    public function deleteWishlist(int $id) {
        return $this->wishlistRepository->delete($id);
    }
}