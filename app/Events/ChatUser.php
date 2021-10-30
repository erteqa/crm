<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ChatUser implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
public $messag,$userId;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($messag,$userId)
    {
        $this->messag=$messag;
        $this->userId=$userId;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
    public function broadcastAs(){
        return 'Chat';
    }
}
