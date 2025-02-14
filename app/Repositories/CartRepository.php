<?php
namespace App\Repositories;

use App\Models\Cart;
use App\Repositories\Interfaces\CartRepositoryInterface;

class CartRepository implements CartRepositoryInterface {
    public function all() {
        return Cart::all();
    }

    public function findById(int $id) {
        return Cart::find($id);
    }

    public function create(array $data) {
        return Cart::create($data);
    }

    public function update(int $id, array $data) {
        $cart = $this->findById($id);
        return $cart ? $cart->update($data) : false;
    }

    public function delete(int $id) {
        $cart = $this->findById($id);
        return $cart ? $cart->delete() : false;
    }
}