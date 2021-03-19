<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Carts extends Model
{
    protected $table = 'cart';
    protected $fillable = [
        'CartID',
        'id',
        'UserName',
        'ProductID',
        'ProductImage',
        'ProductName',
        'ProductSize',
        'ProductColor',
        'ProductWeight',
        'Quantity',
        'Price',
    ];

    public static function getCart()
    {
        if (Auth::User()) {
            return DB::table('cart')
            ->Join('products', 'cart.ProductID', '=', 'products.ProductID')
            ->Join('productcategories', 'products.ProductCategoryID', '=', 'productcategories.CategoryID')
            ->where('id', Auth::user()->id)
            ->select('*')
            ->get();
        }
    }

    public static function getCountCart()
    {
        if (Auth::User()) {
        return DB::table('cart')
        ->where('id', Auth::user()->id)
        ->count();
        }
    }

    public static function getWeightCart()
    {
        return DB::table('cart')
            ->where('id', Auth::user()->id)
            ->sum('ProductWeight');
    }

    public function deleteCart($CartID)
    {
        DB::table('cart')
            ->where('CartID', $CartID)
            ->delete();
    }

    public function updateCart($CartID, $data)
    {
        DB::table('cart')
            ->where('CartID', $CartID)
            ->update($data);
    }
}
