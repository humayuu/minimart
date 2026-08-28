@extends('admin.layout')

@section('main')
    <div class="flex-grow-1 p-4 p-md-5">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4 p-md-5">

                <!-- Header -->
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
                    <div>
                        <h1 class="h3 fw-bold mb-1">Add Product</h1>
                        <p class="text-muted mb-0">
                            Create a new Product for your store.
                        </p>
                    </div>

                    <a href="{{ url()->previous() }}" class="btn btn-dark">
                        <i class="fa-solid fa-arrow-left me-2"></i>
                        Back
                    </a>
                </div>
                <x-alert-success />
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Create Form -->
                <form action="{{ route('product.update', $product) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row g-4">

                        <!-- Product Name -->
                        <div class="col-md-6">
                            <label for="name" class="form-label fw-semibold">
                                Product Name
                                <span class="text-danger">*</span>
                            </label>

                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ old('name') }}" placeholder="e.g. Air Max 270" autofocus>
                            <x-validation-error name="name" />

                            <div class="form-text">
                                The slug will be generated automatically from the product name.
                            </div>
                        </div>

                        <!-- Brand -->
                        <div class="col-md-6">
                            <label for="brand" class="form-label fw-semibold">
                                Brand
                                <span class="text-danger">*</span>
                            </label>

                            <select name="brand" id="brand" class="form-select">
                                <option value="" disabled selected>Select a brand</option>

                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}" {{ old('brand') == $brand->id ? 'selected' : '' }}>
                                        {{ $brand->brand_name }}
                                    </option>
                                @endforeach
                            </select>

                            <x-validation-error name="brand" />
                        </div>

                        <!-- Category -->
                        <div class="col-md-6">
                            <label for="category" class="form-label fw-semibold">
                                Category
                                <span class="text-danger">*</span>
                            </label>

                            <select name="category" id="category" class="form-select">
                                <option value="" disabled selected>Select a category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category') == $category->id ? 'selected' : '' }}>
                                        {{ $category->category_name }}
                                    </option>
                                @endforeach
                            </select>

                            <x-validation-error name="category" />
                        </div>

                        <!-- Product Stock -->
                        <div class="col-md-6">
                            <label for="stock" class="form-label fw-semibold">
                                Stock Quantity
                                <span class="text-danger">*</span>
                            </label>

                            <input type="number" name="stock" id="stock" class="form-control"
                                value="{{ old('stock', 0) }}" min="0" placeholder="e.g. 50">
                            <x-validation-error name="stock" />
                        </div>

                        <!-- Product Price -->
                        <div class="col-md-6">
                            <label for="price" class="form-label fw-semibold">
                                Price
                                <span class="text-danger">*</span>
                            </label>

                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" name="price" id="price" class="form-control"
                                    value="{{ old('price') }}" min="0" step="0.01" placeholder="0.00">
                            </div>
                            <x-validation-error name="price" />
                        </div>

                        <!-- Product Discount Price -->
                        <div class="col-md-6">
                            <label for="discount" class="form-label fw-semibold">
                                Discount Price
                            </label>

                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" name="discount" id="discount" class="form-control"
                                    value="{{ old('discount') }}" min="0" max="100" step="0.01"
                                    placeholder="0.00">
                            </div>
                            <x-validation-error name="discount" />

                            <div class="form-text">
                                Optional. Leave blank if there's no discount.
                            </div>
                        </div>

                        <!-- Product Description -->
                        <div class="col-12">
                            <label for="description" class="form-label fw-semibold">
                                Product Description
                            </label>

                            <textarea name="description" id="description" class="form-control" rows="4"
                                placeholder="Write a short description about this product...">{{ old('description') }}</textarea>

                            <x-validation-error name="description" />
                        </div>

                        <!-- Product Image -->
                        <div class="col-md-6">
                            <label for="image" class="form-label fw-semibold">
                                Product Image
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
                                    <img id="imagePreview" src="" alt="Product image preview" width="100"
                                        height="100" class="rounded" style="object-fit: contain;">
                                </div>
                            </div>
                        </div>

                        <!-- Is Active -->
                        <div class="col-md-6 d-flex align-items-end">
                            <div class="form-check form-switch">
                                <input type="hidden" name="status" value="0">
                                <input type="checkbox" name="status" id="status" class="form-check-input"
                                    value="1" {{ old('status', true) ? 'checked' : '' }}>
                                <label for="status" class="form-check-label fw-semibold">
                                    Active
                                </label>
                            </div>
                            <x-validation-error name="status" />
                        </div>

                    </div>

                    <!-- Form Actions -->
                    <div class="mt-5 pt-3 border-top d-flex flex-column flex-sm-row gap-2">
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="fa-solid fa-check me-2"></i>
                            Save Product
                        </button>
                        <button type="reset" id="resetFormBtn" class="btn btn-outline-danger px-4">
                            <i class="fa-solid fa-rotate-left me-2"></i>
                            Reset
                        </button>
                        <a href="{{ route('product.index') }}" class="btn btn-outline-secondary px-4">
                            Cancel
                        </a>
                    </div>

                </form>

            </div>
        </div>

    </div>

    <!-- Image Preview Script -->
    <script>
        const imageInput = document.getElementById('image');
        const imagePreview = document.getElementById('imagePreview');
        const imagePreviewWrapper = document.getElementById('imagePreviewWrapper');

        imageInput.addEventListener('change', function(event) {
            const file = event.target.files[0];

            if (file) {
                imagePreview.src = URL.createObjectURL(file);
                imagePreviewWrapper.classList.remove('d-none');
            } else {
                imagePreview.src = '';
                imagePreviewWrapper.classList.add('d-none');
            }
        });

        // Native reset only clears input values; it doesn't fire 'change',
        // so the preview has to be cleared manually here.
        document.getElementById('resetFormBtn').addEventListener('click', function() {
            imagePreview.src = '';
            imagePreviewWrapper.classList.add('d-none');
        });
    </script>
    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#brand').select2({});
                $('#category').select2({});
            });
        </script>
    @endpush
@endsection
