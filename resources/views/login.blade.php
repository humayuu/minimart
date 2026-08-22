@extends('layout')
@section('main')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4 p-md-5">

                        <div class="text-center mb-4">
                            <i class="fa-solid fa-cart-shopping fa-2x text-primary mb-2"></i>
                            <h4 class="fw-bold">Login to MiniMart</h4>
                            <p class="text-muted small">Welcome back! Please login to continue.</p>
                        </div>

                        <x-alert-success />
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="loginEmail" class="form-label">Email address</label>
                                <input type="email" class="form-control" name="email" placeholder="you@example.com"
                                    autofocus>
                                <x-validation-error name='email' />
                            </div>

                            <div class="mb-3">
                                <label for="loginPassword" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password"
                                    placeholder="Enter your password">
                                <x-validation-error name='password' />

                            </div>

                            <div class="mb-3 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="rememberMe">
                                    <label class="form-check-label small" for="rememberMe">Remember me</label>
                                </div>
                                <a href="#" class="small">Forgot password?</a>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fa-solid fa-right-to-bracket me-1"></i> Login
                            </button>
                        </form>

                        <hr class="my-4">

                        <p class="text-center small mb-0">
                            Don't have an account? <a href="{{ url('/signup') }}">Sign up here</a>
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
