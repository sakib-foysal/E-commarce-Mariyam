<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OflineSaleItem extends Model
{
    protected $fillable = [
        'ofline_sale_id',
        'product_id',
        'product_name',
        'imei',
        'serial_no',
        'quantity',
        'unit_price',
        'discount',
        'warranty',
        'total',
        'paid',
        'due',
    ];
}
