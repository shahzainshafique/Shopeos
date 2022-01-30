<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Order;

class OrderController extends Controller
{
    public function orders(){
        $orders=Order::where('status','0')->get();
        return view('admin.orders.index', compact('orders'));
    }
}
