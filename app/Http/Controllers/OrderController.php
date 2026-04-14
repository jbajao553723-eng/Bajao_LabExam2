<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Rice;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('rice')->get();
        $rices = Rice::all();

        return view('orders.index', compact('orders', 'rices'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'rice_id' => 'required|exists:rices,id',
            'quantity' => 'required|numeric|min:1',
        ]);

        $rice = Rice::findOrFail($request->rice_id);

        $total = $rice->price * $request->quantity;

        Order::create([
            'rice_id' => $rice->id,
            'quantity' => $request->quantity,
            'price' => $rice->price,
            'total' => $total,
            'status' => 'unpaid',
        ]);

        return redirect()->back()->with('success', 'Order created successfully!');

    }
    public function markPaid($id)
{
    $order = Order::findOrFail($id);

    $order->status = 'paid';
    $order->save();

    return redirect()->back()->with('success', 'Order marked as PAID');
}
}
