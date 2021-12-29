<?php

namespace App\Listeners;

use App\Events\UserLoginEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class LogUser
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
     * @param  \App\Events\UserLoginEvent  $event
     * @return void
     */
    public function handle(UserLoginEvent $event)
    {
        Log::info($event->user->name);
    }
}
