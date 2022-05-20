<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'currency_id', 'sum'];

    // protected $withCount = ['category'];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot(['count', 'price'])->withTimestamps();
    }

    public function getFullPrice()
    {
        $sum = 0;

        foreach ($this->products()->without('category')->get() as $product) {
            $sum += $product->getSumProducts();
        }
        return $sum;
    }

    public function getFullSum()
    {
        $sum = 0;
        foreach ($this->products as $product) {
            $sum += $product->price * $product->countInOrder;
        }
        return $sum;
    }


    public function saveOrder($name, $phone)
    {

        $this->name = $name;
        $this->phone = $phone;
        $this->status = true;
        $this->sum = $this->getFullSum();
        $this->save();
        session()->forget('order');
        return true;
    }

    public function scopeStatus($query)
    {
        return $this->where('status', 1);
    }
}
