<?php
namespace App\Services;

use App\Repositories\Interfaces\CartRepositoryInterface;

class CartService {
    private $cartRepository;

    public function __construct(CartRepositoryInterface $cartRepository) {
        $this->cartRepository = $cartRepository;
    }

    public function getAllCarts() {
        return $this->cartRepository->all();
    }

    public function getCartById(int $id) {
        return $this->cartRepository->findById($id);
    }

    public function createCart(array $data) {
        return $this->cartRepository->create($data);
    }

    public function updateCart(int $id, array $data) {
        return $this->cartRepository->update($id, $data);
    }

    public function deleteCart(int $id) {
        return $this->cartRepository->delete($id);
    }
}