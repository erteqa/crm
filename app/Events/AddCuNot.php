<?php

namespace App\Events;

use App\Model\Customer;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Support\Facades\Event;

class AddCuNot extends Event implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public  $message,$userid;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($message,$userid)
    {
        $this->message = $message;
        $this->userid = $userid;
    }
    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('chat_privet.'.$this->userid);
    }

    public function broadcastAs(){
        return 'AddCustomer';
    }
}
