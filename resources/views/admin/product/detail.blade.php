@extends('admin.layout')

@section('main')
    <div class="flex-grow-1 p-4">

        <div class="container-fluid">

            {{-- Page Header --}}
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">

                <div>
                    <h1 class="h3 fw-bold mb-1">Product Details</h1>
                    <p class="text-muted mb-0">
                        View complete information about this Product.
                    </p>
                </div>

                <div class="d-flex gap-2">
                    <a href="{{ url()->previous() }}" class="btn btn-outline-dark">
                        <i class="fa-solid fa-arrow-left me-2"></i>
                        Back
                    </a>

                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-dark">
                        <i class="fa-solid fa-pen me-2"></i>
                        Edit Brand
                    </a>
                </div>

            </div>


            {{-- Brand Detail Card --}}
            <div class="card border-0 shadow-sm">

                <div class="card-body p-4">

                    <div class="row g-4">

                        {{-- Brand Logo --}}
                        <div class="col-md-4">

                            <div class="border rounded-3 p-4 text-center h-100">

                                <div class="mb-3">
                                    @if ($product->image->path)
                                        <img src="{{ asset('storage/' . $product->image->path) }}"
                                            alt="{{ $product->product_name }}" class="img-fluid rounded"
                                            style="max-height: 180px; max-width: 100%; object-fit: contain;">
                                    @else
                                        <div class="d-flex align-items-center justify-content-center bg-light rounded"
                                            style="height: 180px;">
                                            <i class="fa-solid fa-image fa-4x text-muted"></i>
                                        </div>
                                    @endif
                                </div>

                                <h5 class="fw-bold mb-1">
                                    {{ $product->product_name }}
                                </h5>

                                <span class="badge bg-light text-dark border">
                                    Product
                                </span>

                            </div>

                        </div>


                        {{-- Product Information --}}
                        <div class="col-md-8">

                            <div class="row g-3">

                                {{-- Brand Name --}}
                                <div class="col-md-6">
                                    <div class="bg-light rounded-3 p-3">
                                        <small class="text-muted d-block mb-1">
                                            Brand
                                        </small>

                                        <h6 class="fw-bold mb-0">
                                            {{ $product->brand->brand_name }}
                                        </h6>
                                    </div>
                                </div>

                                {{-- Category Name --}}
                                <div class="col-md-6">
                                    <div class="bg-light rounded-3 p-3">
                                        <small class="text-muted d-block mb-1">
                                            Category
                                        </small>

                                        <h6 class="fw-bold mb-0">
                                            {{ $product->category->category_name }}
                                        </h6>
                                    </div>
                                </div>





                                {{-- Price --}}
                                <div class="col-md-6">
                                    <div class="bg-light rounded-3 p-3">
                                        <small class="text-muted d-block mb-1">
                                            Price (After Discount)
                                        </small>

                                        <h6 class="fw-bold mb-0 text-break">
                                            <span
                                                class="text-decoration-line-through text-muted">{{ number_format($product->product_price) }}</span>
                                            <span>{{ $product->product_price - $product->product_discount_price }}</span>
                                        </h6>
                                    </div>
                                </div>



                                {{-- Created At --}}
                                <div class="col-md-6">
                                    <div class="bg-light rounded-3 p-3">
                                        <small class="text-muted d-block mb-1">
                                            Created At
                                        </small>

                                        <h6 class="fw-bold mb-0">
                                            {{ $product->created_at->format('d M Y') }}
                                        </h6>
                                    </div>
                                </div>


                                {{-- Description --}}
                                <div class="col-12">
                                    <div class="bg-light rounded-3 p-3">

                                        <small class="text-muted d-block mb-2">
                                            Description
                                        </small>

                                        <p class="mb-0 text-muted">
                                            {{ $product->product_description ?: 'No description available.' }}
                                        </p>

                                    </div>
                                </div>


                                {{-- Status --}}
                                <div class="col-md-6">
                                    <div class="bg-light rounded-3 p-3">
                                        <small class="text-muted d-block mb-1">
                                            Status
                                        </small>

                                        <h6 class="fw-bold mb-0">
                                            {{ $product->is_active == 1 ? 'Active' : 'Inactive' }}
                                        </h6>
                                    </div>
                                </div>


                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
