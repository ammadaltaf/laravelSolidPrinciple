<?php
namespace App\Repositories;

use App\Models\Order;
use App\Repositories\Interfaces\OrderRepositoryInterface;

class OrderRepository implements OrderRepositoryInterface {
    public function all() {
        return Order::all();
    }

    public function findById(int $id) {
        return Order::find($id);
    }

    public function create(array $data) {
        return Order::create($data);
    }

    public function update(int $id, array $data) {
        $order = $this->findById($id);
        return $order ? $order->update($data) : false;
    }

    public function delete(int $id) {
        $order = $this->findById($id);
        return $order ? $order->delete() : false;
    }
}