<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Product;
use App\Models\Journal;

class SaleController extends Controller
{
     public function index() {
        $sales = Sale::with('product')->latest()->get();
        return view('sales.index', compact('sales'));
    }

    public function create() {
        $products = Product::all();
        return view('sales.create', compact('products'));
    }

    public function store(Request $request) {
        $request->validate([
            'product_id' => 'required',
            'qty' => 'required|integer',
            'discount' => 'numeric',
            'paid_amount' => 'numeric',
        ]);

        $product = Product::findOrFail($request->product_id);      
        if ($product->current_stock < $request->qty) {
            return back()->withErrors(['qty' => 'Not enough stock! Available: ' . $product->current_stock]);
        }

        $gross = $product->sell_price * $request->qty;
        $net = $gross - $request->discount;
        $vat = $net * 0.05;
        $total = $net + $vat;
        $due = $total - $request->paid_amount;

        $sale = Sale::create([
            'product_id' => $product->id,
            'qty' => $request->qty,
            'discount' => $request->discount,
            'vat_percent' => 5,
            'vat_amount' => $vat,
            'total_amount' => $total,
            'paid_amount' => $request->paid_amount,
            'due_amount' => $due,
            'sale_date' => now(),
        ]);
       
        $product->current_stock -= $request->qty;
        $product->save();
        
        Journal::create(['sale_id' => $sale->id, 'type' => 'Sales', 'amount' => $gross]);
        Journal::create(['sale_id' => $sale->id, 'type' => 'Discount', 'amount' => $request->discount]);
        Journal::create(['sale_id' => $sale->id, 'type' => 'VAT', 'amount' => $vat]);
        Journal::create(['sale_id' => $sale->id, 'type' => 'Payment', 'amount' => $request->paid_amount]);

        return redirect()->route('sales.index')->with('success', 'Sale completed.');
    }
}
