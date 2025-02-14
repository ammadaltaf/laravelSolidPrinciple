<?php
namespace App\Services;

use App\Repositories\Interfaces\OrderItemRepositoryInterface;

class OrderItemService {
    private $orderItemRepository;

    public function __construct(OrderItemRepositoryInterface $orderItemRepository) {
        $this->orderItemRepository = $orderItemRepository;
    }

    public function getAllOrderItems() {
        return $this->orderItemRepository->all();
    }

    public function getOrderItemById(int $id) {
        return $this->orderItemRepository->findById($id);
    }

    public function createOrderItem(array $data) {
        return $this->orderItemRepository->create($data);
    }

    public function updateOrderItem(int $id, array $data) {
        return $this->orderItemRepository->update($id, $data);
    }

    public function deleteOrderItem(int $id) {
        return $this->orderItemRepository->delete($id);
    }
}