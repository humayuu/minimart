@extends('admin.layout')

@section('main')
    <div class="flex-grow-1 p-4 p-md-5">

        <div class="container-fluid">

            <!-- Header -->
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">

                <div class="d-flex align-items-center gap-3">
                    <span
                        class="bg-primary bg-opacity-10 text-primary rounded-3 p-3 d-inline-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-user-plus fa-xl"></i>
                    </span>

                    <div>
                        <h1 class="h3 fw-bold mb-1">
                            Update User
                        </h1>
                        <p class="text-muted mb-0">
                            Update user and assign roles and permissions.
                        </p>
                    </div>
                </div>

                <div>
                    <a href="{{ url()->previous() }}" class="btn btn-dark px-3">
                        <i class="fa-solid fa-arrow-left me-2"></i>Back
                    </a>
                </div>

            </div>


            <!-- Success Alert -->
            <x-alert-success />


            <!-- Validation Errors -->
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">

                    <div class="d-flex gap-3">

                        <i class="fa-solid fa-circle-exclamation fs-4 mt-1"></i>

                        <div>
                            <strong class="d-block mb-1">Please fix the following errors:</strong>

                            <ul class="mb-0 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>

                    </div>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                </div>
            @endif


            <!-- Main Card -->
            <div class="card border-0 shadow-sm">

                <div class="card-body p-4 p-md-5">

                    <form action="{{ route('user.update', $user) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row g-4">


                            <!-- ============================= -->
                            <!-- BASIC INFORMATION -->
                            <!-- ============================= -->

                            <div class="col-12">

                                <div class="d-flex align-items-center gap-3 border-bottom pb-3">

                                    <span
                                        class="bg-primary bg-opacity-10 text-primary rounded-3 p-2 d-inline-flex align-items-center justify-content-center">
                                        <i class="fa-solid fa-user"></i>
                                    </span>

                                    <div>
                                        <h5 class="fw-bold mb-0">
                                            Basic Information
                                        </h5>

                                        <small class="text-muted">
                                            Enter the user's account information.
                                        </small>
                                    </div>

                                </div>

                            </div>


                            <!-- Name -->
                            <div class="col-md-6">

                                <label for="name" class="form-label fw-semibold">
                                    Name <span class="text-danger">*</span>
                                </label>

                                <div class="input-group">

                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="fa-solid fa-user text-secondary"></i>
                                    </span>

                                    <input type="text" name="name" id="name"
                                        class="form-control border-start-0 @error('name') is-invalid @enderror"
                                        value="{{ old('name', $user->name) }}" placeholder="Enter full name" autofocus>

                                </div>

                                <x-validation-error name="name" />

                            </div>


                            <!-- Email -->
                            <div class="col-md-6">

                                <label for="email" class="form-label fw-semibold">
                                    Email <span class="text-danger">*</span>
                                </label>

                                <div class="input-group">

                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="fa-solid fa-envelope text-secondary"></i>
                                    </span>

                                    <input type="email" name="email" id="email"
                                        class="form-control border-start-0 @error('email') is-invalid @enderror"
                                        value="{{ old('email', $user->email) }}" placeholder="user@example.com">

                                </div>

                                <x-validation-error name="email" />

                            </div>

                            <!-- ============================= -->
                            <!-- ACCESS CONTROL -->
                            <!-- ============================= -->

                            <div class="col-12 mt-4">

                                <div class="d-flex align-items-center gap-3 border-bottom pb-3">

                                    <span
                                        class="bg-primary bg-opacity-10 text-primary rounded-3 p-2 d-inline-flex align-items-center justify-content-center">
                                        <i class="fa-solid fa-shield-halved"></i>
                                    </span>

                                    <div>
                                        <h5 class="fw-bold mb-0">
                                            Access Control
                                        </h5>

                                        <small class="text-muted">
                                            Manage user roles and permissions.
                                        </small>
                                    </div>

                                </div>

                            </div>


                            <!-- ============================= -->
                            <!-- ROLES -->
                            <!-- ============================= -->

                            <div class="col-lg-6">

                                <div class="card border h-100 shadow-sm">

                                    <div class="card-header bg-transparent py-3">

                                        <div class="d-flex justify-content-between align-items-center">

                                            <div>
                                                <h6 class="fw-bold mb-0">
                                                    <i class="fa-solid fa-user-shield text-primary me-2"></i>
                                                    Roles
                                                </h6>

                                                <small class="text-muted">
                                                    Select user roles.
                                                </small>
                                            </div>

                                            <button type="button" class="btn btn-sm btn-outline-primary"
                                                onclick="toggleAll('roles-checkbox')">
                                                <i class="fa-solid fa-check-double me-1"></i>
                                                Select All
                                            </button>

                                        </div>

                                    </div>


                                    <div class="card-body">

                                        <div class="row g-2">

                                            @forelse ($roles as $role)
                                                <div class="col-sm-6">

                                                    <div
                                                        class="form-check border rounded p-3 h-100 d-flex align-items-center">

                                                        <input class="form-check-input roles-checkbox me-2 mt-0"
                                                            type="checkbox" name="roles[]" value="{{ $role->name }}"
                                                            id="role_{{ $role->id }}"
                                                            {{ in_array($role->name, old('roles', $user->getRoleNames()->toArray())) ? 'checked' : '' }}>

                                                        <label class="form-check-label fw-medium w-100 text-truncate"
                                                            for="role_{{ $role->id }}">
                                                            <i class="fa-solid fa-user-tag text-secondary me-1"></i>
                                                            {{ $role->name }}
                                                        </label>

                                                    </div>

                                                </div>

                                            @empty

                                                <div class="col-12">

                                                    <div class="alert alert-light border mb-0">
                                                        <i class="fa-solid fa-circle-info me-2"></i>
                                                        No roles available.
                                                    </div>

                                                </div>
                                            @endforelse

                                        </div>

                                        <x-validation-error name="roles" />

                                    </div>

                                </div>

                            </div>


                            <!-- ============================= -->
                            <!-- PERMISSIONS -->
                            <!-- ============================= -->

                            <div class="col-lg-6">

                                <div class="card border h-100 shadow-sm">

                                    <div class="card-header bg-transparent py-3">

                                        <div class="d-flex justify-content-between align-items-center">

                                            <div>
                                                <h6 class="fw-bold mb-0">
                                                    <i class="fa-solid fa-key text-primary me-2"></i>
                                                    Permissions
                                                </h6>

                                                <small class="text-muted">
                                                    Select user permissions.
                                                </small>
                                            </div>

                                            <button type="button" class="btn btn-sm btn-outline-primary"
                                                onclick="toggleAll('permissions-checkbox')">
                                                <i class="fa-solid fa-check-double me-1"></i>
                                                Select All
                                            </button>

                                        </div>

                                    </div>


                                    <div class="card-body">

                                        <div class="row g-2">

                                            @forelse ($permissions as $permission)
                                                <div class="col-sm-6">

                                                    <div
                                                        class="form-check border rounded p-3 h-100 d-flex align-items-center">

                                                        <input class="form-check-input permissions-checkbox me-2 mt-0"
                                                            type="checkbox" name="permissions[]"
                                                            value="{{ $permission->name }}"
                                                            id="permission_{{ $permission->id }}"
                                                            {{ in_array($permission->name, old('permissions', $user->getPermissionNames()->toArray())) ? 'checked' : '' }}>

                                                        <label class="form-check-label fw-medium w-100 text-truncate"
                                                            for="permission_{{ $permission->id }}">
                                                            <i class="fa-solid fa-lock-open text-secondary me-1"></i>
                                                            {{ $permission->name }}
                                                        </label>

                                                    </div>

                                                </div>

                                            @empty

                                                <div class="col-12">

                                                    <div class="alert alert-light border mb-0">
                                                        <i class="fa-solid fa-circle-info me-2"></i>
                                                        No permissions available.
                                                    </div>

                                                </div>
                                            @endforelse

                                        </div>

                                        <x-validation-error name="permissions" />

                                    </div>

                                </div>

                            </div>


                        </div>


                        <!-- ============================= -->
                        <!-- ACTIONS -->
                        <!-- ============================= -->

                        <div class="border-top mt-5 pt-4">

                            <div class="d-flex flex-column flex-sm-row gap-2">

                                <button type="submit" class="btn btn-primary px-4">
                                    <i class="fa-solid fa-user-plus me-2"></i>Save User
                                </button>


                                <button type="reset" id="resetFormBtn" class="btn btn-outline-danger px-4">
                                    <i class="fa-solid fa-rotate-left me-2"></i>Reset
                                </button>


                                <a href="{{ route('user.index') }}" class="btn btn-outline-secondary px-4">
                                    <i class="fa-solid fa-xmark me-2"></i>Cancel
                                </a>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>


    <!-- ============================= -->
    <!-- JAVASCRIPT -->
    <!-- ============================= -->

    <script>
        // Select / Unselect All
        function toggleAll(className) {

            const checkboxes = document.querySelectorAll('.' + className);

            const allChecked = Array.from(checkboxes)
                .every(checkbox => checkbox.checked);

            checkboxes.forEach(function(checkbox) {

                checkbox.checked = !allChecked;

            });

        }
    </script>

@endsection
