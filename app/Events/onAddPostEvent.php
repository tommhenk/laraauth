<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Post;
use App\Models\User;

class onAddPostEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $user_name;
    public $post_name;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Post $post, User $user )
    {
        $this->user_name = $user->name;
        $this->post_name = $post->name;
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
}
