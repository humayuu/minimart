@extends('admin.layout')

@section('main')
    <div class="flex-grow-1 p-4">

        <div class="container-fluid">

            {{-- Page Header --}}
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">

                <div>
                    <h1 class="h3 fw-bold mb-1">Brand Details</h1>
                    <p class="text-muted mb-0">
                        View complete information about this brand.
                    </p>
                </div>

                <div class="d-flex gap-2">
                    <a href="{{ url()->previous() }}" class="btn btn-outline-dark">
                        <i class="fa-solid fa-arrow-left me-2"></i>
                        Back
                    </a>

                    <a href="{{ route('brand.edit', $brand->id) }}" class="btn btn-dark">
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
                                    @if ($brand->image->path)
                                        <img src="{{ asset('storage/' . $brand->image->path) }}"
                                            alt="{{ $brand->brand_name }}" class="img-fluid rounded"
                                            style="max-height: 180px; max-width: 100%; object-fit: contain;">
                                    @else
                                        <div class="d-flex align-items-center justify-content-center bg-light rounded"
                                            style="height: 180px;">
                                            <i class="fa-solid fa-image fa-4x text-muted"></i>
                                        </div>
                                    @endif
                                </div>

                                <h5 class="fw-bold mb-1">
                                    {{ $brand->brand_name }}
                                </h5>

                                <span class="badge bg-light text-dark border">
                                    Brand
                                </span>

                            </div>

                        </div>


                        {{-- Brand Information --}}
                        <div class="col-md-8">

                            <div class="row g-3">

                                {{-- Brand Name --}}
                                <div class="col-md-6">
                                    <div class="bg-light rounded-3 p-3">
                                        <small class="text-muted d-block mb-1">
                                            Brand Name
                                        </small>

                                        <h6 class="fw-bold mb-0">
                                            {{ $brand->brand_name }}
                                        </h6>
                                    </div>
                                </div>


                                {{-- Slug --}}
                                <div class="col-md-6">
                                    <div class="bg-light rounded-3 p-3">
                                        <small class="text-muted d-block mb-1">
                                            Brand Slug
                                        </small>

                                        <h6 class="fw-bold mb-0 text-break">
                                            {{ $brand->brand_slug }}
                                        </h6>
                                    </div>
                                </div>


                                {{-- Product Count --}}
                                <div class="col-md-6">
                                    <div class="bg-light rounded-3 p-3">
                                        <small class="text-muted d-block mb-1">
                                            Products
                                        </small>

                                        <h6 class="fw-bold mb-0">
                                            {{ $brand->product->count() }}
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
                                            {{ $brand->created_at->format('d M Y') }}
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
                                            {{ $brand->brand_description ?: 'No description available.' }}
                                        </p>

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
