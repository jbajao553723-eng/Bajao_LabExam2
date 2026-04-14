@extends('layouts.app')

@section('content')
<div class="container">

<h2>💳 Process Payment</h2>

<p>
    <strong>Order ID:</strong> {{ $order->id }} <br>
    <strong>Rice:</strong> {{ $order->rice->name }} <br>
    <strong>Total Amount:</strong> ₱{{ $order->total }}
</p>

<form method="POST" action="{{ route('payments.store') }}">
    @csrf

    <input type="hidden" name="order_id" value="{{ $order->id }}">
    <input type="hidden" name="amount" value="{{ $order->total }}">

    <label>Payment Method</label>
    <select name="method" class="form-control mb-2">
        <option value="cash">Cash</option>
        <option value="gcash">GCash</option>
    </select>

    <button type="submit" class="btn btn-success">
        Confirm Payment
    </button>
</form>

</div>
@endsection