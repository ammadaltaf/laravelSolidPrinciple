<?php
namespace App\Repositories;

use App\Models\Payment;
use App\Repositories\Interfaces\PaymentRepositoryInterface;

class PaymentRepository implements PaymentRepositoryInterface {
    public function all() {
        return Payment::all();
    }

    public function findById(int $id) {
        return Payment::find($id);
    }

    public function create(array $data) {
        return Payment::create($data);
    }

    public function update(int $id, array $data) {
        $payment = $this->findById($id);
        return $payment ? $payment->update($data) : false;
    }

    public function delete(int $id) {
        $payment = $this->findById($id);
        return $payment ? $payment->delete() : false;
    }
}