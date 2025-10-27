<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'product_name', 'quantity', 'source_id', 'phone_number', 'type'];

    public function source()
    {
        return $this->belongsTo(Source::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
