<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Product;

class TransactionController extends Controller
{
    // 📌 Show all transactions
    public function index()
    {
        $transactions = Transaction::with('product')->get();
        return view('transactions.index', compact('transactions'));
    }

    // 📌 Show form to create a new transaction
    public function create()
    {
        $products = Product::all();
        return view('transactions.create', compact('products'));
    }

    // 📌 Store transaction
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity'   => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);

        $transaction = new Transaction();
        $transaction->product_id  = $product->id;
        $transaction->quantity    = $request->quantity;
        $transaction->total_price = $product->price * $request->quantity;
        $transaction->save();

        return redirect()->route('transactions.index')->with('success', 'Transaction added successfully.');
    }

    // 📌 (Optional) Show a single transaction
    public function show(Transaction $transaction)
    {
        return view('transactions.show', compact('transaction'));
    }

    // 📌 Edit transaction
    public function edit(Transaction $transaction)
    {
        $products = Product::all(); // para makapili ng ibang product kung gusto i-update
        return view('transactions.edit', compact('transaction', 'products'));
    }

    // 📌 Update transaction
    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity'   => 'required|integer|min:1',
        ]);

        // kunin ang presyo ng product
        $product = Product::findOrFail($request->product_id);

        // i-update transaction
        $transaction->update([
            'product_id'  => $product->id,
            'quantity'    => $request->quantity,
            'total_price' => $product->price * $request->quantity,
        ]);

        return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully!');
    }

    // 📌 Delete a transaction
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully.');
    }
}
