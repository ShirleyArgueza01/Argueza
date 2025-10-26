<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Totals
        $totalProducts = Product::count();
        $totalTransactions = Transaction::count();
        $totalSales = Transaction::sum('total_price');

        // Daily Sales (Bar Chart)
        $salesData = Transaction::select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('SUM(total_price) as total')
            )
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        $labels = $salesData->pluck('date');
        $totals = $salesData->pluck('total');

        // Monthly Sales (Line Chart)
        $monthlyData = Transaction::select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('SUM(total_price) as total')
            )
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get();

        $months = $monthlyData->pluck('month');
        $monthlyTotals = $monthlyData->pluck('total');

        // Top 5 Products (Pie Chart)
        $topProducts = Transaction::select(
                'product_id',
                DB::raw('SUM(quantity) as total_quantity')
            )
            ->groupBy('product_id')
            ->orderByDesc('total_quantity')
            ->take(5)
            ->with('product')
            ->get();

        $productNames = $topProducts->pluck('product.name');
        $productQuantities = $topProducts->pluck('total_quantity');

        return view('dashboard', compact(
            'totalProducts',
            'totalTransactions',
            'totalSales',
            'labels',
            'totals',
            'months',
            'monthlyTotals',
            'productNames',
            'productQuantities'
        ));
    }
}
