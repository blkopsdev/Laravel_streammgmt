<?php

namespace App\Listeners\Icecast;

use App\Events\Icecast\ListenerRemove;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ListenerRemove
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ListenerRemove  $event
     * @return void
     */
    public function handle(ListenerRemove $event)
    {
        //
    }
}
