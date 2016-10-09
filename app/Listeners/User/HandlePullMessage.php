<?php

namespace App\Listeners\User;

use App\Events\User\PullMessage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class HandlePullMessage
{

    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PullMessage  $event
     * @return void
     */
    public function handle(PullMessage $event)
    {
        //
    }
}
