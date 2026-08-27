@extends('admin.layout')

@section('main')
    <div class="flex-grow-1 p-4 p-md-5">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4 p-md-5">

                <!-- Header -->
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
                    <div>
                        <h1 class="h3 fw-bold mb-1">Add Category</h1>
                        <p class="text-muted mb-0">
                            Create a new Category for your store.
                        </p>
                    </div>

                    <a href="{{ url()->previous() }}" class="btn btn-dark">
                        <i class="fa-solid fa-arrow-left me-2"></i>
                        Back
                    </a>
                </div>
                <x-alert-success />
                <!-- Create Form -->
                <form action="{{ route('category.update', $category) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row g-4">

                        <!-- Category Name -->
                        <div class="col-md-6">
                            <label for="name" class="form-label fw-semibold">
                                Category Name
                                <span class="text-danger">*</span>
                            </label>

                            <input type="text" name="name" id="name" class="form-control form-control"
                                value="{{ old('name', $category->category_name) }}" placeholder="Cloths etc" autofocus>
                            <x-validation-error name="name" />

                            <div class="form-text">
                                The slug will be generated automatically from the brand name.
                            </div>
                        </div>

                        <!-- Brand Description -->
                        <div class="col-md-6">
                            <label for="description" class="form-label fw-semibold">
                                Category Description
                                <span class="text-danger">*</span>
                            </label>

                            <textarea name="description" id="description" class="form-control" rows="4"
                                placeholder="Write a short description about this brand...">{{ old('description', $category->category_description) }}</textarea>

                            <x-validation-error name="description" />


                            <div class="form-text">
                                Add a short and clear description of the brand.
                            </div>
                        </div>

                    </div>

                    <!-- Form Actions -->
                    <div class="mt-5 pt-3 border-top d-flex flex-column flex-sm-row gap-2">
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="fa-solid fa-check me-2"></i>
                            Save Category
                        </button>
                        <a href="{{ route('category.index') }}" class="btn btn-outline-secondary px-4">
                            Cancel
                        </a>
                    </div>

                </form>

            </div>
        </div>

    </div>
@endsection
