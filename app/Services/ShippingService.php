<?php
namespace App\Services;

use App\Repositories\Interfaces\ShippingRepositoryInterface;

class ShippingService {
    private $shippingRepository;

    public function __construct(ShippingRepositoryInterface $shippingRepository) {
        $this->shippingRepository = $shippingRepository;
    }

    public function getAllShippings() {
        return $this->shippingRepository->all();
    }

    public function getShippingById(int $id) {
        return $this->shippingRepository->findById($id);
    }

    public function createShipping(array $data) {
        return $this->shippingRepository->create($data);
    }

    public function updateShipping(int $id, array $data) {
        return $this->shippingRepository->update($id, $data);
    }

    public function deleteShipping(int $id) {
        return $this->shippingRepository->delete($id);
    }
}