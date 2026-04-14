@extends('layouts.app')

@section('content')
<div class="container">

<h2>Payment System</h2>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<!-- PAYMENT FORM -->
<form method="POST" action="{{ route('payments.store') }}">
    @csrf

    <input type="number" name="order_id" placeholder="Order ID" required>

    <input type="number" name="amount" placeholder="Amount" required>

    <select name="method">
        <option value="cash">Cash</option>
        <option value="gcash">GCash</option>
    </select>

    <button type="submit">Process Payment</button>
</form>

<hr>

<h3>Payment History</h3>

@foreach($payments as $payment)
    <div>
        Order #{{ $payment->order->id }} |
        Rice: {{ $payment->order->rice->name }} |
        Amount: ₱{{ $payment->amount }} |
        Method: {{ $payment->method }} |
        Status: {{ $payment->order->status }}
    </div>
@endforeach

</div>
@endsection