<?php
namespace App\Services;

use App\Repositories\Interfaces\CouponRepositoryInterface;

class CouponService {
    private $couponRepository;

    public function __construct(CouponRepositoryInterface $couponRepository) {
        $this->couponRepository = $couponRepository;
    }

    public function getAllCoupons() {
        return $this->couponRepository->all();
    }

    public function getCouponById(int $id) {
        return $this->couponRepository->findById($id);
    }

    public function createCoupon(array $data) {
        return $this->couponRepository->create($data);
    }

    public function updateCoupon(int $id, array $data) {
        return $this->couponRepository->update($id, $data);
    }

    public function deleteCoupon(int $id) {
        return $this->couponRepository->delete($id);
    }
}