<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'sub_category_id', 'title', 'slug', 'image', 'image_hover', 'description', 'custom_description', 'sale_price', 'min_quantity', 'unit_id', 'meta_title', 'meta_description', 'warranty', 'sku'];

    public function sub_category(){
        return $this->belongsTo(SubCategory::class);
    }
    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    public function unit(){
        return $this->belongsTo(Unit::class);
    }
    public function cartItems()
{
    return $this->hasMany(CartItem::class);
}
    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }
}
