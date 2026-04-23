@extends('layouts.app')

@section('content')
<div class="container">
    <div class="bg-white shadow-sm rounded-3xl p-6 space-y-6">
        <div>
            <h2 class="text-3xl font-semibold text-slate-900">Payment System</h2>
            <p class="mt-2 text-sm text-slate-500">Manage payments and review your recent transactions.</p>
        </div>

        @if(session('success'))
            <div class="rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-emerald-900">
                {{ session('success') }}
            </div>
        @endif

        <form class="space-y-4" method="POST" action="{{ route('payments.store') }}">
            @csrf

            <div class="grid gap-4 md:grid-cols-3">
                <input
                    type="number"
                    name="order_id"
                    placeholder="Order ID"
                    required
                    class="w-full rounded-2xl border border-slate-300 bg-slate-50 px-4 py-3 text-slate-900 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100"
                >

                <input
                    type="number"
                    name="amount"
                    placeholder="Amount"
                    required
                    class="w-full rounded-2xl border border-slate-300 bg-slate-50 px-4 py-3 text-slate-900 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100"
                >

                <select
                    name="method"
                    class="w-full rounded-2xl border border-slate-300 bg-slate-50 px-4 py-3 text-slate-900 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100"
                >
                    <option value="cash">Cash</option>
                    <option value="gcash">GCash</option>
                </select>
            </div>

            <button
                type="submit"
                class="inline-flex rounded-2xl bg-slate-900 px-6 py-3 text-sm font-semibold text-white transition hover:bg-slate-800"
            >
                Process Payment
            </button>
        </form>

        <div class="border-t border-slate-200 pt-6">
            <h3 class="text-2xl font-semibold text-slate-900">Payment History</h3>
            <div class="mt-4 space-y-3">
                @forelse($payments as $payment)
                    <div class="rounded-3xl border border-slate-200 bg-slate-50 p-4 sm:p-5 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                        <div class="text-sm text-slate-700 space-y-1">
                            <p class="font-medium text-slate-900">Order #{{ $payment->order->id }}</p>
                            <p>
                                Rice: <span class="font-semibold">{{ $payment->order->rice->name }}</span>
                                · Amount: <span class="font-semibold">₱{{ number_format($payment->amount, 2) }}</span>
                                · Method: <span class="font-semibold">{{ ucfirst($payment->method) }}</span>
                            </p>
                        </div>
                        <span class="inline-flex items-center rounded-full border border-slate-300 bg-white px-3 py-1 text-xs font-semibold uppercase tracking-[0.18em] text-slate-600">
                            {{ ucfirst($payment->order->status) }}
                        </span>
                    </div>
                @empty
                    <div class="rounded-3xl border border-dashed border-slate-300 bg-white p-4 text-sm text-slate-500">
                        No payments found.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection