@extends('admin.layout')

@section('main')
    <div class="flex-grow-1 p-4 p-md-5">

        <div class="container-fluid">

            <!-- Header -->
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">

                <div>
                    <div class="d-flex align-items-center gap-2 mb-1">
                        <span class="bg-primary bg-opacity-10 text-primary rounded-3 p-2">
                            <i class="fa-solid fa-user-plus fa-lg"></i>
                        </span>

                        <h1 class="h3 fw-bold mb-0">
                            Add User
                        </h1>
                    </div>

                    <p class="text-muted mb-0 ms-md-5">
                        Create a new user and assign roles and permissions.
                    </p>
                </div>

                <a href="{{ url()->previous() }}" class="btn btn-dark">
                    <i class="fa-solid fa-arrow-left me-2"></i>
                    Back
                </a>

            </div>


            <!-- Success Alert -->
            <x-alert-success />


            <!-- Validation Errors -->
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">

                    <div class="d-flex gap-3">

                        <i class="fa-solid fa-circle-exclamation fs-5"></i>

                        <div>
                            <strong>Please fix the following errors:</strong>

                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>

                    </div>

                    <button type="button" class="btn-close" data-bs-dismiss="alert">
                    </button>

                </div>
            @endif


            <!-- Main Card -->
            <div class="card border-0 shadow-sm">

                <div class="card-body p-4 p-md-5">

                    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <div class="row g-4">


                            <!-- ============================= -->
                            <!-- BASIC INFORMATION -->
                            <!-- ============================= -->

                            <div class="col-12">

                                <div class="d-flex align-items-center gap-2 border-bottom pb-3">

                                    <span class="bg-primary bg-opacity-10 text-primary rounded-3 p-2">
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
                                    <i class="fa-solid fa-user text-secondary me-1"></i>
                                    Name
                                    <span class="text-danger">*</span>
                                </label>

                                <div class="input-group">

                                    <span class="input-group-text">
                                        <i class="fa-solid fa-user text-secondary"></i>
                                    </span>

                                    <input type="text" name="name" id="name"
                                        class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                        placeholder="Enter full name" autofocus>

                                </div>

                                <x-validation-error name="name" />

                            </div>


                            <!-- Email -->
                            <div class="col-md-6">

                                <label for="email" class="form-label fw-semibold">
                                    <i class="fa-solid fa-envelope text-secondary me-1"></i>
                                    Email
                                    <span class="text-danger">*</span>
                                </label>

                                <div class="input-group">

                                    <span class="input-group-text">
                                        <i class="fa-solid fa-envelope text-secondary"></i>
                                    </span>

                                    <input type="email" name="email" id="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}" placeholder="user@example.com">

                                </div>

                                <x-validation-error name="email" />

                            </div>


                            <!-- Password -->
                            <div class="col-md-6">

                                <label for="password" class="form-label fw-semibold">
                                    <i class="fa-solid fa-lock text-secondary me-1"></i>
                                    Password
                                    <span class="text-danger">*</span>
                                </label>

                                <div class="input-group">

                                    <span class="input-group-text">
                                        <i class="fa-solid fa-lock text-secondary"></i>
                                    </span>

                                    <input type="password" name="password" id="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        placeholder="Enter password">

                                    <button type="button" class="btn btn-outline-secondary"
                                        onclick="togglePassword('password', this)">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>

                                </div>

                                <x-validation-error name="password" />

                            </div>


                            <!-- Confirm Password -->
                            <div class="col-md-6">

                                <label for="password_confirmation" class="form-label fw-semibold">
                                    <i class="fa-solid fa-lock text-secondary me-1"></i>
                                    Confirm Password
                                    <span class="text-danger">*</span>
                                </label>

                                <div class="input-group">

                                    <span class="input-group-text">
                                        <i class="fa-solid fa-lock text-secondary"></i>
                                    </span>

                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        class="form-control" placeholder="Confirm password">

                                    <button type="button" class="btn btn-outline-secondary"
                                        onclick="togglePassword('password_confirmation', this)">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>

                                </div>

                                <x-validation-error name="password_confirmation" />

                            </div>


                            <!-- ============================= -->
                            <!-- PROFILE IMAGE -->
                            <!-- ============================= -->

                            <div class="col-12 mt-4">

                                <div class="d-flex align-items-center gap-2 border-bottom pb-3">

                                    <span class="bg-primary bg-opacity-10 text-primary rounded-3 p-2">
                                        <i class="fa-solid fa-image"></i>
                                    </span>

                                    <div>
                                        <h5 class="fw-bold mb-0">
                                            Profile Image
                                        </h5>

                                        <small class="text-muted">
                                            Upload an optional user profile image.
                                        </small>
                                    </div>

                                </div>

                            </div>


                            <div class="col-md-6">

                                <label for="image" class="form-label fw-semibold">
                                    <i class="fa-solid fa-camera text-secondary me-1"></i>
                                    User Image
                                </label>

                                <input type="file" name="image" id="image"
                                    class="form-control @error('image') is-invalid @enderror"
                                    accept="image/png,image/jpeg,image/webp">

                                <x-validation-error name="image" />

                                <div class="form-text">
                                    <i class="fa-solid fa-circle-info me-1"></i>
                                    PNG, JPG or WEBP. Maximum size: 2MB.
                                </div>


                                <!-- Preview -->
                                <div id="imagePreviewWrapper" class="mt-3 d-none">

                                    <div class="card border shadow-sm" style="width: 140px;">

                                        <div class="card-body p-2">

                                            <img id="imagePreview" src="" alt="User image preview"
                                                class="img-fluid rounded">

                                        </div>

                                    </div>

                                </div>

                            </div>


                            <!-- ============================= -->
                            <!-- ACCESS CONTROL -->
                            <!-- ============================= -->

                            <div class="col-12 mt-4">

                                <div class="d-flex align-items-center gap-2 border-bottom pb-3">

                                    <span class="bg-primary bg-opacity-10 text-primary rounded-3 p-2">
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

                                <div class="card border h-100">

                                    <div class="card-header bg-transparent py-3">

                                        <div class="d-flex justify-content-between align-items-center">

                                            <div>
                                                <h6 class="fw-bold mb-1">
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

                                                    <div class="form-check border rounded p-3">

                                                        <input class="form-check-input roles-checkbox" type="checkbox"
                                                            name="roles[]" value="{{ $role->id }}"
                                                            id="role_{{ $role->id }}"
                                                            {{ in_array($role->id, old('roles', [])) ? 'checked' : '' }}>

                                                        <label class="form-check-label fw-medium"
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

                                <div class="card border h-100">

                                    <div class="card-header bg-transparent py-3">

                                        <div class="d-flex justify-content-between align-items-center">

                                            <div>
                                                <h6 class="fw-bold mb-1">
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

                                                    <div class="form-check border rounded p-3">

                                                        <input class="form-check-input permissions-checkbox"
                                                            type="checkbox" name="permissions[]"
                                                            value="{{ $permission->id }}"
                                                            id="permission_{{ $permission->id }}"
                                                            {{ in_array($permission->id, old('permissions', [])) ? 'checked' : '' }}>

                                                        <label class="form-check-label fw-medium"
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
                                    <i class="fa-solid fa-user-plus me-2"></i>
                                    Save User
                                </button>


                                <button type="reset" id="resetFormBtn" class="btn btn-outline-danger px-4">
                                    <i class="fa-solid fa-rotate-left me-2"></i>
                                    Reset
                                </button>


                                <a href="{{ route('user.index') }}" class="btn btn-outline-secondary px-4">
                                    <i class="fa-solid fa-xmark me-2"></i>
                                    Cancel
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
        // Password Toggle
        function togglePassword(inputId, button) {

            const input = document.getElementById(inputId);
            const icon = button.querySelector('i');

            if (input.type === 'password') {

                input.type = 'text';

                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');

            } else {

                input.type = 'password';

                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');

            }

        }


        // Select / Unselect All
        function toggleAll(className) {

            const checkboxes = document.querySelectorAll('.' + className);

            const allChecked = Array.from(checkboxes)
                .every(checkbox => checkbox.checked);

            checkboxes.forEach(function(checkbox) {

                checkbox.checked = !allChecked;

            });

        }


        // Image Preview
        document.getElementById('image').addEventListener('change', function(event) {

            const file = event.target.files[0];

            const wrapper = document.getElementById('imagePreviewWrapper');
            const preview = document.getElementById('imagePreview');

            if (file) {

                const reader = new FileReader();

                reader.onload = function(e) {

                    preview.src = e.target.result;
                    wrapper.classList.remove('d-none');

                };

                reader.readAsDataURL(file);

            } else {

                preview.src = '';
                wrapper.classList.add('d-none');

            }

        });


        // Reset Image Preview
        document.getElementById('resetFormBtn').addEventListener('click', function() {

            setTimeout(function() {

                document.getElementById('imagePreview').src = '';

                document
                    .getElementById('imagePreviewWrapper')
                    .classList.add('d-none');

            }, 50);

        });
    </script>

@endsection
