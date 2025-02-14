<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\NotificationService;
use Illuminate\Http\Request;

class NotificationController extends Controller {
    private $notificationService;

    public function __construct(NotificationService $notificationService) {
        $this->notificationService = $notificationService;
    }

    public function index() {
        return response()->json($this->notificationService->getAllNotifications());
    }

    public function show(int $id) {
        return response()->json($this->notificationService->getNotificationById($id));
    }

    public function store(Request $request) {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'message' => 'required|string',
            'type' => 'required|string',
            'status' => 'required|string',
        ]);
        return response()->json($this->notificationService->createNotification($data), 201);
    }

    public function update(Request $request, int $id) {
        $data = $request->validate([
            'message' => 'sometimes|string',
            'type' => 'sometimes|string',
            'status' => 'sometimes|string',
        ]);
        return response()->json(['success' => $this->notificationService->updateNotification($id, $data)]);
    }

    public function destroy(int $id) {
        return response()->json(['success' => $this->notificationService->deleteNotification($id)]);
    }
}