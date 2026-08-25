@extends('layout')

@section('main')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4 p-md-5">

                        <div class="text-center mb-4">
                            <i class="fa-solid fa-user fa-2x text-primary mb-2"></i>
                            <h4 class="fw-bold mb-1">Update Password</h4>
                            <p class="text-muted small mb-0">
                                Keep your account secure by updating your password.
                            </p>
                        </div>

                        <x-alert-success />

                        <form method="POST" action="{{ route('password.update', Auth::id()) }}">
                            @csrf

                            <div class="mb-3">
                                <label for="current_password" class="form-label fw-semibold">
                                    Current Password
                                </label>

                                <input type="password" id="current_password" class="form-control" name="current_password"
                                    placeholder="Enter current password" autofocus>

                                <x-validation-error name="current_password" />
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label fw-semibold">
                                    New Password
                                </label>

                                <input type="password" id="password" class="form-control" name="password"
                                    placeholder="Enter new password">

                                <x-validation-error name="password" />
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label fw-semibold">
                                    Confirm New Password
                                </label>

                                <input type="password" id="password_confirmation" class="form-control"
                                    name="password_confirmation" placeholder="Confirm new password">

                                <x-validation-error name="password_confirmation" />
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary fw-semibold">
                                    <i class="fa-solid fa-floppy-disk me-1"></i>
                                    Save Changes
                                </button>

                                <button type="reset" class="btn btn-secondary fw-semibold">
                                    <i class="fa-solid fa-rotate-left me-1"></i>
                                    Reset
                                </button>

                                <button type="button" class="btn btn-outline-secondary fw-semibold">
                                    <i class="fa-solid fa-xmark me-1"></i>
                                    Cancel
                                </button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
