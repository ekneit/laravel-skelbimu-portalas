<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserNotification;
use App\Service\UserNotificationManager;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserNotificationController extends Controller
{
    private $userNotificationManager;

    public function __construct(UserNotificationManager $userNotificationManager)
    {
        $this->userNotificationManager = $userNotificationManager;
    }

    public function index(): Collection
    {
        return UserNotification::all();
    }

    public function store(Request $request)
    {
       return response()->json($this->userNotificationManager->create($request));
    }

    public function show(UserNotification $notification): UserNotification
    {
        $this->authorize('show', $notification);
        return $notification;
    }

    public function update(Request $request, UserNotification $notification)
    {
        $this->authorize('show', $notification);
        return response()->json($this->userNotificationManager->create($request));
    }


    public function destroy(UserNotification $notification)
    {
        $this->authorize('destroy', $notification);

        $notification->delete();
        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
