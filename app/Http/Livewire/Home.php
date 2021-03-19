<?php

namespace App\Http\Livewire;

use App\Models\Products;
use App\Models\Carts;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified as Middleware;
use Livewire\Component;


class Home extends Component
{
    public $counts;
    public $newArrival = [];
    public $cart = [];
    public $getMost;
    public $getMostFour;
    public $countordertopaid;
    public $countorderhaspaid;
    public $countorder;
    public $product;
    public $notifications;
    public $unreadnotif;
    public $countunreadnotif;
    public $readednotif;

    public function mount()
    {
        if (Auth::user()) {
            if (Auth::user()->level === 1) {
                return redirect()->route('admin');
            }
        }

    }

    public function render()
    {

        
        $this->cart = Carts::getCart();  
        $this->newArrival = Products::getNewArrival();
        $this->getMost = Products::getMostProducts();
        $this->getMostFour = Products::getMostFour();
        $this->product = Products::getProducts();
        if (Auth::user()) {
            $this->countorder = Order::getCountOrder();
            $this->counts = Carts::getCountCart();
            $this->countorderhaspaid = Order::getCountOrderHasPaid();
            $this->countordertopaid = Order::getCountOrderToPaid();

            $this->readednotif = auth()->user()->notifications->where('type', 'App\Notifications\NewUpdateOrderNotification');
            $this->notifications = auth()->user()->unreadNotifications->where('type', 'App\Notifications\NewUpdateOrderNotification');
            $this->unreadnotif = auth()->user()->unreadNotifications->where('type', 'App\Notifications\NewUpdateOrderNotification')->where('read_at', NULL);
            $this->countunreadnotif = auth()->user()->unreadNotifications->where('type', 'App\Notifications\NewUpdateOrderNotification')->count();

           
        }

        
        return view('livewire.pages.home.home')->extends('layouts.template')->section('content');
    }

    public function markread($id)
    {
        auth()->user()
        ->unreadNotifications
        ->where('id', $id)
        ->markAsRead();
    }
    public function deletenotif($id)
    {
        auth()->user()
        ->notifications()
        ->where('id', $id)
        ->delete();
    }
}
