@extends('layouts.app')

@section('content')
    <h2>Add Sale</h2>

    <form method="POST" action="{{ route('sales.store') }}">
        @csrf

        <div class="mb-3">
            <label>Product</label>
            <select name="product_id" class="form-control" required>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }} (Stock: {{ $product->current_stock }})</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Quantity</label>
            <input name="qty" type="number" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Discount</label>
            <input name="discount" type="number" step="0.01" class="form-control" value="0">
        </div>

        <div class="mb-3">
            <label>Paid Amount</label>
            <input name="paid_amount" type="number" step="0.01" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Save Sale</button>
    </form>
@endsection
