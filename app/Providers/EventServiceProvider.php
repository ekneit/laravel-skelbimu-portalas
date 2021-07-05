<?php

namespace App\Providers;

use App\Events\PostCreated;
use App\Events\UserRegistered;
use App\Listeners\SendPostAnalytics;
use App\Listeners\ProcessUserLogging;
use Illuminate\Auth\Events\Registered;
use App\Listeners\ProcessPostNotifications;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        PostCreated::class => [
            ProcessPostNotifications::class
        ],
        UserRegistered::class => [
            ProcessUserLogging::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
