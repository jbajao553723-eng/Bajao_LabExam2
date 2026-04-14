<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function store(Request $request)
{
    $order = Order::findOrFail($request->order_id);

    // save payment
    Payment::create([
        'order_id' => $order->id,
        'amount' => $order->total,
        'method' => $request->method
    ]);

    $order->status = 'paid';
    $order->save();

    return redirect()->route('orders.index')
        ->with('success', 'Payment successful!');
}

    // PAYMENT HISTORY
    public function index()
    {
        $payments = Payment::with('order.rice')->latest()->get();

        return view('payments.index', compact('payments'));
    }
    public function create($orderId)
{
    $order = Order::with('rice')->findOrFail($orderId);

    return view('payments.create', compact('order'));
}

}