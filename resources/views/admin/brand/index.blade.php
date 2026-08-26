@extends('admin.layout')
@section('main')
    <!-- Main Content -->
    <div class="flex-grow-1 p-4 m-5">

        <div class="card shadow">

            <div class="card-body">

                <!-- Header -->
                <div class="d-flex justify-content-between align-items-center mb-4">

                    <div>
                        <h1 class="h3 mb-0">Brands <span class="badge bg-dark">{{ $brandCount }}</span></h1>
                        <p class="text-muted mb-0">Manage the brands available in your store.</p>
                    </div>

                    <a href="{{ route('brand.create') }}" class="btn btn-primary">
                        <i class="fa-solid fa-plus me-2"></i>
                        Add Brand
                    </a>

                </div>

                <!-- Success Message -->

                <x-alert-success />

                <!-- Brands Table -->
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Logo</th>
                                <th scope="col">Brand Name</th>
                                <th scope="col">Brand Slug</th>
                                <th scope="col" class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($brands as $brand)
                                <tr>
                                    <td>{{ $brands->firstItem() + $loop->index }}</td>

                                    <td>
                                        @if ($brand->image)
                                            <img src="{{ asset('storage/' . $brand->image->path) }}"
                                                alt="{{ $brand->image->alt_text ?? $brand->brand_name }}" class="rounded"
                                                width="48" height="48" style="object-fit: cover;">
                                        @else
                                            <div class="d-flex align-items-center justify-content-center bg-light rounded text-muted"
                                                style="width: 48px; height: 48px;">
                                                <i class="fa-solid fa-image"></i>
                                            </div>
                                        @endif
                                    </td>

                                    <td class="fw-semibold">{{ $brand->brand_name }}</td>

                                    <td>
                                        <span class="badge bg-secondary-subtle text-secondary-emphasis">
                                            {{ $brand->brand_slug }}
                                        </span>
                                    </td>

                                    <td class="d-flex justify-content-center gap-2">

                                        <a href="{{ route('brand.edit', $brand) }}" class="btn btn-sm btn-secondary"
                                            title="Edit">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>

                                        <a href="{{ route('brand.show', $brand) }}" class="btn btn-sm btn-primary"
                                            title="View">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>

                                        <button type="button" class="btn btn-sm btn-danger" title="Delete"
                                            data-bs-toggle="modal" data-bs-target="#deleteBrandModal"
                                            data-brand-name="{{ $brand->brand_name }}"
                                            data-delete-url="{{ route('brand.destroy', $brand) }}">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-5">
                                        <i class="fa-solid fa-tag fs-2 d-block mb-2"></i>
                                        No brands found. Click "Add Brand" to create one.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if ($brands->hasPages())
                    {{ $brands->links('pagination::bootstrap-5') }}
                @endif

            </div>

        </div>

    </div>

    <!-- Single reusable Delete Confirmation Modal (outside the loop) -->
    <div class="modal fade" id="deleteBrandModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Delete Brand</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    Are you sure you want to delete
                    <strong id="deleteBrandName"></strong>? This action cannot be undone.
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                    <form action="{{ route('brand.destroy', $brand) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            Delete
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
