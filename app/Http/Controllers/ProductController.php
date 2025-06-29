<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create() {
        return view('products.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'purchase_price' => 'required|numeric',
            'sell_price' => 'required|numeric',
            'opening_stock' => 'required|integer',
        ]);

        Product::create([
            'name' => $request->name,
            'purchase_price' => $request->purchase_price,
            'sell_price' => $request->sell_price,
            'opening_stock' => $request->opening_stock,
            'current_stock' => $request->opening_stock,
        ]);

        return redirect()->route('products.index')->with('success', 'Product added Successfull.');
    }
}
