@extends('layouts.mobile')

@section('title', 'Clients')

@section('content')
<div class="container mt-5">
    <h2>Clients</h2>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
        @foreach($clients as $client)
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $client->name }}</h5>
                    <p class="card-text"><strong>Email:</strong> {{ $client->email }}</p>
                    <p class="card-text"><strong>Phone Number:</strong> {{ $client->phone_number }}</p>
                    <p class="card-text"><strong>Address:</strong> {{ $client->address }}</p>
                    <p class="card-text"><strong>Numri identifikues:</strong> {{ $client->unique_number }}</p>
                    <p class="card-text"><strong>City:</strong> {{ $client->city }}</p>
                    <p class="card-text"><strong>Service Price:</strong> {{ $client->service_price }}</p>
                    <p class="card-text"><strong>Equipment Price:</strong> {{ $client->equipment_price }}</p>
                    <p class="card-text"><strong>Payment Method:</strong> {{ $client->payment_method }}</p>
                    <p class="card-text"><strong>Plan:</strong> {{ $client->plan }}</p>
                    <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this client?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection