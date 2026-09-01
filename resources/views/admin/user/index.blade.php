@extends('admin.layout')

@section('main')
    <!-- Main Content -->
    <div class="flex-grow-1 p-4 m-5">
        <div class="card shadow">
            <div class="card-body">

                <!-- Header -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h1 class="h3 mb-0">Users <span class="badge bg-dark">{{ $userCount }}</span></h1>
                        <p class="text-muted mb-0">Manage system users.</p>
                    </div>

                    <a href="{{ route('user.create') }}" class="btn btn-primary">
                        <i class="fa-solid fa-plus me-2"></i>
                        Add User
                    </a>
                </div>

                <!-- Success Alert -->
                <x-alert-success />

                <!-- Users Table -->
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">User</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                @if ($user->id !== 1)
                                    <tr>
                                        <td>{{ $users->firstItem() + $loop->index }}</td>
                                        <td>
                                            @if ($user->image)
                                                <img src="{{ asset('storage/' . $user->image->path) }}"
                                                    alt="{{ $user->image->alt_text ?? $user->name }}" class="rounded"
                                                    width="48" height="48" style="object-fit: cover;">
                                            @else
                                                <div class="d-flex align-items-center justify-content-center bg-light rounded text-muted"
                                                    style="width: 48px; height: 48px;">
                                                    <i class="fa-solid fa-user"></i>
                                                </div>
                                            @endif
                                        </td>
                                        <td class="fw-semibold">{{ $user->name }}</td>
                                        <td class="fw-semibold">{{ $user->email }}</td>
                                        <td class="fw-semibold">{{ $user->getRoleNames()->implode(', ') }}</td>
                                        <td class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('user.show', $user->id) }}" class="btn btn-sm btn-primary"
                                                title="Detail">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>

                                            <a href="{{ route('user.edit', $user) }}" class="btn btn-sm btn-dark"
                                                title="Edit">
                                                <i class="fa-solid fa-pen"></i>
                                            </a>

                                            <button type="button" class="btn btn-sm btn-danger" title="Delete"
                                                data-bs-toggle="modal" data-bs-target="#deleteUserModal"
                                                data-user-name="{{ $user->name }}"
                                                data-delete-url="{{ route('user.destroy', $user) }}">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endif
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-5">
                                        <i class="fa-solid fa-user-slash fs-2 d-block mb-2"></i>
                                        No Users found. Click "Add User" to create one.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if ($users->hasPages())
                    <div class="mt-4">
                        {{ $users->links('pagination::bootstrap-5') }}
                    </div>
                @endif

            </div>
        </div>
    </div>

    <!-- Reusable Delete Modal -->
    <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    Are you sure you want to delete
                    <strong id="deleteUserName"></strong>? This action cannot be undone.
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                    <form id="deleteUserForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteModal = document.getElementById('deleteUserModal');
            if (deleteModal) {
                deleteModal.addEventListener('show.bs.modal', function(event) {
                    const button = event.relatedTarget;
                    const userName = button.getAttribute('data-user-name');
                    const deleteUrl = button.getAttribute('data-delete-url');

                    document.getElementById('deleteUserName').textContent = userName;
                    document.getElementById('deleteUserForm').action = deleteUrl;
                });
            }
        });
    </script>
@endsection
