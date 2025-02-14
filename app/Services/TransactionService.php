<?php
namespace App\Services;

use App\Repositories\Interfaces\TransactionRepositoryInterface;

class TransactionService {
    private $transactionRepository;

    public function __construct(TransactionRepositoryInterface $transactionRepository) {
        $this->transactionRepository = $transactionRepository;
    }

    public function getAllTransactions() {
        return $this->transactionRepository->all();
    }

    public function getTransactionById(int $id) {
        return $this->transactionRepository->findById($id);
    }

    public function createTransaction(array $data) {
        return $this->transactionRepository->create($data);
    }

    public function updateTransaction(int $id, array $data) {
        return $this->transactionRepository->update($id, $data);
    }

    public function deleteTransaction(int $id) {
        return $this->transactionRepository->delete($id);
    }
}