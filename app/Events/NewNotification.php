<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewNotification
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */

    public $name ;
    public $email ;
    public $subject ;
    public $message ;
    public $date ;

    public function __construct($data)
    {
        $this->name         = $data['user_name'];
        $this->email        = $data['user_email'];
        $this->subject      = $data['con_subject'];
        $this->message      = $data['con_message'];
        $this->date         = $data['date'];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        // return new channel('new-notification');
        return new Channel('new-notification');
    }

    public function broadcastAs()
    {
        return 'form-submitted';
    }
}
