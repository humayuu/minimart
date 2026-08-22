@extends('layout')
@section('main')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4 p-md-5">

                        <div class="text-center mb-4">
                            <i class="fa-solid fa-cart-shopping fa-2x text-primary mb-2"></i>
                            <h4 class="fw-bold">Create an Account</h4>
                            <p class="text-muted small">Join MiniMart and start shopping today.</p>
                        </div>

                        <form method="POST" action="{{ route('signup') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Your full name"
                                    autofocus>
                                <x-validation-error name="name" />
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" name="email" placeholder="you@example.com">
                                <div class="form-text">We'll never share your email with anyone else.</div>
                                <x-validation-error name="email" />

                            </div>

                            <div class="mb-3">
                                <label for="signupPassword" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Create a password">
                                <x-validation-error name="password" />

                            </div>

                            <div class="mb-3">
                                <label for="signupConfirmPassword" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation"
                                    placeholder="Re-enter your password">
                                <x-validation-error name="password_confirmation" />

                            </div>

                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fa-solid fa-user-plus me-1"></i> Sign Up
                            </button>
                        </form>

                        <hr class="my-4">

                        <p class="text-center small mb-0">
                            Already have an account? <a href="{{ url('/login') }}">Login here</a>
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
