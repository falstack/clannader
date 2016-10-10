<?php

namespace App\Events\User;

use App\Clannader\Models\Relation\Message;
use App\Clannader\Presenter\MessagePresenter;
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
            'id' => $this->message->id,
            'uName' => $this->message->attack->name,
            'uHome' => $this->message->attack->zone,
            'about_id' => $this->message->about_id,
            'from_id' => $this->message->from_id,
            'about_type' => MessagePresenter::formatClass($this->message->about_type),
            'from_type' => MessagePresenter::formatClass($this->message->from_type),
            'content' => $this->message->from_id ? $this->message->from->name : $this->message->about->name,
            'method' => $this->message->method,
            'read' => $this->message->read,
        ];
    }

    public function broadcastOn()
    {
        return [$this->message->target->zone];
    }
}
