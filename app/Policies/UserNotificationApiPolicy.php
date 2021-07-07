<?php

namespace App\Policies;

use App\Models\User;
use App\Models\UserNotification;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserNotificationApiPolicy
{
    use HandlesAuthorization;


    public function show(User $user, UserNotification $userNotification)
    {
         return $this->isAdminOrOwner($user, $userNotification);
    }

    public function update(User $user, UserNotification $userNotification)
    {
        return $this->isAdminOrOwner($user, $userNotification);
    }

    public function destroy(User $user, UserNotification $userNotification)
    {
        return $this->isAdminOrOwner($user, $userNotification);
    }

    private function isAdminOrOwner(User $user, UserNotification $userNotification): bool
    {
        return $user->is_admin === true || $user->id === $userNotification->user_id;
    }
}
