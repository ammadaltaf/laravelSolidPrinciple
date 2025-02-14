<?php
namespace App\Repositories;

use App\Models\Wishlist;
use App\Repositories\Interfaces\WishlistRepositoryInterface;

class WishlistRepository implements WishlistRepositoryInterface {
    public function all() {
        return Wishlist::all();
    }

    public function findById(int $id) {
        return Wishlist::find($id);
    }

    public function create(array $data) {
        return Wishlist::create($data);
    }

    public function delete(int $id) {
        $wishlist = $this->findById($id);
        return $wishlist ? $wishlist->delete() : false;
    }
}