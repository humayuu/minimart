@extends('admin.layout')

@section('main')
    <div class="flex-grow-1 p-4">

        <div class="container-fluid">

            {{-- Page Header --}}
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">

                <div>
                    <h1 class="h3 fw-bold mb-1">User Details</h1>
                    <p class="text-muted mb-0">
                        View complete information about this User.
                    </p>
                </div>

                <div class="d-flex gap-2">
                    <a href="{{ url()->previous() }}" class="btn btn-outline-dark">
                        <i class="fa-solid fa-arrow-left me-2"></i>
                        Back
                    </a>

                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-dark">
                        <i class="fa-solid fa-pen me-2"></i>
                        Edit User
                    </a>
                </div>

            </div>


            {{-- Brand Detail Card --}}
            <div class="card border-0 shadow-sm">

                <div class="card-body p-4">

                    <div class="row g-4">

                        {{-- Brand Logo --}}
                        <div class="col-md-4">

                            <div class="border rounded-3 p-4 text-center h-100">

                                <div class="mb-3">
                                    @if ($user->image->path)
                                        <img src="{{ asset('storage/' . $user->image->path) }}" alt="{{ $user->name }}"
                                            class="img-fluid rounded"
                                            style="max-height: 180px; max-width: 100%; object-fit: contain;">
                                    @else
                                        <div class="d-flex align-items-center justify-content-center bg-light rounded"
                                            style="height: 180px;">
                                            <i class="fa-solid fa-image fa-4x text-muted"></i>
                                        </div>
                                    @endif
                                </div>

                                <h5 class="fw-bold mb-1">
                                    {{ $user->name }}
                                </h5>

                                <span class="badge bg-light text-dark border">
                                    User
                                </span>

                            </div>

                        </div>


                        {{-- User Information --}}
                        <div class="col-md-8">

                            <div class="row g-3">

                                {{-- Email --}}
                                <div class="col-md-6">
                                    <div class="bg-light rounded-3 p-3">
                                        <small class="text-muted d-block mb-1">
                                            Email
                                        </small>

                                        <h6 class="fw-bold mb-0">
                                            {{ $user->email }}
                                        </h6>
                                    </div>
                                </div>


                                {{-- Roles --}}
                                <div class="col-md-6">
                                    <div class="bg-light rounded-3 p-3">
                                        <small class="text-muted d-block mb-1">
                                            Roles
                                        </small>

                                        <h6 class="fw-bold mb-0">
                                            {{ $user->getRoleNames()->implode(', ') }}
                                        </h6>
                                    </div>
                                </div>

                                {{-- Permissions --}}
                                <div class="col-md-6">
                                    <div class="bg-light rounded-3 p-3">
                                        <small class="text-muted d-block mb-1">
                                            Permissions
                                        </small>

                                        <h6 class="fw-bold mb-0">
                                            {{ $user->getPermissionNames()->implode(', ') }}
                                        </h6>
                                    </div>
                                </div>


                                {{-- Created At --}}
                                <div class="col-md-6">
                                    <div class="bg-light rounded-3 p-3">
                                        <small class="text-muted d-block mb-1">
                                            Created At
                                        </small>

                                        <h6 class="fw-bold mb-0">
                                            {{ $user->created_at->format('d M Y') }}
                                        </h6>
                                    </div>
                                </div>



                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
