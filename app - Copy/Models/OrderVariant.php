<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderVariant extends Model
{
    use HasFactory;     
    public function order(){
        return $this->belongsTo(Order::class);
    }
    public function product_variant(){
        return $this->belongsTo(ProductVariant::class);
    }
}
