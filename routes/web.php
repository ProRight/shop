<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\PropertyOptionController;
use App\Http\Controllers\Admin\SkuController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Admin\OrderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes([
    'reset' => false,
    'confirm' => false,
    'verify' => false,
]);

Route::get('locale/{locale}', [MainController::class, 'changeLocale'])->name('locale');
Route::get('currency/{currency}', [MainController::class, 'changeCurrency'])->name('currency');

Route::get('/home', function () {
    return redirect()->route('admin.orders.index');
})->name('home');

Route::post('/subscription/{product}', [MainController::class, 'subscription'])->name('subscription');

Route::
//middleware(['auth','is_admin'])->
prefix('admin')->name('admin.')->group(function () {
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::resource('categories', CategoryController::class);
    Route::resource('properties', PropertyController::class);
    Route::resource('products', ProductController::class);
    Route::resource('products/{product}/skus', SkuController::class);
    Route::resource('properties/{property}/property-options', PropertyOptionController::class);
});

Route::middleware('set_locale')->group(function () {

    Route::get('/', [MainController::class, 'index'])->name('index');
    Route::post('basket/add/{product}', [BasketController::class, 'basketAdd'])->name('basket_add');

    Route::middleware('basket_empty')->prefix('basket')->group(function () {
        Route::get('/', [BasketController::class, 'basket'])->name('basket');
        Route::get('/place', [BasketController::class, 'basketPlace'])->name('order');
        Route::post('/place', [BasketController::class, 'basketConfirm'])->name('order_confirm');
        Route::post('/delete/{product}', [BasketController::class, 'basketDelete'])->name('basket_delete');
    });

    Route::get('/categories', [MainController::class, 'categories'])->name('categories');
    Route::get('/{category:code}', [MainController::class, 'category'])->name('category');
    Route::get('/{category}/{product}/{sku}', [MainController::class, 'sku'])->name('sku');
});
