@extends('admin.layout')

@section('main')
    <div class="flex-grow-1 p-4">
        <div class="container-fluid">

            {{-- Page Header --}}
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">

                <div>
                    <h1 class="h3 fw-bold mb-1">Order Details</h1>
                    <p class="text-muted mb-0">
                        View complete information about this order.
                    </p>
                </div>

                <div class="d-flex gap-2">
                    <a href="{{ url()->previous() }}" class="btn btn-outline-dark">
                        <i class="fa-solid fa-arrow-left me-2"></i>
                        Back
                    </a>
                </div>

            </div>


            {{-- Order Information --}}
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-body p-4">

                    <h5 class="fw-bold mb-4">
                        Order Information
                    </h5>

                    <div class="row g-3">

                        {{-- Order ID --}}
                        <div class="col-md-4">
                            <div class="bg-light rounded-3 p-3">

                                <small class="text-muted d-block mb-1">
                                    Order ID
                                </small>

                                <h6 class="fw-bold mb-0">
                                    #{{ $order->id }}
                                </h6>

                            </div>
                        </div>


                        {{-- Order Number --}}
                        <div class="col-md-4">
                            <div class="bg-light rounded-3 p-3">

                                <small class="text-muted d-block mb-1">
                                    Order Number
                                </small>

                                <h6 class="fw-bold mb-0">
                                    {{ $order->order_number }}
                                </h6>

                            </div>
                        </div>


                        {{-- Status --}}
                        <div class="col-md-4">
                            <div class="bg-light rounded-3 p-3">

                                <small class="text-muted d-block mb-1">
                                    Status
                                </small>

                                <h6 class="fw-bold mb-0">
                                    {{ ucfirst($order->status) }}
                                </h6>

                            </div>
                        </div>


                        {{-- User ID --}}
                        <div class="col-md-4">
                            <div class="bg-light rounded-3 p-3">

                                <small class="text-muted d-block mb-1">
                                    Customer ID
                                </small>

                                <h6 class="fw-bold mb-0">
                                    #{{ $order->user_id }}
                                </h6>

                            </div>
                        </div>


                        {{-- Total --}}
                        <div class="col-md-4">
                            <div class="bg-light rounded-3 p-3">

                                <small class="text-muted d-block mb-1">
                                    Order Total
                                </small>

                                <h6 class="fw-bold mb-0">
                                    {{ number_format($order->total, 2) }}
                                </h6>

                            </div>
                        </div>


                        {{-- Created At --}}
                        <div class="col-md-4">
                            <div class="bg-light rounded-3 p-3">

                                <small class="text-muted d-block mb-1">
                                    Created At
                                </small>

                                <h6 class="fw-bold mb-0">
                                    {{ $order->created_at->format('d M Y, h:i A') }}
                                </h6>

                            </div>
                        </div>

                    </div>

                </div>

            </div>


            {{-- Order Items --}}
            <div class="card border-0 shadow-sm">

                <div class="card-body p-4">

                    <div class="d-flex justify-content-between align-items-center mb-4">

                        <div>
                            <h5 class="fw-bold mb-1">
                                Order Items
                            </h5>

                            <p class="text-muted mb-0">
                                Products included in this order.
                            </p>
                        </div>

                        <span class="badge bg-dark">
                            {{ $order->orderItems->count() }} Items
                        </span>

                    </div>


                    {{-- Items Table --}}
                    <div class="table-responsive">

                        <table class="table table-hover align-middle mb-0">

                            <thead class="table-light">

                                <tr>
                                    <th>#</th>
                                    <th>Product</th>
                                    <th>Product ID</th>
                                    <th>Unit Price</th>
                                    <th>Quantity</th>
                                    <th>Line Total</th>
                                </tr>

                            </thead>


                            <tbody>

                                @forelse ($order->orderItems as $item)
                                    <tr>

                                        <td>
                                            {{ $loop->iteration }}
                                        </td>

                                        <td>
                                            <span class="fw-semibold">
                                                {{ $item->product_name }}
                                            </span>
                                        </td>

                                        <td>
                                            #{{ $item->product_id }}
                                        </td>

                                        <td>
                                            {{ number_format($item->unit_price, 2) }}
                                        </td>

                                        <td>
                                            <span class="badge bg-light text-dark border">
                                                {{ $item->quantity }}
                                            </span>
                                        </td>

                                        <td>
                                            <span class="fw-bold">
                                                {{ number_format($item->line_total, 2) }}
                                            </span>
                                        </td>

                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="6" class="text-center text-muted py-4">
                                            No items found for this order.
                                        </td>
                                    </tr>
                                @endforelse

                            </tbody>


                            {{-- Total --}}
                            <tfoot>

                                <tr>

                                    <td colspan="5" class="text-end fw-bold">
                                        Order Total:
                                    </td>

                                    <td class="fw-bold">
                                        {{ number_format($order->total, 2) }}
                                    </td>

                                </tr>

                            </tfoot>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
