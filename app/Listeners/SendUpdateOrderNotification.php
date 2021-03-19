<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;
use App\Notifications\NewUpdateOrderNotification;
use Notification;
use App\Providers\UpdateOrder;


class SendUpdateOrderNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  UpdateOrder  $event
     * @return void
     */
    public function handle($event)
    {
        $user = User::where('level', 0)->where('id', $event->Order['UserID'])->get();

        Notification::send($user, new NewUpdateOrderNotification($event->Order));
    }
}
