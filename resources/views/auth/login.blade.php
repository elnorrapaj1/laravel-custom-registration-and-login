@extends('layouts.app')
@section('title', 'Login')
@section('content')

<section class="bg-body-tertiary position-relative">

    <div class="d-flex justify-content-center align-items-center min-vh-100 position-relative" style="z-index: 1;">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Logo Section -->
                <div class="col-md-12 text-center mb-4">
                    <img src="{{ asset('images/Screenshot 2025-01-13 125316.png') }}" alt="Company Logo" class="mb-3" style="max-width: 100px;">
                </div>
                <!-- Login Form Section -->
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm py-3 px-4">
                        <div class="text-center py-2 mb-3">
                            <p class="mb-0 text-uppercase fw-bold text-secondary">
                                Welcome ATD
                            </p>
                        </div>
                        <form method="POST" action="{{ url('login') }}">
                            @csrf
                            <div class="form-group text-center">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control text-center" id="email" name="email" required>
                            </div>
                            <div class="form-group text-center">
                                <label for="password">Password</label>
                                <input type="password" class="form-control text-center" id="password" name="password" required>
                            </div>
                            <div class="d-flex justify-content-center mt-4">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                        <div class="mt-3 text-center">
                            <p class="mb-0">
                                I don't have an account?
                                <a class="fw-medium" href="{{ url('register') }}">
                                    Register
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection