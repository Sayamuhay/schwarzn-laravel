<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Products;
use App\Models\Carts;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Providers\Ordered;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->OrderModel = new Order();
        $this->OrderDetailModel = new OrderDetail();
        $this->ProductModel = new Products();
        $this->CartModel = new Carts();
    }
    public function createOrder(Request $request)
	{
        $validatedDate = $request->all([
            'name' => 'required',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email' =>'required|email|unique:@',
        ]);
        $data = $request->all();

        $datax1 = [
            'OrderID' => $request->kode,
            'UserID' => Auth::user()->id,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'TotalItem' => $request->counts,
            'SubTotalPrice' => $request->total,
            'provinsi' => $request->provinsi_id,
            'city' => $request->kota_id,
            'postalCode' => $request->postalCode,
            'alamat' => $request->address,
            'shipping' => $request->jasa,
            'shippingService' => $request->shippingService,
            'ongkir' => $request->ongkir,
            'GrandTotal' => $request->grandtotal,
            'kodePayment' => 0,
        ];
        Order::create($datax1);
        // $lastid = OrderModel::create($data)->id;
        if (array($data['OrderID'] > 0)){
        // {

        foreach($data['OrderID'] as $item => $value){
            $datax = array(
            'OrderID' => $data['OrderID'][$item],
            'UserID' => Auth::user()->id,
            'name' => Auth::user()->name,
            'ProductID' => $data['ProductID'][$item],
            'ProductName' => $data['ProductName'][$item],
            'ProductSize' => $data['ProductSize'][$item],
            'Quantity' => $data['ProductQuantity'][$item],
            'SubTotal' => $data['Price'][$item],

            );
             OrderDetail::create($datax);
            
            //  dd($datax);
         }
        }


        DB::table('cart')->where('id', Auth::user()->id)->delete();
        event(new Ordered($datax1));
        return $this->statusOrder($datax1);
    }
    

    public function statusOrder($datax1)
    {
        $data = [
            'product' => $this->ProductModel->getProducts(),
            'newArrival' => $this->ProductModel->getNewArrival(),
            'tittle' => 'Status',
            'mainTittle' => 'Status Order | Schwarzn',
            'cart' => $this->CartModel->getCart(),
            'counts' => $this->CartModel->getCountCart(),
            'order' => $datax1
        ];
        return redirect()->route('orderlist');
    }
}
