@extends('admin.layout')
@section('main')
    <!-- Main Content -->
    <div class="flex-grow-1 p-4 m-5">

        <div class="card shadow">

            <div class="card-body">

                <!-- Header -->
                <div class="d-flex justify-content-between align-items-center mb-4">

                    <div>
                        <h1 class="h3 mb-0">Categories <span class="badge bg-dark">{{ $categoryCount }}</span></h1>
                        <p class="text-muted mb-0">Manage the Category available in your store.</p>
                    </div>

                    <a href="{{ route('category.create') }}" class="btn btn-primary">
                        <i class="fa-solid fa-plus me-2"></i>
                        Add Category
                    </a>

                </div>

                <!-- Success Message -->

                <x-alert-success />

                <!-- Category Table -->
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Category Slug</th>
                                <th scope="col">Category Description</th>
                                <th scope="col">Product Count</th>
                                <th scope="col" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                    <td>{{ $categories->firstItem() + $loop->index }}</td>

                                    <td class="fw-semibold">{{ $category->category_name }}</td>

                                    <td>
                                        <span class="badge bg-secondary-subtle text-secondary-emphasis">
                                            {{ $category->category_slug }}
                                        </span>
                                    </td>
                                    <td class="fw-semibold">{{ $category->category_description }}</td>
                                    <td class="fw-semibold">{{ $category->products->count() }}</td>


                                    <td class="d-flex justify-content-center gap-2">


                                        <a href="{{ route('category.edit', $category) }}" class="btn btn-sm btn-dark"
                                            title="Edit">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>

                                        <button type="button" class="btn btn-sm btn-danger" title="Delete"
                                            data-bs-toggle="modal" data-bs-target="#deleteCategoryModal"
                                            data-category-name="{{ $category->category_name }}"
                                            data-delete-url="{{ route('category.destroy', $category) }}">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-5">
                                        <i class="fa-solid fa-tag fs-2 d-block mb-2"></i>
                                        No category found. Click "Add Category" to create one.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if ($categories->hasPages())
                    {{ $categories->links('pagination::bootstrap-5') }}
                @endif

            </div>

        </div>

    </div>

    <!-- Single reusable Delete Confirmation Modal (outside the loop) -->
    <div class="modal fade" id="deleteCategoryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Delete Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    Are you sure you want to delete
                    <strong id="deleteCategoryName"></strong>? This action cannot be undone.
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                    <form id="deleteCategoryForm" method="POST">
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
        const deleteCategoryModal = document.getElementById('deleteCategoryModal');

        deleteCategoryModal.addEventListener('show.bs.modal', function(event) {

            const button = event.relatedTarget;

            const categoryName = button.getAttribute('data-category-name');
            const deleteUrl = button.getAttribute('data-delete-url');

            document.getElementById('deleteCategoryName').textContent = categoryName;

            document.getElementById('deleteCategoryForm').action = deleteUrl;
        });
    </script>
@endsection
