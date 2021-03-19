<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\User;
use App\Models\Notification;
use Livewire\Component;
use App\Providers\UpdateOrder;

class Admin extends Component
{
    public $notifications;
    public $notifnewuser;
    public $getnotif;
    public $getcountnotif;
    public $getunreadnotif;
    public $notifnewtrans;

    public $countuser;

    public $orderlist;
    public $countorder;

    public $countsales;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function render()
    {
 
        $this->getnotif = Notification::getNotif();
        $this->getcountnotif = Notification::getCountNotif();
        $this->getunreadnotif = Notification::getUnreadNotif();

        $this->countuser = User::getCountUser();

        $this->orderlist = Order::getOrderListUniversal();
        $this->countorder = Order::getOrderCountUniversal();

        $this->countsales = Order::getCountSales();

        $this->notifications = auth()->user()->unreadNotifications->where('type', 'App\Notifications\NewOrderNotification');
        $this->notifnewuser = auth()->user()->unreadNotifications->where('type', 'App\Notifications\NewUserNotification');
        $this->notifnewtrans = auth()->user()->unreadNotifications->where('type', 'App\Notifications\NewUserTransaction');
        return view('livewire.admin.dashboard')->extends('livewire.admin.admin');
    }

    public function markread($id)
    {
        dd($id);
    }

}
