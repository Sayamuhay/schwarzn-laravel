<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use App\Models\Notification;
use Livewire\Component;
use App\Providers\UpdateOrder;

class AdminDetailOrder extends Component
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
    public $detailitems;

    public $Order;

    public $store;
    public $snapToken;
    
    public $va_number, $bank, $transaction_status, $transaction_time, $deadline;
    public $payment_type, $gross_amount;

    public function mount($OrderID)
    {

            $this->Order = Order::where('OrderID', $OrderID)->first();

            $this->detailitems = OrderDetail::getOrderDetailItemsAdmin()->where('OrderID', $this->Order->OrderID);

    }

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
        return view('livewire.admin.admin-detail-order')->extends('livewire.admin.admin');
    }
}
