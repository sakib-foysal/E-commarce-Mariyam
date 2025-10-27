<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Source;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['setting'] = Setting::first();
        $data['stocks'] = Stock::with('product', 'source')->get();
        return view('stocks.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['setting'] = Setting::first();
        $data['products'] = Product::all();
        $data['sources'] = Source::all();
        return view('stocks.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'source_id' => 'required|exists:sources,id',
            'quantity' => 'required|integer|min:0',
        ]);

        $product = Product::find($request->product_id);

        Stock::create([
            'product_id' => $request->product_id,
            'source_id' => $request->source_id,
            'product_name' => $product->title,
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('stocks.index')->with('success', 'Stock created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['setting'] = Setting::first();
        $data['stock'] = Stock::findOrFail($id);
        $data['products'] = Product::all();
        return view('stocks.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:0',
        ]);

        $stock = Stock::findOrFail($id);
        $product = Product::find($request->product_id);

        $stock->update([
            'product_id' => $request->product_id,
            'product_name' => $product->title,
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('stocks.index')->with('success', 'Stock updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $stock = Stock::findOrFail($id);
        $stock->delete();

        return redirect()->route('stocks.index')->with('success', 'Stock deleted successfully.');
    }
}
