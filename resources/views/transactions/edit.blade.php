@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Transaction</h1>

    <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="product_id" class="form-label">Product</label>
            <select name="product_id" id="product_id" class="form-control" required>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" 
                        {{ $transaction->product_id == $product->id ? 'selected' : '' }}>
                        {{ $product->name }} - ${{ number_format($product->price, 2) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" name="quantity" id="quantity" class="form-control" 
                   value="{{ $transaction->quantity }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update Transaction</button>
        <a href="{{ route('transactions.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
