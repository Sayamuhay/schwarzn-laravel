<?php

namespace App\Providers;

use App\Providers\Ordered;
use App\Models\User;
use Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\NewOrderNotification;

class SendNewOrderNotification
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
     * @param  Ordered  $event
     * @return void
     */
    public function handle(Ordered $event)
    {
        $admins = User::where('level', 1)->get();

        Notification::send($admins, new NewOrderNotification($event->order));
    }
}
