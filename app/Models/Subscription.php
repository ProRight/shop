<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = ['email', 'product_id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function scopeActiveByProductId($query, $productId)
    {
        return $query->where('active',1)->where('product_id', $productId);
    }

    public static function sendSubscr(Product $product)
    {
        $sub = self::ActiveByProductId($product->id)->get();
    }
}
