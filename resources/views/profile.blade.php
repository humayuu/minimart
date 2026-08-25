@extends('layout')
@section('main')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4 p-md-5">

                        <div class="text-center mb-4">
                            <i class="fa-solid fa-user fa-2x text-primary mb-2"></i>
                            <h4 class="fw-bold">Update Profile</h4>
                        </div>
                        <x-alert-success />
                        <form method="POST" action="{{ route('profile.update', Auth::id()) }}">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Your full name"
                                    autofocus value="{{ Auth::user()->name }}">
                                <x-validation-error name="name" />
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" name="email" placeholder="you@example.com"
                                    value="{{ Auth::user()->email }}">
                                <x-validation-error name="email" />

                            </div>
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa-solid fa-floppy-disk"></i> Save Changes
                                </button>
                                <button type="reset" class="btn btn-secondary">
                                    <i class="fa-solid fa-rotate-left"></i> Reset
                                </button>
                                <button type="button" class="btn btn-outline-secondary">
                                    <i class="fa-solid fa-xmark"></i> Cancel
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
