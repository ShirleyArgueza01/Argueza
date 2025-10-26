@extends('layouts.app')

@section('content')
<div class="container">
    <h1>📊 Dashboard</h1>

    <!-- Summary Cards -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-white bg-dark shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total Products</h5>
                    <p class="fs-3">{{ $totalProducts }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total Transactions</h5>
                    <p class="fs-3">{{ $totalTransactions }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-danger shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total Sales</h5>
                    <p class="fs-3">${{ number_format($totalSales, 2) }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Daily Sales (Bar Chart) -->
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Daily Sales</h5>
            <canvas id="salesChart" height="100"></canvas>
        </div>
    </div>

    <!-- Monthly Sales (Line Chart) -->
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Monthly Sales Trend</h5>
            <canvas id="monthlyChart" height="100"></canvas>
        </div>
    </div>

    <!-- Top 5 Products (Pie Chart) -->
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Top 5 Products Sold</h5>
            <canvas id="productsChart" height="100"></canvas>
        </div>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Bar Chart - Daily Sales
    const salesCtx = document.getElementById('salesChart').getContext('2d');
    new Chart(salesCtx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($labels) !!},
            datasets: [{
                label: 'Daily Sales ($)',
                data: {!! json_encode($totals) !!},
                backgroundColor: '#4e73df'
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true }
            }
        }
    });

    // Line Chart - Monthly Sales
    const monthlyCtx = document.getElementById('monthlyChart').getContext('2d');
    new Chart(monthlyCtx, {
        type: 'line',
        data: {
            labels: {!! json_encode($months) !!},
            datasets: [{
                label: 'Monthly Sales ($)',
                data: {!! json_encode($monthlyTotals) !!},
                fill: false,
                borderColor: '#1cc88a',
                tension: 0.1
            }]
        },
        options: { responsive: true }
    });

    // Pie Chart - Top 5 Products
    const productsCtx = document.getElementById('productsChart').getContext('2d');
    new Chart(productsCtx, {
        type: 'pie',
        data: {
            labels: {!! json_encode($productNames) !!},
            datasets: [{
                label: 'Quantity Sold',
                data: {!! json_encode($productQuantities) !!},
                backgroundColor: [
                    '#f6c23e',
                    '#36b9cc',
                    '#1cc88a',
                    '#e74a3b',
                    '#858796'
                ],
                borderColor: '#fff',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { position: 'bottom' } }
        }
    });
</script>
@endsection
