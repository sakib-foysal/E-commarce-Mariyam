<?php

namespace App\Http\Controllers;

// cSpell:ignore Ofline
use App\Models\OflineSale;
use App\Models\OflineSaleItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OfflineSalesController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'customer.name' => 'required|string|max:255',
            'customer.phone' => 'required|string|max:20',
            'customer.address' => 'required|string',
            'customer.date' => 'required|date',
            'products' => 'nullable|array',
            'phones' => 'nullable|array',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            DB::beginTransaction();

            $customerData = $request->input('customer');
            $products = $request->input('products', []);
            $phones = $request->input('phones', []);

            $grandTotal = 0;
            $totalPaid = 0;

            foreach ($products as $product) {
                $grandTotal += floatval($product['total']);
                $totalPaid += floatval($product['paid']);
            }
            foreach ($phones as $phone) {
                $grandTotal += floatval($phone['total']);
                $totalPaid += floatval($phone['paid']);
            }

            $sale = OflineSale::create([
                'customer_name' => $customerData['name'],
                'customer_phone' => $customerData['phone'],
                'customer_email' => $customerData['email'],
                'customer_address' => $customerData['address'],
                'sale_date' => $customerData['date'],
                'grand_total' => $grandTotal,
                'total_paid' => $totalPaid,
                'total_due' => $grandTotal - $totalPaid,
            ]);

            foreach ($products as $product) {
                OflineSaleItem::create([
                    'ofline_sale_id' => $sale->id,
                    'product_id' => $product['id'],
                    'product_name' => $product['name'],
                    'quantity' => $product['quantity'],
                    'unit_price' => $product['unitPrice'],
                    'discount' => $product['discount'],
                    'warranty' => $product['warranty'],
                    'total' => $product['total'],
                    'paid' => $product['paid'],
                    'due' => $product['due'],
                ]);
            }

            foreach ($phones as $phone) {
                OflineSaleItem::create([
                    'ofline_sale_id' => $sale->id,
                    'product_id' => $phone['id'],
                    'product_name' => $phone['name'],
                    'imei' => $phone['imei'],
                    'serial_no' => $phone['serialNo'],
                    'quantity' => $phone['quantity'],
                    'unit_price' => $phone['unitPrice'],
                    'discount' => $phone['discount'],
                    'warranty' => $phone['warranty'],
                    'total' => $phone['total'],
                    'paid' => $phone['paid'],
                    'due' => $phone['due'],
                ]);
            }

            DB::commit();

            return response()->json(['message' => 'Sale completed successfully!'], 200);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'An error occurred while processing the sale.', 'error' => $e->getMessage()], 500);
        }
    }
}
