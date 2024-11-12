<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Drug;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Place an order
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'drug_id' => 'required|exists:drugs,drug_id',
            'pharmacy_id' => 'required|exists:pharmacies,pharmacy_id',
            'quantity' => 'required|integer|min:1',
        ]);

        $drug = Drug::find($validatedData['drug_id']);
        $order = Order::create([
            'user_id' => auth()->id(),
            'drug_id' => $validatedData['drug_id'],
            'pharmacy_id' => $validatedData['pharmacy_id'],
            'quantity' => $validatedData['quantity'],
            'total_price' => $validatedData['quantity'] * $drug->price,
            'order_status' => 'pending',
        ]);

        return response()->json($order, 201);
    }

    // Get order history for the authenticated user
    public function index()
    {
        $orders = Order::where('user_id', auth()->id())->get();
        return response()->json($orders);
    }
}
