<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\Icecast\MountAdd' => [
            'App\Listeners\Icecast\MountAdd',
        ],
        'App\Events\Icecast\MountRemove' => [
            'App\Listeners\Icecast\MountRemove',
        ],
        'App\Events\Icecast\ListenerAdd' => [
            'App\Listeners\Icecast\ListenerAdd',
        ],
        'App\Events\Icecast\ListenerRemove' => [
            'App\Listeners\Icecast\ListenerRemove',
        ],
        'App\Events\TurboBridge\cdrReady' => [
            'App\Listeners\TurboBridge\cdrReady',
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
