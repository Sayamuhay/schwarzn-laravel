<?php

namespace App\Http\Livewire;

use App\Models\Products;
use App\Models\Carts;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Profil extends Component
{

    public $counts;
    public $newArrival = [];
    public $cart = [];
    public $kode;
    public $carts, $productsize, $quantity, $cart_id;
    public $updateMode = false;
    public $weight;
    public $countorder;
    public $countordertopaid;
    public $countorderhaspaid;
    public $hasordered;
    public $orderl;

    public $notifications, $readednotif, $unreadnotif, $countunreadnotif ;

    public $ProductName, $ProductSize, $Quantity, $Price;

    public function render()
    {
        $this->counts = Carts::getCountCart();
        $this->countorder = Order::getCountOrder();
        $this->countordertopaid = Order::getCountOrderToPaid();
        $this->cart = Carts::getCart();
        $this->newArrival = Products::getNewArrival();
        $this->kode = Order::kode();
        $this->weight = Carts::getWeightCart();
        $this->countorderhaspaid = Order::getCountOrderHasPaid();
        $this->hasordered = OrderDetail::hasOrdered();
        $this->orderl = Order::getOrderList();
        $this->readednotif = auth()->user()->notifications->where('type', 'App\Notifications\NewUpdateOrderNotification');
        $this->notifications = auth()->user()->unreadNotifications->where('type', 'App\Notifications\NewUpdateOrderNotification');
        $this->unreadnotif = auth()->user()->unreadNotifications->where('type', 'App\Notifications\NewUpdateOrderNotification')->where('read_at', NULL);
        $this->countunreadnotif = auth()->user()->unreadNotifications->where('type', 'App\Notifications\NewUpdateOrderNotification')->count();
        return view('livewire.pages.profil.profil')->extends('layouts.template')->section('content');
    }

    public function routehistory()
    {
        return redirect()->route('orderlist');
    }

    public function routeprofil()
    {
        return redirect()->route('account');
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
