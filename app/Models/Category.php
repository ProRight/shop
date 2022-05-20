<?php

namespace App\Models;

use App\Models\Traits\Transletable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, Transletable;
    //dd(App);

    protected $table = 'categories';
    protected $fillable = ['name', 'code', 'description', 'image', 'name_en', 'description_en'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
