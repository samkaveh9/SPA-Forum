<?php

namespace App\Providers;

use App\Providers\LikeEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LikeEventListener
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
     * @param  LikeEvent  $event
     * @return void
     */
    public function handle(LikeEvent $event)
    {
        //
    }
}
