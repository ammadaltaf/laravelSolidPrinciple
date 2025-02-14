<?php
namespace App\Services;

use App\Repositories\Interfaces\OrderRepositoryInterface;

class OrderService {
    private $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository) {
        $this->orderRepository = $orderRepository;
    }

    public function getAllOrders() {
        return $this->orderRepository->all();
    }

    public function getOrderById(int $id) {
        return $this->orderRepository->findById($id);
    }

    public function createOrder(array $data) {
        return $this->orderRepository->create($data);
    }

    public function updateOrder(int $id, array $data) {
        return $this->orderRepository->update($id, $data);
    }

    public function deleteOrder(int $id) {
        return $this->orderRepository->delete($id);
    }
}