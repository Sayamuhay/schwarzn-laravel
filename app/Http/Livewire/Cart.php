<?php

namespace App\Http\Livewire;

use App\Models\Products;
use App\Models\Carts;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Http\Controllers\OrderController as InOrder;
use Illuminate\Support\Facades\DB;
use Kavist\RajaOngkir\Facades\RajaOngkir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class Cart extends Component
{


    public $counts;
    public $newArrival = [];
    public $cart = [];
    public $kode;
    public $carts, $productsize, $quantity, $cart_id;
    public $updateMode = false;
    public $weight;

    public $ProductName, $ProductSize, $Quantity, $Price;

    public $notifications, $readednotif, $unreadnotif, $countunreadnotif ;

    public $countorder;
    public $countorderhaspaid;

    public $daftarProvinsi;
    public $daftarKota;
    public $provinceId, $kota_id, $jasa, $nama_jasa, $code_courier;
    public $Ongkirx;
    public $courierservice;
    public $result = [];

    public function mount()
    {
        $this->readednotif = auth()->user()->notifications->where('type', 'App\Notifications\NewUpdateOrderNotification');
        $this->notifications = auth()->user()->unreadNotifications->where('type', 'App\Notifications\NewUpdateOrderNotification');
        $this->unreadnotif = auth()->user()->unreadNotifications->where('type', 'App\Notifications\NewUpdateOrderNotification')->where('read_at', NULL);
        $this->countunreadnotif = auth()->user()->unreadNotifications->where('type', 'App\Notifications\NewUpdateOrderNotification')->count();
    }

    public function getOngkir()
    {

        // validate
        if (!$this->provinceId || !$this->kota_id || !$this->jasa)
        {
            return;
        }

        $this->weight = Carts::getWeightCart();        
        $daftarOngkir = RajaOngkir::ongkosKirim([
            'origin'        => 22,     // ID kota bandung
            'destination'   => $this->kota_id,      // ID kota/kabupaten tujuan
            'weight'        => $this->weight,    // berat barang dalam gram
            'courier'       => $this->jasa    // kode kurir pengiriman: ['jne', 'tiki', 'pos'] untuk starter
        ])->get();


        $this->nama_jasa = $daftarOngkir[0]['name'];
        $this->code_courier = $daftarOngkir[0]['code'];
        foreach ($daftarOngkir[0]['costs'] as $row) {
             $this->result[] = array(
                 'description' => $row['description'],
                 'biaya' => $row['cost'][0]['value'],
                 'etd' => $row['cost'][0]['etd'],
                 'service' => $row['service']
             );
        }
        
 
    }

    public function resetOngkir()
    {
        $this->result = [];
    }

    public function masukOngkir($biaya, $service)
    {
        // dd($biaya, $service);
        $this->courierservice = $service;
        $this->Ongkirx = $biaya;
        return $this->resetOngkir();
    }


    public function render()
    {
        
        $this->counts = Carts::getCountCart();
        $this->cart = Carts::getCart();
        $this->newArrival = Products::getNewArrival();
        $this->kode = rand();
        $this->daftarProvinsi = RajaOngkir::provinsi()->all();
        $this->weight = Carts::getWeightCart();
        $this->Ongkirx;

        if (Auth::user()) {
            $this->countorderhaspaid = Order::getCountOrderHasPaid();
            $this->countorder = Order::getCountOrder();
        }
        if ($this->provinceId) {

            $this->daftarKota = RajaOngkir::kota()->dariProvinsi($this->provinceId)->get();

        }

        return view('livewire.pages.cart.cart')->section('content');
    }

    private function resetInputFields(){
        $this->productsize = '';
        $this->quantity = '';
    }
    public function store()
    {
        $validatedDate = $this->validate([
            'productsize' => 'required',
            'quantity' => 'required',
        ]);
        Carts::create($validatedDate);
        session()->flash('message', 'Users Created Successfully.');
        $this->resetInputFields();
        $this->emit('cartStore'); // Close model to using to jquery
    }
    public function edit($CartID)
    {
        $this->updateMode = true;
        $cart = Carts::where('CartID',$CartID)->first();
        $this->cart_id = $CartID;
        $this->productsize = $cart->ProductSize;
        $this->quantity = $cart->Quantity;
        // dd($cart);
        
    }
    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }
    public function update()
    {
        $validatedDate = $this->validate([
            'productsize' => 'required',
            'quantity' => 'required',
        ]);
        if ($this->cart_id) {
            $cart = Carts::where('CartID',$this->cart_id);
            $cart->update([
                'ProductSize' => $this->productsize,
                'Quantity' => $this->quantity,
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Item Updated Successfully.');
            $this->resetInputFields();
            
        }
    }
    public function delete($CartID)
    {
        if($CartID){
            Carts::where('CartID',$CartID)->delete();
            session()->flash('message', 'Item Deleted Successfully.');
        }
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
