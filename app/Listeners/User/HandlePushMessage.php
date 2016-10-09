<?php

namespace App\Listeners\User;

use App\Clannader\Models\Relation\Message;
use App\Events\User\PushMessage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class HandlePushMessage
{
    public $message;

    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    /**
     * Handle the event.
     *
     * @param  PushMessage  $event
     * @return void
     */
    public function handle(PushMessage $event)
    {
        //
    }
}
