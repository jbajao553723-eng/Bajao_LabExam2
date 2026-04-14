@extends('layouts.app')

@section('content')

<h1>Rice Management</h1>

{{-- ADD RICE --}}
<form method="POST" action="{{ route('rice.store') }}" class="mb-4">
    @csrf

    <input type="text" name="name" class="form-control mb-2" placeholder="Rice Name" required>

    <input type="number" step="0.01" name="price" class="form-control mb-2" placeholder="Price per kg" required>

    <input type="number" name="stock" class="form-control mb-2" placeholder="Stock" required>

    <textarea name="description" class="form-control mb-2" placeholder="Description"></textarea>

    <button class="btn btn-primary">Add Rice</button>
</form>

<hr>

{{-- LIST --}}
<table class="table table-bordered">
    <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Stock</th>
        <th>Action</th>
    </tr>

    @foreach($rices as $rice)
    <tr>
        <td>{{ $rice->name }}</td>
        <td>₱{{ $rice->price }}</td>
        <td>{{ $rice->stock }}</td>
        <td class="d-flex gap-2">
            <a href="{{ route('rice.edit', $rice->id) }}" class="btn btn-secondary btn-sm">Edit</a>
            <form method="POST" action="{{ route('rice.destroy', $rice->id) }}">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach

</table>

@endsection