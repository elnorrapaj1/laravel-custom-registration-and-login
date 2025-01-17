@extends('layouts.mobile')

@section('content')
<div class="container">
    <h1 class="my-4">Dashboard</h1>

    <!-- Form for filtering -->
    <form method="GET" action="{{ url('dashboard') }}">
        <div class="row mb-4">
            <div class="col-md-4">
                <input type="text" class="form-control" name="filter" placeholder="Filter">
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <button type="submit" class="btn btn-primary w-100">Filtro</button>
            </div>
        </div>
    </form>

    <!-- Shpenzim Cards -->
    <div class="row">
        @foreach($shpenzims as $shpenzim)
            <div class="col-md-4">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-header">Shpenzim</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ number_format($shpenzim->amount, 2) }} €</h5>
                        <p class="card-text">Përshkrimi: {{ $shpenzim->description }}</p>
                        <p class="card-text">Data: {{ $shpenzim->created_at->format('d/m/Y') }}</p>
                        <p class="card-text">Kryer nga: {{ $shpenzim->user ? $shpenzim->user->name : 'Unknown' }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Arketim Cards -->
    <div class="row">
        @foreach($arketims as $arketim)
            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">Arketim</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ number_format($arketim->amount, 2) }} €</h5>
                        <p class="card-text">Përshkrimi: {{ $arketim->description }}</p>
                        <p class="card-text">Data: {{ $arketim->created_at->format('d/m/Y') }}</p>
                        <p class="card-text">Kryer nga: {{ $arketim->user ? $arketim->user->name : 'Unknown' }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection