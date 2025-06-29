@extends('layouts.app')

@section('content')
    <h2>Reports</h2>

    <form method="GET" action="{{ route('reports.index') }}" class="mb-3">
        <div class="row">
            <div class="col">
                <label>From:</label>
                <input type="date" name="from" value="{{ $from }}" class="form-control">
            </div>
            <div class="col">
                <label>To:</label>
                <input type="date" name="to" value="{{ $to }}" class="form-control">
            </div>
            <div class="col">
                <label>&nbsp;</label><br>
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </form>

    <h5>Total Sales: {{ $totalSales }}</h5>
    <h5>Total Paid: {{ $totalPaid }}</h5>
    <h5>Total Due: {{ $totalDue }}</h5>
    <h5>Profit: {{ $profit }}</h5>

    <table class="table mt-3">
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
            <tr><td colspan="8">No data found.</td></tr>
        @endforelse
        </tbody>
    </table>
@endsection
