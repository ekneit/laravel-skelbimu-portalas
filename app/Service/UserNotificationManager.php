<?php


namespace App\Service;


use App\Models\Category;
use App\Models\UserNotification;

class UserNotificationManager
{

    public function create($request)
    {
        $request->validate([
            'notification_id' => 'required'
        ]);


        $notifications = auth()->user()->notifications()->get();

        if($notifications->isNotEmpty()) {
            $notifications->each->delete();
        }

        foreach($request->notification_id as $category) {
            Category::find($category)->UserNotifications()->create([
                'user_id' => auth()->user()->id
            ]);
        }
        return $request;
    }

}
