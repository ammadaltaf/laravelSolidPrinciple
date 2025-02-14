<?php
namespace App\Repositories;

use App\Models\Shipping;
use App\Repositories\Interfaces\ShippingRepositoryInterface;

class ShippingRepository implements ShippingRepositoryInterface {
    public function all() {
        return Shipping::all();
    }

    public function findById(int $id) {
        return Shipping::find($id);
    }

    public function create(array $data) {
        return Shipping::create($data);
    }

    public function update(int $id, array $data) {
        $shipping = $this->findById($id);
        return $shipping ? $shipping->update($data) : false;
    }

    public function delete(int $id) {
        $shipping = $this->findById($id);
        return $shipping ? $shipping->delete() : false;
    }
}