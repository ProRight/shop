<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Currency;
use App\Models\Product;
use App\Models\Sku;
use App\Models\Subscription;
use App\Services\CurrencyRates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class MainController extends Controller
{
    public function index()
    {
        //CurrencyRates::getRates();
        $skusQuery = Sku::with('product','product.category');
        $skus = $skusQuery->simplePaginate(10);
        return view('index', compact('skus'));
    }

    public function categories()
    {
        return view('categories');
    }

    public function category(Category $category)
    {
        return view('category', compact('category'));
    }

    public function sku($categoryCode, $productCode, Sku $sku)
    {
        if($sku->product->category->code != $categoryCode){
            abort(404, 'Category not found');
        }
        if($sku->product->code != $productCode){
            abort(404, 'Product not found');
        }


        return view('product', compact('sku'));
    }

    public function subscription(Request $request, Product $product)
    {
        Subscription::create([
            'email' => $request->email,
            'product_id' => $product->id,
        ]);

        return redirect()->back()->with('success', 'Вы узнаете когда будет товар в наличии');
    }

    public function changeLocale($locale)
    {
        session(['locale' => $locale]);
        return redirect()->back();
    }

    public function changeCurrency($currency)
    {
        $cur = Currency::ByCode($currency)->firstOrFail();
        session(['currency' => $cur->code]);
        return redirect()->back();
    }

}
