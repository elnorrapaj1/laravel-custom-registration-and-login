@extends('layouts.mobile')

@section('title', 'Edit Client')

@section('content')
<div class="container mt-5">
    <h2>Edit Client</h2>
    <form action="{{ route('clients.update', $client->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $client->name }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $client->email }}" required>
        </div>
        <div class="mb-3">
            <label for="phone_number" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $client->phone_number }}" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $client->address }}" required>
        </div>
        <div class="mb-3">
            <label for="unique_number" class="form-label">Numri identifikues</label>
            <input type="text" class="form-control" id="unique_number" name="unique_number" value="{{ $client->unique_number }}" required>
        </div>
        <div class="mb-3">
            <label for="city" class="form-label">City</label>
            <input type="text" class="form-control" id="city" name="city" value="{{ $client->city }}">
        </div>
        <div class="mb-3">
            <label for="service_price" class="form-label">Service Price</label>
            <input type="number" step="0.01" class="form-control" id="service_price" name="service_price" value="{{ $client->service_price }}">
        </div>
        <div class="mb-3">
            <label for="equipment_price" class="form-label">Equipment Price</label>
            <input type="number" step="0.01" class="form-control" id="equipment_price" name="equipment_price" value="{{ $client->equipment_price }}">
        </div>
        <div class="mb-3">
            <label for="payment_method" class="form-label">Payment Method</label>
            <select class="form-control" id="payment_method" name="payment_method">
                <option value="cash" {{ $client->payment_method == 'cash' ? 'selected' : '' }}>Cash</option>
                <option value="bank" {{ $client->payment_method == 'bank' ? 'selected' : '' }}>Bank</option>
            </select>
        </div><div class="mb-3">
            <label for="plan" class="form-label">Plan</label>
            <select class="form-control" id="plan" name="plan" required>
                <option value="Blerje" {{ $client->plan == 'Blerje' ? 'selected' : '' }}>Blerje</option>
                <option value="Qera" {{ $client->plan == 'Qera' ? 'selected' : '' }}>Qera</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Client</button>
    </form>
</div>
@endsection