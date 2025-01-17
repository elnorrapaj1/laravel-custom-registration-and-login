@extends('layouts.mobile')

@section('title', 'Welcome')

@section('content')
    <div class="actions-form text-center">
        <!-- Action Buttons -->
        <div class="btn-group mb-4" role="group" aria-label="Arketim or Shpenzim">
            <button type="button" class="btn btn-success" id="arketim-btn">Arketim</button>
            <button type="button" class="btn btn-warning" id="shpenzim-btn">Shpenzim</button>
        </div>

        <!-- Arketim Form -->
        <form action="{{ route('arketim.store') }}" method="POST" id="arketim-form" class="d-none">
            @csrf
            <label for="amount" class="form-label">Shuma (€):</label>
            <input 
                type="number" 
                min="0" 
                step="0.01" 
                class="form-control" 
                id="amount" 
                name="amount" 
                required>

            <label for="client-name" class="form-label">Emri Klientit:</label>
            <input 
                type="text" 
                class="form-control" 
                id="client-name" 
                name="client_name"
                required>

            <button type="submit" class="btn btn-success mt-3 w-100" id="submit-arketim-btn">Shto Arketim</button>
        </form>

        <!-- Shpenzim Form -->
        <form action="{{ route('shpenzim.store') }}" method="POST" id="shpenzim-form" class="d-none">
            @csrf
            <label for="amount" class="form-label">Shuma (€):</label>
            <input 
                type="number" 
                min="0" 
                step="0.01" 
                class="form-control" 
                id="amount" 
                name="amount" 
                required>

            <label for="description" class="form-label">Përshkrimi:</label>
            <input 
                type="text" 
                class="form-control" 
                id="description" 
                name="description" 
                required>

            <button type="submit" class="btn btn-warning mt-3 w-100" id="submit-shpenzim-btn">Shto Shpenzim</button>
        </form>
    </div>

    <!-- New Layout for Values Only -->
    <div class="values-layout text-center mt-4">
        <div class="row">
            <div class="col">
                <div class="value-card bg-success text-white">
                    <h3>{{ number_format($totalArketim ?? 0, 2) }} €</h3>
                </div>
            </div>
            <div class="col">
                <div class="value-card bg-warning text-white">
                    <h3>{{ number_format($totalShpenzim ?? 0, 2) }} €</h3>
                </div>
            </div>
            <div class="col">
                <div class="value-card bg-info text-white">
                    <h3>{{ number_format(($totalArketim ?? 0) - ($totalShpenzim ?? 0), 2) }} €</h3>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const arketimBtn = document.getElementById('arketim-btn');
            const shpenzimBtn = document.getElementById('shpenzim-btn');
            const arketimForm = document.getElementById('arketim-form');
            const shpenzimForm = document.getElementById('shpenzim-form');

            arketimBtn.addEventListener('click', function () {
                arketimForm.classList.remove('d-none');
                shpenzimForm.classList.add('d-none');
                arketimBtn.classList.add('active');
                shpenzimBtn.classList.remove('active');
            });

            shpenzimBtn.addEventListener('click', function () {
                shpenzimForm.classList.remove('d-none');
                arketimForm.classList.add('d-none');
                shpenzimBtn.classList.add('active');
                arketimBtn.classList.remove('active');
            });
        });
    </script>
@endsection