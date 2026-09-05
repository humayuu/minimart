@extends('admin.layout')
@section('main')
    <!-- Main Content -->
    <div class="flex-grow-1 p-4 m-5">

        <div class="card shadow">

            <div class="card-body">

                <!-- Header -->
                <div class="d-flex justify-content-between align-items-center mb-4">

                    <div>
                        <h1 class="h3 mb-0">Orders <span class="badge bg-dark">{{ $orderCount }}</span></h1>
                        <p class="text-muted mb-0">Manage Order for your store.</p>
                    </div>
                </div>

                <!-- Success Message -->

                <x-alert-success />

                <!-- Brands Table -->
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Order No</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Total</th>
                                <th scope="col">Status</th>
                                <th scope="col" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $order)
                                <tr>
                                    <td>{{ $orders->firstItem() + $loop->index }}</td>
                                    <td class="fw-semibold">{{ $order->order_number }}</td>
                                    <td class="fw-semibold">{{ $order->user->name }}</td>
                                    <td class="fw-semibold">{{ $order->total }}</td>
                                    <td class="fw-semibold">Pending</td>



                                    <td class="d-flex justify-content-center gap-2">

                                        <a href="{{ route('order.show', $order) }}" class="btn btn-sm btn-primary"
                                            title="Detail">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-danger" title="Delete"
                                            data-bs-toggle="modal" data-bs-target="#deleteDeleteModal" data-delete-name=""
                                            data-delete-url="#">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-5">
                                        <i class="fa-solid fa-tag fs-2 d-block mb-2"></i>
                                        No Order found.
                                    </td>
                                </tr>
                            @endforelse


                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if ($orders->hasPages())
                    {{ $orders->links('pagination::bootstrap-5') }}
                @endif


            </div>

        </div>

    </div>

    <!-- Single reusable Delete Confirmation Modal (outside the loop) -->
    {{-- <div class="modal fade" id="deleteBrandModal" tabindex="-1" aria-hidden="true">
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

                    <form id="deleteBrandForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            Delete
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div> --}}
@endsection
