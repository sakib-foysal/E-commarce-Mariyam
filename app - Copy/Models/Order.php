<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 
        'product_id', 
        'quantity', 
        'status',
        // other fillable attributes...
    ];
    public function order_variants(){
        return $this->hasMany(OrderVariant::class);
    } 
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
