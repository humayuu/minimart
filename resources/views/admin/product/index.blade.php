@extends('admin.layout')
@section('main')
    <!-- Main Content -->
    <div class="flex-grow-1 p-4 m-5">

        <div class="card shadow">

            <div class="card-body">

                <!-- Header -->
                <div class="d-flex justify-content-between align-items-center mb-4">

                    <div>
                        <h1 class="h3 mb-0">Products <span class="badge bg-dark">{{ $productCount }}</span></h1>
                        <p class="text-muted mb-0">Manage the available Products in your store.</p>
                    </div>

                    <a href="{{ route('product.create') }}" class="btn btn-primary">
                        <i class="fa-solid fa-plus me-2"></i>
                        Add Product
                    </a>

                </div>

                <!-- Success Message -->

                <x-alert-success />

                <!-- Products Table -->
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Product</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Brand</th>
                                <th scope="col">Category</th>
                                <th scope="col">Price (After Discount)</th>
                                <th scope="col">Status</th>
                                <th scope="col" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr>
                                    <td>{{ $products->firstItem() + $loop->index }}</td>

                                    <td>
                                        @if ($product->image)
                                            <img src="{{ asset('storage/' . $product->image->path) }}"
                                                alt="{{ $product->image->alt_text ?? $product->product_name }}"
                                                class="rounded" width="48" height="48" style="object-fit: cover;">
                                        @else
                                            <div class="d-flex align-items-center justify-content-center bg-light rounded text-muted"
                                                style="width: 48px; height: 48px;">
                                                <i class="fa-solid fa-image"></i>
                                            </div>
                                        @endif
                                    </td>

                                    <td class="fw-semibold">
                                        {{ $product->product_name }}
                                        <br>
                                        <span class="badge bg-secondary-subtle text-secondary-emphasis">
                                            {{ $product->product_slug }}
                                        </span>
                                    </td>

                                    <td>{{ $product->brand->brand_name ?? '—' }}</td>

                                    <td>{{ $product->category->category_name ?? '—' }}</td>

                                    <td>
                                        @if ($product->product_discount_price)
                                            <span class="text-decoration-line-through text-muted small">
                                                {{ number_format($product->product_price, 2) }}
                                            </span>
                                            <span class="fw-semibold">
                                                {{ number_format($product->product_price - $product->product_discount_price, 2) }}
                                            </span>
                                        @else
                                            <span class="fw-semibold">
                                                {{ number_format($product->product_price, 2) }}
                                            </span>
                                        @endif
                                    </td>

                                    <td>
                                        @if ($product->is_active)
                                            <span class="badge bg-success-subtle text-success-emphasis">Active</span>
                                        @else
                                            <span class="badge bg-danger-subtle text-danger-emphasis">Inactive</span>
                                        @endif
                                    </td>

                                    <td class="d-flex justify-content-center gap-2">

                                        <a href="" class="btn btn-sm btn-success" title="Detail">
                                            <i class="fa-solid fa-thumbs-up"></i>
                                        </a>

                                        <a href="{{ route('product.show', $product->id) }}" class="btn btn-sm btn-primary"
                                            title="Detail">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>

                                        <a href="{{ route('product.edit', $product) }}" class="btn btn-sm btn-dark"
                                            title="Edit">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>

                                        <button type="button" class="btn btn-sm btn-danger" title="Delete"
                                            data-bs-toggle="modal" data-bs-target="#deleteProductModal"
                                            data-product-name="{{ $product->product_name }}"
                                            data-delete-url="{{ route('product.destroy', $product) }}">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center text-muted py-5">
                                        <i class="fa-solid fa-tag fs-2 d-block mb-2"></i>
                                        No products found. Click "Add Product" to create one.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if ($products->hasPages())
                    {{ $products->links('pagination::bootstrap-5') }}
                @endif

            </div>

        </div>

    </div>

    <!-- Single reusable Delete Confirmation Modal (outside the loop) -->
    <div class="modal fade" id="deleteProductModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Delete Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    Are you sure you want to delete
                    <strong id="deleteProductName"></strong>? This action cannot be undone.
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                    <form id="deleteProductForm" method="POST">
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
    <script>
        const deleteProductModal = document.getElementById('deleteProductModal');

        deleteProductModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const productName = button.getAttribute('data-product-name');
            const deleteUrl = button.getAttribute('data-delete-url');

            document.getElementById('deleteProductName').textContent = productName;
            document.getElementById('deleteProductForm').action = deleteUrl;
        });
    </script>
@endsection
