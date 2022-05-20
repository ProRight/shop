<?php

namespace App\Models;

use App\Models\Traits\Transletable;
use App\Services\CurrencyConvert;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, Transletable;

    protected $table = 'products';
    protected $with = ['category'];
    protected $fillable = ['name', 'code', 'description', 'image', 'hit', 'new', 'recomend', 'category_id', 'name_en', 'description_en'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function skus()
    {
        return $this->hasMany(Sku::class);
    }

    public function properties()
    {
        return $this->belongsToMany(Property::class,'property_product')->withTimestamps();
    }

    public function getSumProducts()
    {
        if (!empty($this->pivot)) {
            return $this->pivot->count * $this->price;
        }
        return $this->price;
    }

    public function getPriceAttribute($value){
        return round(CurrencyConvert::convert($value),2);
    }

    public function getCurrencyAttribute($value){
        return $value;
    }

}
