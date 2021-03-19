<?php

namespace App\Http\Livewire;


use App\Models\Carts;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Paid extends Component
{
    public $counts;
    public $cart = [];
    public $countordertopaid;
    public $countorderhaspaid;
    public $countorder;
    public $Order;

    public $notifications, $readednotif, $unreadnotif, $countunreadnotif ;

    public $detailitems;
    public $store;
    public $snapToken;
    
    public $va_number, $bank, $transaction_status, $transaction_time, $deadline;
    public $payment_type, $gross_amount;

    public function mount($OrderID)
    {

        $this->Order = Order::where('OrderID', $OrderID)->first();



        if(!Auth::user())
        {
            return redirect()->route('login');
        }

        $this->countorder = Order::getCountOrder();
        $this->countorderhaspaid = Order::getCountOrderHasPaid();
        $this->countordertopaid = Order::getCountOrderToPaid();
        $this->counts = Carts::getCountCart();
        $this->cart = Carts::getCart();
        $this->readednotif = auth()->user()->notifications->where('type', 'App\Notifications\NewUpdateOrderNotification');
        $this->notifications = auth()->user()->unreadNotifications->where('type', 'App\Notifications\NewUpdateOrderNotification');
        $this->unreadnotif = auth()->user()->unreadNotifications->where('type', 'App\Notifications\NewUpdateOrderNotification')->where('read_at', NULL);
        $this->countunreadnotif = auth()->user()->unreadNotifications->where('type', 'App\Notifications\NewUpdateOrderNotification')->count();
        

        
        \Midtrans\Config::$serverKey = 'Mid-server-t8dK65tiRb3vR-AUUWXYKc9y';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = true;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        if (isset($_GET['result_data'])) {
            $current_status = json_decode($_GET['result_data'],true);
            // dd($current_status);
            $order_id       = $current_status["order_id"];
            // dd($order_id);
            $status = \Midtrans\Transaction::status($order_id);
            $status = json_decode(json_encode($status), true);
            // dd($status);
            $this->Order = DB::table('order')->where('OrderID', $order_id);
            // dd($this->Order);
            $this->Order->update([
                'kodePayment' => 1,
                'statusPayment' => $status['transaction_status']
            ]);
            
               

            return redirect()->route('orderlist');
        }
        else{
            $this->Order = Order::where('OrderID', $OrderID)->first();
        }

        if(!empty($this->Order))
        {
            if ($this->Order->kodePayment == 0) {
                $params = array(
                    'transaction_details' => array(
                        'order_id' => $this->Order->OrderID,
                        'gross_amount' => $this->Order->GrandTotal,
                    ),
                    'customer_details' => array(
                        'first_name' => $this->Order->name,
                        'email' => $this->Order->email,
                        'phone' => $this->Order->phone,
                    ),
                );
    
                $this->snapToken = \Midtrans\Snap::getSnapToken($params);
    
                dd($params, $this->snapToken);
            }
            elseif($this->Order->kodePayment == 1){

                    $status = \Midtrans\Transaction::status($this->Order->OrderID);
                    $status = json_decode(json_encode($status), true);
                    // dd($status);
                    $this->orderid = $status['order_id'];
                    $this->payment_type = $status['payment_type'];
                    if($this->payment_type == 'bank_transfer'){
                        $this->va_number = $status['va_numbers'][0]['va_number'];

                        $this->bank = $status['va_numbers'][0]['bank'];
                    }
                    if ($this->payment_type == 'cstore') {
                        $this->store = $status['store'];
                    }
                    $this->transaction_status = $status['transaction_status'];
                    // dd($this->transaction_status);
                    $this->transaction_time = $status['transaction_time'];
                    $this->deadline = date('Y-m-d H:i:s', strtotime('+1 days', strtotime($status['transaction_time'])));
                    // dd($this->deadline);
                    $this->gross_amount = $status['gross_amount'];

                    $this->detailitems = OrderDetail::getOrderDetailItems()->where('OrderID', $this->Order->OrderID);

                    if ($this->transaction_status) {

                        return DB::table('order')->where('OrderID', $this->orderid)->update([ 'statusPayment' =>  $this->transaction_status, ]);

                    }
                    // elseif ($this->transaction_status == 'pending') {
                    //     $this->Order = DB::table('order')->where('OrderID', $this->Order->OrderID);
                    //     // dd($this->Order);
                    //     $this->Order->update([ 'statusPayment' => 'pending', ]);

                    // }

            }
            else{
                return redirect()->route('shop');
            }
    

        }

    }

    
    public function render()
    {

        if(!($this->Order->UserID == Auth::user()->id)){
            return redirect()->route('shop');
        }
        return view('livewire.pages.payment.paymentPage')->extends('layouts.pages.payment.page');
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
