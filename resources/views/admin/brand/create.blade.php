@extends('admin.layout')

@section('main')
    <div class="flex-grow-1 p-4 p-md-5">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4 p-md-5">

                <!-- Header -->
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
                    <div>
                        <h1 class="h3 fw-bold mb-1">Add Brand</h1>
                        <p class="text-muted mb-0">
                            Create a new brand for your store.
                        </p>
                    </div>

                    <a href="{{ url()->previous() }}" class="btn btn-dark">
                        <i class="fa-solid fa-arrow-left me-2"></i>
                        Back
                    </a>
                </div>
                <x-alert-success />
                <!-- Create Form -->
                <form action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="row g-4">

                        <!-- Brand Name -->
                        <div class="col-md-6">
                            <label for="name" class="form-label fw-semibold">
                                Brand Name
                                <span class="text-danger">*</span>
                            </label>

                            <input type="text" name="name" id="name" class="form-control form-control"
                                value="{{ old('name') }}" placeholder="e.g. Nike" autofocus>
                            <x-validation-error name="name" />

                            <div class="form-text">
                                The slug will be generated automatically from the brand name.
                            </div>
                        </div>

                        <!-- Brand Description -->
                        <div class="col-md-6">
                            <label for="description" class="form-label fw-semibold">
                                Brand Description
                                <span class="text-danger">*</span>
                            </label>

                            <textarea name="description" id="description" class="form-control" rows="4"
                                placeholder="Write a short description about this brand...">{{ old('description') }}</textarea>

                            <x-validation-error name="description" />


                            <div class="form-text">
                                Add a short and clear description of the brand.
                            </div>
                        </div>

                        <!-- Brand Logo -->
                        <div class="col-md-6">
                            <label for="image" class="form-label fw-semibold">
                                Brand Logo
                            </label>

                            <input type="file" name="image" id="image" class="form-control"
                                accept="image/png,image/jpeg,image/webp">

                            <x-validation-error name="image" />

                            <div class="form-text">
                                PNG, JPG or WEBP. Maximum size: 2MB.
                            </div>

                            <!-- Image Preview -->
                            <div id="imagePreviewWrapper" class="mt-3 d-none">

                                <div class="border rounded p-2 bg-light d-inline-block">
                                    <img id="imagePreview" src="" alt="Logo preview" width="100" height="100"
                                        class="rounded" style="object-fit: contain;">
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Form Actions -->
                    <div class="mt-5 pt-3 border-top d-flex flex-column flex-sm-row gap-2">
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="fa-solid fa-check me-2"></i>
                            Save Brand
                        </button>
                        <a href="{{ route('brand.index') }}" class="btn btn-outline-secondary px-4">
                            Cancel
                        </a>
                    </div>

                </form>

            </div>
        </div>

    </div>

    <!-- Image Preview Script -->
    <script>
        document.getElementById('image').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('imagePreview');
            const wrapper = document.getElementById('imagePreviewWrapper');

            if (file) {
                preview.src = URL.createObjectURL(file);
                wrapper.classList.remove('d-none');
            } else {
                preview.src = '';
                wrapper.classList.add('d-none');
            }
        });
    </script>
@endsection
