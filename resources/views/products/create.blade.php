@extends('layouts.app')

@section('content')
    <h2>Add Product</h2>

    <form method="POST" action="{{ route('products.store') }}">
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Purchase Price</label>
            <input name="purchase_price" type="number" step="0.01" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Sell Price</label>
            <input name="sell_price" type="number" step="0.01" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Opening Stock</label>
            <input name="opening_stock" type="number" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
@endsection
