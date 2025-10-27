<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;     
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
}
