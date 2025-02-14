<?php
namespace App\Services;

use App\Repositories\Interfaces\PaymentRepositoryInterface;

class PaymentService {
    private $paymentRepository;

    public function __construct(PaymentRepositoryInterface $paymentRepository) {
        $this->paymentRepository = $paymentRepository;
    }

    public function getAllPayments() {
        return $this->paymentRepository->all();
    }

    public function getPaymentById(int $id) {
        return $this->paymentRepository->findById($id);
    }

    public function createPayment(array $data) {
        return $this->paymentRepository->create($data);
    }

    public function updatePayment(int $id, array $data) {
        return $this->paymentRepository->update($id, $data);
    }

    public function deletePayment(int $id) {
        return $this->paymentRepository->delete($id);
    }
}