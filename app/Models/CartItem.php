<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product; // Assuming you have a Product model

class CartItem extends Model
{
    use HasFactory;

    protected $table = 'cart_items';

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
    ];

    // Define relationship with Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Define relationship with User (optional)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
