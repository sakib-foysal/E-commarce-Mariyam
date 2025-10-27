<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderVariant;

class OrderVariantController extends Controller
{
    public function delete_order_variant($id){
        $data = OrderVariant::find($id);
        $data->delete();
        return back();
    }
}
