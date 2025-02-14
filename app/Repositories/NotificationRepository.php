<?php
namespace App\Repositories;

use App\Models\Notification;
use App\Repositories\Interfaces\NotificationRepositoryInterface;

class NotificationRepository implements NotificationRepositoryInterface {
    public function all() {
        return Notification::all();
    }

    public function findById(int $id) {
        return Notification::find($id);
    }

    public function create(array $data) {
        return Notification::create($data);
    }

    public function update(int $id, array $data) {
        $notification = $this->findById($id);
        return $notification ? $notification->update($data) : false;
    }

    public function delete(int $id) {
        $notification = $this->findById($id);
        return $notification ? $notification->delete() : false;
    }
}