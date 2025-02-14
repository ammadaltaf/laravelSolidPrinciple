<?php
namespace App\Repositories;

use App\Models\OrderItem;
use App\Repositories\Interfaces\OrderItemRepositoryInterface;

class OrderItemRepository implements OrderItemRepositoryInterface {
    public function all() {
        return OrderItem::all();
    }

    public function findById(int $id) {
        return OrderItem::find($id);
    }

    public function create(array $data) {
        return OrderItem::create($data);
    }

    public function update(int $id, array $data) {
        $orderItem = $this->findById($id);
        return $orderItem ? $orderItem->update($data) : false;
    }

    public function delete(int $id) {
        $orderItem = $this->findById($id);
        return $orderItem ? $orderItem->delete() : false;
    }
}