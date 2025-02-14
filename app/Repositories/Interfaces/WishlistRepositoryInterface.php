<?php

namespace App\Repositories\Interfaces;

interface WishlistRepositoryInterface {
    public function all();
    public function findById(int $id);
    public function create(array $data);
    public function delete(int $id);
}