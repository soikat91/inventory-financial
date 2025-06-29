@extends('layouts.app')

@section('content')
    <h2>Sales</h2>
    <a href="{{ route('sales.create') }}" class="btn btn-primary mb-3">Add Sale</a>

    <table class="table">
        <thead>
            <tr>
                <th>Product</th>
                <th>Qty</th>
                <th>Discount</th>
                <th>VAT</th>
                <th>Total</th>
                <th>Paid</th>
                <th>Due</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($sales as $sale)
            <tr>
                <td>{{ $sale->product->name }}</td>
                <td>{{ $sale->qty }}</td>
                <td>{{ $sale->discount }}</td>
                <td>{{ $sale->vat_amount }}</td>
                <td>{{ $sale->total_amount }}</td>
                <td>{{ $sale->paid_amount }}</td>
                <td>{{ $sale->due_amount }}</td>
                <td>{{ $sale->sale_date }}</td>
            </tr>
        @empty
            <tr><td colspan="8">No sales found.</td></tr>
        @endforelse
        </tbody>
    </table>
@endsection
