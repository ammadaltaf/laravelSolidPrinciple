<?php
namespace App\Repositories;

use App\Models\Transaction;
use App\Repositories\Interfaces\TransactionRepositoryInterface;

class TransactionRepository implements TransactionRepositoryInterface {
    public function all() {
        return Transaction::all();
    }

    public function findById(int $id) {
        return Transaction::find($id);
    }

    public function create(array $data) {
        return Transaction::create($data);
    }

    public function update(int $id, array $data) {
        $transaction = $this->findById($id);
        return $transaction ? $transaction->update($data) : false;
    }

    public function delete(int $id) {
        $transaction = $this->findById($id);
        return $transaction ? $transaction->delete() : false;
    }
}