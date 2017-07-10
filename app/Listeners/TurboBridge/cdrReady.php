<?php

namespace App\Listeners\TurboBridge;

use App\Events\TurboBridge\cdrReady;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class cdrReady
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
     * @param  cdrReady  $event
     * @return void
     */
    public function handle(cdrReady $event)
    {
        //
    }
}
