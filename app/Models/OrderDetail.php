<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrderDetail extends Model
{
    protected $table = "detailorder";
    protected $fillable = [
        'OrderID',
        'UserID',
        'name',
        'ProductID',
        'ProductName',
        'ProductSize',
        'Quantity',
        'SubTotal'
    ];
    public $timestamps = false;
    public $incrementing = false;

    public static function hasOrdered()
    {
        return DB::table('detailorder')
        ->Join('products', 'detailorder.ProductID', '=', 'products.ProductID')
        ->Join('productcategories', 'products.ProductCategoryID', '=', 'productcategories.CategoryID')
        ->Join('order', 'detailorder.OrderID', '=', 'order.OrderID')
        ->where('detailorder.UserID', Auth::user()->id)
        ->where('order.kodePayment', 1)
        ->where('order.statusPayment', 'settlement')
        ->select('*')
        ->get();
    }

    public static function getOrderDetailItems()
    {
        return DB::table('detailorder')
        ->Join('products', 'detailorder.ProductID', '=', 'products.ProductID')
        ->Join('productcategories', 'products.ProductCategoryID', '=', 'productcategories.CategoryID')
        ->Join('order', 'detailorder.OrderID', '=', 'order.OrderID')
        ->where('detailorder.UserID', Auth::user()->id)
        ->select('*')
        ->get();
    }

    public static function getOrderDetailItemsAdmin()
    {
        return DB::table('detailorder')
        ->Join('products', 'detailorder.ProductID', '=', 'products.ProductID')
        ->Join('productcategories', 'products.ProductCategoryID', '=', 'productcategories.CategoryID')
        ->Join('order', 'detailorder.OrderID', '=', 'order.OrderID')
        ->select('*')
        ->get();
    }

}
