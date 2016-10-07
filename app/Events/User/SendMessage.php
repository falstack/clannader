<?php

namespace App\Events\User;

use App\Clannader\Models\Morph\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class SendMessage implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;

    public $message;

    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    public function broadcastAs() {
        return 'msg';
    }

    public function broadcastWith() {
        return [
            'uName' => $this->message->attack->name,
            'uHome' => $this->message->attack->zone,
            'about_id' => $this->message->about_id,
            'about_type' => $this->message->about_type,
            'from_id' => $this->message->from_id,
            'from_type' => $this->message->from_type,
            'content' => $this->message->from_id ? $this->message->from->name : $this->message->about->name
        ];
    }

    public function broadcastOn()
    {
        return [$this->message->target->zone];
    }
}
