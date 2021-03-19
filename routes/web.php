<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OrderChartController;
use App\Http\Controllers\UpdateOrderController;
use App\Http\Livewire\Payment;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Auth::routes(['verify' => true]);

//Route::get('/cart', \App\Http\Livewire\Cart::class);

// route cart page
    Route::view('cart','layouts.pages.cart.page')->name('cart')->middleware(['auth','verified']);
// end route cart page

//route get link
    //route get home etc.
        Route::get('/', \App\Http\Livewire\Home::class)->name('home');
        Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
    //end route get home etc.

    // route get admin
    Route::get('admin', \App\Http\Livewire\Admin::class)->name('admin');
    Route::get('/detail/{OrderID}', \App\Http\Livewire\AdminDetailOrder::class)->name('detailorder')->middleware(['auth','verified']);
    // end route get admin

    //route get shop page
        Route::get('/shop', [ShopController::class, 'index'])->name('shop');
        Route::get('/tshirt', [ShopController::class, 'shirt'])->name('tshirt');
        Route::get('/jacket', [ShopController::class, 'jacket'])->name('jacket');
        Route::get('/crewneck', [ShopController::class, 'crewneck'])->name('crewneck');
        Route::get('/besteller', [ShopController::class, 'bestseller'])->name('bestseller');
        Route::get('/new', [ShopController::class, 'new'])->name('new');
        Route::get('/search', [ShopController::class, 'search']);
    //end route get shop page

    //route profile page
        Route::view('profil', 'layouts.pages.profil.page')->name('account')->middleware(['auth','verified']);
        Route::view('OrderList', 'layouts.pages.orderlist.page')->name('orderlist')->middleware(['auth','verified']);
        Route::get('/order/{OrderID}', \App\Http\Livewire\Paid::class)->name('ordercek')->middleware(['auth','verified']);
    //end route get profile page
//end route get link

//route get input
    Route::post('/order/createOrder', [OrderController::class, 'createOrder'])->name('createOrder')->middleware(['auth','verified']);
    Route::post('/insertCart', [ShopController::class, 'insertCart'])->name('inserttocart')->middleware(['auth','verified']);
    Route::post('/updateorder', [UpdateOrderController::class, 'updateorder'])->name('updateorder');
//route end get input

//route forbidden
    Route::get('/order/createOrder',function(){return view('403forbidden');})->name('403');
    Route::get('/insertCart', function(){return view('403forbidden');})->name('403');

//end route forbidden

// Route::get('/cek', [OrderController::class, 'cek'])->name('cek');
// Route::get('/ngecek', [OrderController::class, 'ngecek'])->name('ngecek');

// route for admin


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
