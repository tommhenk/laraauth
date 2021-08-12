<?php

namespace App\Listeners;

use App\Events\onAddPostEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Log;

class AddPostListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  onAddPostEvent  $event
     * @return void
     */
    public function handle(onAddPostEvent $event)
    {
        $event->user_name;
        $event->post_name;
        Log::info('Artice save in database', [$event->user_name => $event->post_name]);
    }
}
