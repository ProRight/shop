<?php

namespace App\Observers;

use App\Models\Product;

class ProductObserver
{
    public function updating(Product $product)
    {
        $old = $product->getOriginal('price');

        if($old == 0 && $product->price >0){
echo 'Запустили';
        }
    }
}
