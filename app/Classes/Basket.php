<?php

namespace App\Classes;

use App\Mail\OrderCreated;
use App\Models\Order;
use App\Models\Product;
use App\Services\CurrencyConvert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class Basket
{

    protected $order;

    public function __construct()
    {
        $order = session('order');
        if (is_null($order)) {

            $data = [];

            if (Auth::check()) {
                $data['user_id'] = Auth::id();
            }

            $data['currency_id'] = CurrencyConvert::getCurrentCurrencyFromSession();

            $this->order = new Order($data);
            session(['order' => $this->order]);
        } else {
            $this->order = $order;
        }

        //$this->order = Order::findOrFail($orderId ?? $order->id);
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return $this->order;
    }


//    protected function getPivotRow($product)
//    {
//
//        return $this->order->products()->where('product_id', $product->id)->first()->pivot;
//
//    }

    public function saveOrder($name, $phone, $email)
    {
        Mail::to($email)->send(new OrderCreated());
        return $this->order->saveOrder($name, $phone);
    }

    public function productDelete(Product $product)
    {

        if ($this->order->products->contains($product)) {
            $pivotRow = $this->order->products->where('id',$product->id)->first();
            if ($pivotRow->countInOrder < 2) {
                $this->order->products->pop($product);
            } else {
                $pivotRow->countInOrder--;
            }
        }

    }

    public function addProduct(Product $product)
    {
        if ($this->order->products->contains($product)) {
            $pivotRow = $this->order->products->where('id',$product->id)->first();
            $pivotRow->countInOrder ++;
        } else {
            $product->countInOrder = 1;
            $this->order->products->push($product);
        }

    }


}
