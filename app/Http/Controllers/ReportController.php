<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request) {
        $from = $request->from ?? now()->startOfMonth()->toDateString();
        $to = $request->to ?? now()->endOfMonth()->toDateString();

        $sales = Sale::whereBetween('sale_date', [$from, $to])->get();

        $totalSales = $sales->sum('total_amount');
        $totalPaid = $sales->sum('paid_amount');
        $totalDue = $sales->sum('due_amount');
        $profit = $sales->sum(function ($sale) {
            return ($sale->product->sell_price - $sale->product->purchase_price) * $sale->qty;
        });

        return view('reports.index', compact('sales', 'totalSales', 'totalPaid', 'totalDue', 'profit', 'from', 'to'));
    }
}

