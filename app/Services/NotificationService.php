<?php
namespace App\Services;

use App\Repositories\Interfaces\NotificationRepositoryInterface;

class NotificationService {
    private $notificationRepository;

    public function __construct(NotificationRepositoryInterface $notificationRepository) {
        $this->notificationRepository = $notificationRepository;
    }

    public function getAllNotifications() {
        return $this->notificationRepository->all();
    }

    public function getNotificationById(int $id) {
        return $this->notificationRepository->findById($id);
    }

    public function createNotification(array $data) {
        return $this->notificationRepository->create($data);
    }

    public function updateNotification(int $id, array $data) {
        return $this->notificationRepository->update($id, $data);
    }

    public function deleteNotification(int $id) {
        return $this->notificationRepository->delete($id);
    }
}