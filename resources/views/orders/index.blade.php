@extends('layouts.app')

@section('content')
<div class="container">

<h3>🧾 Create Order</h3>

{{-- ORDER FORM --}}
<form method="POST" action="{{ route('orders.store') }}">
    @csrf

    <select name="rice_id" class="form-control mb-2" required>
        <option value="">Select Rice</option>
        @foreach($rices as $rice)
            <option value="{{ $rice->id }}">
                {{ $rice->name }} - ₱{{ $rice->price }}/kg
            </option>
        @endforeach
    </select>

    <input type="number" name="quantity" class="form-control mb-2" placeholder="Quantity (kg)" required>

    <button class="btn btn-success">Place Order</button>
</form>

<hr>

{{-- ORDER LIST --}}
<table class="table table-bordered">
    <tr>
        <th>Rice</th>
        <th>Quantity</th>
        <th>Total</th>
        <th>Status</th>
        <th>Action</th>
    </tr>

    @foreach($orders as $order)
    <tr>
        <td>{{ $order->rice->name }}</td>
        <td>{{ $order->quantity }} kg</td>
        <td>₱{{ $order->total }}</td>

        {{-- 🟢 STATUS --}}
        <td>
            @if($order->status == 'paid')
                <span style="color:green; font-weight:bold;">PAID</span>
            @else
                <span style="color:red; font-weight:bold;">UNPAID</span>
            @endif
        </td>

        {{-- 🟢 ACTION --}}
        <td>
            @if($order->status !== 'paid')
                <a href="{{ route('payments.create', $order->id) }}"
                   class="btn btn-primary btn-sm">
                    Proceed to Payment
                </a>
            @else
                <span class="text-success">Completed</span>
            @endif
        </td>
    </tr>
    @endforeach
</table>

</div>
@endsection