@extends('layouts.app')

@section('content')
    <h2>Products</h2>
    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Add Product</a>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Purchase Price</th>
                <th>Sell Price</th>
                <th>Opening Stock</th>
                <th>Current Stock</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->purchase_price }}</td>
                <td>{{ $product->sell_price }}</td>
                <td>{{ $product->opening_stock }}</td>
                <td>{{ $product->current_stock }}</td>
            </tr>
        @empty
            <tr><td colspan="5">No products found.</td></tr>
        @endforelse
        </tbody>
    </table>
@endsection
