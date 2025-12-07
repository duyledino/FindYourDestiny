<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PusherBroadcast implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $content;
    public $chat_id;
    public $user_id;
    public $create_at;
    public $afterCommit = false;

    public function __construct($content, $chat_id, $user_id,$create_at)
    {
        $this->content = $content;
        $this->chat_id = $chat_id;
        $this->user_id = $user_id;
        $this->create_at=$create_at;
    }

    public function broadcastOn(): array
    {
        return [
            'chat.'. $this->chat_id
        ];
    }
    public function broadcastAs()
    {
        return 'my-event';
    }
}
