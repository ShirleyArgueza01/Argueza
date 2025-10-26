<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sales Inventory System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #fdfaf5;
      font-family: 'Georgia', serif;
    }
    .sidebar {
      width: 250px;
      height: 100vh;
      background-color: #1e3a5f;
      color: #fff;
      position: fixed;
      top: 0;
      left: 0;
      padding: 20px;
    }
    .sidebar h2 {
      font-weight: bold;
      margin-bottom: 30px;
    }
    .sidebar a {
      display: block;
      color: #fff;
      padding: 10px 15px;
      text-decoration: none;
      margin: 5px 0;
      border-radius: 5px;
    }
    .sidebar a.active {
      background-color: #d4842f;
    }
    .content {
      margin-left: 270px;
      padding: 30px;
    }
    .card-custom {
      border-radius: 10px;
      padding: 30px;
      text-align: center;
      font-weight: bold;
      color: #1e3a5f;
    }
    .card-categories {
      background-color: #fbeedb;
    }
    .card-products {
      background-color: #d4842f;
      color: #fff;
    }
  </style>
</head>
<body>

  <div class="sidebar">
    <h2>Sales<br>Inventory<br>System</h2>
    <a href="{{ route('dashboard') }}" class="{{ request()->is('/') ? 'active' : '' }}">Dashboard</a>
    <a href="{{ route('products.index') }}" class="{{ request()->is('products*') ? 'active' : '' }}">Products</a>
    <a href="{{ route('categories.index') }}" class="{{ request()->is('categories*') ? 'active' : '' }}">Categories</a>
    <a href="{{ route('transactions.index') }}" class="{{ request()->is('transactions*') ? 'active' : '' }}">Transactions</a>
  </div>

  <div class="content">
    @yield('content')
  </div>

</body>
</html>
