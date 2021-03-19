<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    protected $table = 'order';
    protected $primarykey = 'OrderID';
    protected $fillable = [
        'OrderID',
        'UserID',
        'name',
        'phone',
        'email',
        'TotalItem',
        'SubTotalPrice',
        'provinsi',
        'city',
        'postalCode',
        'alamat',
        'shipping',
        'shippingService',
        'receipt',
        'ongkir',
        'GrandTotal',
        'kodePayment',
        'statusPayment'
    ];
    public $timestamps = false;
    public $incrementing = false;

    public static function kode()
    {
    	$kode = DB::table('order')->max('OrderID');
    	$addNol = '';
    	$kode = str_replace("Order", "", $kode);
    	$kode = (int) $kode + 1;
        $incrementKode = $kode;

    	if (strlen($kode) == 1) {
    		$addNol = "000";
    	} elseif (strlen($kode) == 2) {
    		$addNol = "00";
    	} elseif (strlen($kode == 3)) {
    		$addNol = "0";
    	}

    	$kodeBaru = "Order".$addNol.$incrementKode;
    	return $kodeBaru;
    }

    public static function insertDetailOrder($datadetail)
    {

        DB::table('detailorder')
        ->insert($datadetail);

    }

    public static function getOrderList()
    {
        return DB::table('order')
        ->where('UserID', Auth::user()->id)
        ->select('*')
        ->orderBy('statusPayment', 'asc')
        ->get();
    }

    public static function getCountOrder()
    {

        return DB::table('order')
        ->where('UserID', Auth::user()->id)
        ->count();

    }

    public static function getCountOrderToPaid()
    {
        return DB::table('order')
        ->where('UserID', Auth::user()->id)
        ->where('kodePayment', 0)
        ->count();

    }

    public static function getCountOrderHasPaid()
    {
        return DB::table('order')
        ->where('UserID', Auth::user()->id)
        ->where('kodePayment', 1)
        ->count();

    }

    public static function getOrderToPaid()
    {

        return DB::table('order')
        ->where('UserID', Auth::user()->id)
        ->where('kodePayment', 0)
        ->select('*')
        ->get();

    }
    public static function getOrderHasPaid()
    {
        
        return DB::table('order')
        ->where('UserID', Auth::user()->id)
        ->where('kodePayment', 1)
        ->select('*')
        ->get();

    }

    // from this, for admin

    
    public static function getOrderListUniversal()
    {
        return DB::table('order')
        ->select('*')
        ->get();
    }

    public static function getOrderCountUniversal()
    {
        return DB::table('order')
        ->select('all')
        ->count();
    }

    public static function getCountSales()
    {
        return DB::table('order')
        ->select('*')
        ->where('statusPayment', 'settlement')
        ->sum('GrandTotal');
    }

}

