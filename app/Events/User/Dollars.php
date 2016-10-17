<?php

namespace App\Events\User;

use App\Clannader\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class Dollars implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;

    public $user;

    public $content;

    public function __construct(User $user, $content)
    {
        $this->user = $user;

        $this->content = $content;
    }

    public function broadcastAs() {
        return 'dollars';
    }

    public function broadcastWith() {
        return [
            'userName' => $this->user->name,
            'userHome' => $this->user->zone,
            'userFace' => $this->user->avatar,
            'content' => $this->content,
            'time' => time()
        ];
    }

    public function broadcastOn()
    {
        return ['0.0.0.0'];
    }
}
