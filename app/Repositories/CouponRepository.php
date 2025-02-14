<?php
namespace App\Repositories;

use App\Models\Coupon;
use App\Repositories\Interfaces\CouponRepositoryInterface;

class CouponRepository implements CouponRepositoryInterface {
    public function all() {
        return Coupon::all();
    }

    public function findById(int $id) {
        return Coupon::find($id);
    }

    public function create(array $data) {
        return Coupon::create($data);
    }

    public function update(int $id, array $data) {
        $coupon = $this->findById($id);
        return $coupon ? $coupon->update($data) : false;
    }

    public function delete(int $id) {
        $coupon = $this->findById($id);
        return $coupon ? $coupon->delete() : false;
    }
}
