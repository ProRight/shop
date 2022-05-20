<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Subscription;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        //Subscription::sendSubscr(Product::find(1));
//        $ww = Product::find(1);
//        $ww->price = 2;
//        $ww->save();

        $orders = Order::status()->get();
        return view('auth.orders.index', compact('orders'));
    }
}
