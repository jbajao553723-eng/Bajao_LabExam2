@extends('layouts.app')

@section('content')

<h3>Edit Rice</h3>

<form method="POST" action="{{ route('rice.update', $rice->id) }}">
    @csrf
    @method('PATCH')

    <div class="form-group mb-2">
        <label for="name">Rice Name</label>
        <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $rice->name) }}" required>
    </div>

    <div class="form-group mb-2">
        <label for="price">Price per kg</label>
        <input type="number" step="0.01" id="price" name="price" class="form-control" value="{{ old('price', $rice->price) }}" required>
    </div>

    <div class="form-group mb-2">
        <label for="stock">Stock</label>
        <input type="number" id="stock" name="stock" class="form-control" value="{{ old('stock', $rice->stock) }}" required>
    </div>

    <div class="form-group mb-3">
        <label for="description">Description</label>
        <textarea id="description" name="description" class="form-control">{{ old('description', $rice->description) }}</textarea>
    </div>

    <button class="btn btn-primary">Update Rice</button>
    <a href="{{ route('rice.index') }}" class="btn btn-secondary ms-2">Back</a>
</form>

@endsection
