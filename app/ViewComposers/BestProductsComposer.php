<?php

namespace App\ViewComposers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\View\View;

class BestProductsComposer
{

    public function compose(View $view)
    {
        //dd(Order::all()->map->products->flatten());
//        $bestProductsIds = Order::get()->map->products->flatten()->map->pivot->mapToGroups(function ($pivot) {
//            return [$pivot->product_id => $pivot->count];
//        })->map->sum()->sortByDesc(null)->take(3)->keys()->toArray();
//
//        $bestProducts = Product::whereIn('id', $bestProductsIds)->get();
//
//        //dump($bestProducts);
//        $view->with('bestProducts', $bestProducts);
    }

}
