<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Providers\UpdateOrder;
use Illuminate\Support\Facades\DB;
class UpdateOrderController extends Controller
{
    public function markNotif(Request $request)
    {
        auth()->user()
            ->unreadNotifications
            ->when($request->input('id'), function ($query) use ($request) {
                return $query->where('id', $request->input('id'));
            })
            ->markAsRead();
    
        return response()->noContent();
    }
    public function updateorder(Request $request)
    {

        $Order = [
            'UserID' => $request->userid,
            'OrderID' => $request->orderid,
            'receipt' => $request->receipt,
        ];

        Order::where('OrderID', $request->orderid)->update(['receipt' => $request->receipt]);
        event(new UpdateOrder($Order));
        return redirect()->route('admin');
    }
}
