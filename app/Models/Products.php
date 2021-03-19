<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Products extends Model
{
    public static function getProducts()
    {
        return DB::table('products')
        ->Join('productcategories', 'ProductCategoryID', '=', 'productcategories.CategoryID')
        ->select('*')
        ->get();
    }

    public static function getMostProducts()
    {
        return DB::table('products')
        ->Join('productcategories', 'ProductCategoryID', '=', 'productcategories.CategoryID')
        ->where('products.ProductID', 1)
        ->select('*')
        ->get();
    }

    public static function getMostFour()
    {
        return DB::table('products')
        ->Join('productcategories', 'ProductCategoryID', '=', 'productcategories.CategoryID')
        ->select('*')
        ->whereNotIn('products.ProductID', [1])
        ->limit(6)
        ->get();
    }

    public static function getProductsShirt()
    {
        return DB::table('products')
        ->Join('productcategories', 'ProductCategoryID', '=', 'productcategories.CategoryID')
        ->select('*')
        ->where('ProductCategoryID', 1)
        ->get();
    }

    public function getProductsJacket()
    {
        return DB::table('products')
        ->Join('productcategories', 'ProductCategoryID', '=', 'productcategories.CategoryID')
        ->select('*')
        ->where('ProductCategoryID', 2)
        ->get();
    }

    public function getProductsCrewneck()
    {
        return DB::table('products')
        ->Join('productcategories', 'ProductCategoryID', '=', 'productcategories.CategoryID')
        ->select('*')
        ->where('ProductCategoryID', 3)
        ->get();
    }

    public static function getNewArrival()
    {
        return DB::table('products')
        ->Join('productcategories', 'ProductCategoryID', '=', 'productcategories.CategoryID')
        ->select('*')
        ->limit(10)
        ->get();
    }


}
