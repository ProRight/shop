<?php

namespace App\Http\Controllers;

use App\Classes\Basket;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    public function basket()
    {
        $order = (new Basket())->getOrder();
        return view('basket', compact('order'));
    }


    public function basketPlace()
    {
        $order = (new Basket())->getOrder();
        return view('order', compact('order'));
    }

    public function basketConfirm(Request $request)
    {
        $email = Auth::check() ? Auth::user()->email : $request->email;
        $result = (new Basket())->saveOrder($request->name, $request->phone, $email);

        if ($result) {
            session()->flash('alert_success', 'Заказ в обработке');
        } else {
            session()->flash('alert_danger', 'Произошла ошибка при оформлении заказа');
        }
        return to_route('index');
    }


    public function basketAdd(Product $product)
    {

        (new Basket())->addProduct($product);

        session()->flash("alert_success", "Товар {$product->name} добавлен в корзину");

        return to_route('basket');
    }

    public function basketDelete(Product $product)
    {
        (new Basket())->productDelete($product);

        session()->flash("alert_success", "Товар {$product->name} удалён из корзины");

        return to_route('basket');
    }
}
