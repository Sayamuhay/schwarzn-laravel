<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Carts;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ShopController extends Controller
{
    public function __construct()
    {
        $this->ProductModel = new Products();
        $this->CartModel = new Carts();
        $this->Order = new Order();

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        if (!Auth::user()) {
 
            $data = [
                'product' => $this->ProductModel->getProducts(),
                'newArrival' => $this->ProductModel->getNewArrival(),
                'tittle' => 'All Products',
                'mainTittle' => 'Shop | Schwarzn',
            ];

            return view('livewire.pages.shop.shop', $data);
        }

        

        $data = [

            'product' => $this->ProductModel->getProducts(),
            'newArrival' => $this->ProductModel->getNewArrival(),
            'tittle' => 'All Products',
            'mainTittle' => 'Shop | Schwarzn',
            'cart' => $this->CartModel->getCart(),
            'counts' => $this->CartModel->getCountCart(),
            'countorderhaspaid' => $this->Order->getCountOrderHasPaid(),
            'countorder' => $this->Order->getCountOrder(),
            'readednotif' => auth()->user()->notifications->where('type', 'App\Notifications\NewUpdateOrderNotification'),
            'notifications' => auth()->user()->unreadNotifications->where('type', 'App\Notifications\NewUpdateOrderNotification'),
            'unreadnotif' => auth()->user()->unreadNotifications->where('type', 'App\Notifications\NewUpdateOrderNotification')->where('read_at', NULL),
            'countunreadnotif' => auth()->user()->unreadNotifications->where('type', 'App\Notifications\NewUpdateOrderNotification')->count(),
        ];
        return view('livewire.pages.shop.shop', $data);
    }

    public function shirt()
    {
        if (!Auth::user()) {
            $data = [
                'product' => $this->ProductModel->getProductsShirt(),
                'newArrival' => $this->ProductModel->getNewArrival(),
                'tittle' => 'T-Shirt',
                'mainTittle' => 'Shop | Schwarzn'
            ];

            return view('livewire.pages.shop.shop', $data);
        }

        $data = [
            'product' => $this->ProductModel->getProductsShirt(),
            'newArrival' => $this->ProductModel->getNewArrival(),
            'tittle' => 'T-shirt',
            'cart' => $this->CartModel->getCart(),
            'counts' => $this->CartModel->getCountCart(),
            'mainTittle' => 'Shop | Schwarzn',
            'cart' => $this->CartModel->getCart(),
            'counts' => $this->CartModel->getCountCart(),
            'countorderhaspaid' => $this->Order->getCountOrderHasPaid(),
            'countorder' => $this->Order->getCountOrder(),
            'readednotif' => auth()->user()->notifications->where('type', 'App\Notifications\NewUpdateOrderNotification'),
            'notifications' => auth()->user()->unreadNotifications->where('type', 'App\Notifications\NewUpdateOrderNotification'),
            'unreadnotif' => auth()->user()->unreadNotifications->where('type', 'App\Notifications\NewUpdateOrderNotification')->where('read_at', NULL),
            'countunreadnotif' => auth()->user()->unreadNotifications->where('type', 'App\Notifications\NewUpdateOrderNotification')->count(),
        ];
        return view('livewire.pages.shop.shop', $data);
    }

    public function jacket()
    {
        if (!Auth::user()) {
            $data = [
                'product' => $this->ProductModel->getProductsJacket(),
                'newArrival' => $this->ProductModel->getNewArrival(),
                'tittle' => 'Jacket',
                'mainTittle' => 'Shop | Schwarzn'
            ];

            return view('livewire.pages.shop.shop', $data);
        }
        $data = [
            'product' => $this->ProductModel->getProductsJacket(),
            'newArrival' => $this->ProductModel->getNewArrival(),
            'tittle' => 'Jacket',
            'cart' => $this->CartModel->getCart(),
            'counts' => $this->CartModel->getCountCart(),
            'mainTittle' => 'Shop | Schwarzn',
            'cart' => $this->CartModel->getCart(),
            'counts' => $this->CartModel->getCountCart(),
            'countorderhaspaid' => $this->Order->getCountOrderHasPaid(),
            'countordertopaid' => $this->Order->getCountOrderToPaid(),
            'cart' => $this->CartModel->getCart(),
            'counts' => $this->CartModel->getCountCart(),
            'countorderhaspaid' => $this->Order->getCountOrderHasPaid(),
            'countorder' => $this->Order->getCountOrder(),
            'readednotif' => auth()->user()->notifications->where('type', 'App\Notifications\NewUpdateOrderNotification'),
            'notifications' => auth()->user()->unreadNotifications->where('type', 'App\Notifications\NewUpdateOrderNotification'),
            'unreadnotif' => auth()->user()->unreadNotifications->where('type', 'App\Notifications\NewUpdateOrderNotification')->where('read_at', NULL),
            'countunreadnotif' => auth()->user()->unreadNotifications->where('type', 'App\Notifications\NewUpdateOrderNotification')->count(),
        ];
        return view('livewire.pages.shop.shop', $data);
    }

    public function crewneck()
    {
        if (!Auth::user()) {
            $data = [
                'product' => $this->ProductModel->getProductsCrewneck(),
                'newArrival' => $this->ProductModel->getNewArrival(),
                'tittle' => 'Crewneck',
                'mainTittle' => 'Shop | Schwarzn',
            ];

            return view('livewire.pages.shop.shop', $data);
        }
        $data = [
            'product' => $this->ProductModel->getProductsCrewneck(),
            'newArrival' => $this->ProductModel->getNewArrival(),
            'tittle' => 'Crewneck',
            'cart' => $this->CartModel->getCart(),
            'counts' => $this->CartModel->getCountCart(),
            'mainTittle' => 'Shop | Schwarzn',
            'cart' => $this->CartModel->getCart(),
            'counts' => $this->CartModel->getCountCart(),
            'countorderhaspaid' => $this->Order->getCountOrderHasPaid(),
            'countorder' => $this->Order->getCountOrder(),
            'readednotif' => auth()->user()->notifications->where('type', 'App\Notifications\NewUpdateOrderNotification'),
            'notifications' => auth()->user()->unreadNotifications->where('type', 'App\Notifications\NewUpdateOrderNotification'),
            'unreadnotif' => auth()->user()->unreadNotifications->where('type', 'App\Notifications\NewUpdateOrderNotification')->where('read_at', NULL),
            'countunreadnotif' => auth()->user()->unreadNotifications->where('type', 'App\Notifications\NewUpdateOrderNotification')->count(),
        ];
        return view('livewire.pages.shop.shop', $data);
    }

    public function insertCart(Request $request)
    {
		if (Auth::user()) {
			DB::table('cart')->insert([
				'id' => $request->id,
				'UserName' => $request->name,
				'ProductID' => $request->ProductID,
				'ProductImage' => $request->ProductImage,
				'ProductName' => $request->ProductName,
				'ProductSize' => $request->ProductSize,
                'ProductColor' => $request->ProductColor,
                'ProductWeight' => $request->ProductWeight,
				'Quantity' => $request->Quantity,
				'Price' => $request->ProductPrice
			]);
	 
			return redirect()->to('/shop');
		}
        return redirect()->to('/login');
    }
    
    public function search(Request $request)
    {

        if($request->has('search')){
            $product = DB::table('products')
                        ->Join('productcategories', 'ProductCategoryID', '=', 'productcategories.CategoryID')
                        ->where('products.ProductName', 'LIKE', '%'.$request->search.'%')
                        ->get();
            // dd($product);
        }
        if(!Auth::user())
        {

            $data = [
                'product' => $product,
                'newArrival' => $this->ProductModel->getNewArrival(),
                'tittle' => 'All Products',
                'mainTittle' => 'Shop | Schwarzn',
            ];
    
            return view('livewire.pages.shop.shop', $data);
        }

        $data = [
            'product' => $product,
            'newArrival' => $this->ProductModel->getNewArrival(),
            'tittle' => 'All Products',
            'mainTittle' => 'Shop | Schwarzn',
            'cart' => $this->CartModel->getCart(),
            'counts' => $this->CartModel->getCountCart(),
            'countorderhaspaid' => $this->Order->getCountOrderHasPaid(),
            'countorder' => $this->Order->getCountOrder(),
            'readednotif' => auth()->user()->notifications->where('type', 'App\Notifications\NewUpdateOrderNotification'),
            'notifications' => auth()->user()->unreadNotifications->where('type', 'App\Notifications\NewUpdateOrderNotification'),
            'unreadnotif' => auth()->user()->unreadNotifications->where('type', 'App\Notifications\NewUpdateOrderNotification')->where('read_at', NULL),
            'countunreadnotif' => auth()->user()->unreadNotifications->where('type', 'App\Notifications\NewUpdateOrderNotification')->count(),
        ];

        return view('livewire.pages.shop.shop', $data);
    }

}
