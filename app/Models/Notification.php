<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Notification extends Model
{
    protected $table = 'notifications';
    protected $fillable = [
        'id',
        'type',
        'notifiable_type',
        'notifiable_id',
        'data',
        'read_at',
        'created_at',
        'updated_at',
    ];
    public static function getNotif()
    {

        return DB::table('notifications')
        ->select('*')
        ->get();

    }

    public static function getUnreadNotif()
    {

        return DB::table('notifications')
        ->select('*')
        ->where('read_at', NULL)
        ->get();

    }

    public static function getCountNotif()
    {

        return DB::table('notifications')
        ->count();

    }

}
