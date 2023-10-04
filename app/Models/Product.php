<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'price',
        'sale_price',
        'path_image',
        'amount',
        'title',
        'description',
        'category_id',
    ];
    public function scopeSearch($query)
    {
        $key = request()->input('search');
        return $query->where('name', 'like', '%'.$key.'%');
    }
    public function categories(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Category::class , 'id', 'category_id');
    }
    public function productImages()
    {
        return $this->hasMany(Product_image::class, 'product_id', 'id');
    }
}
