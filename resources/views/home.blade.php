@extends('layout')
@section('main')
    {{-- Main content --}}
    <main class="py-4">

        <div class="container">
            <x-alert-success />

            {{-- Banner / hero --}}
            <div class="p-5 mb-4 bg-primary bg-gradient text-white rounded-3 text-center">
                <h1 class="display-6 fw-bold">Big Savings on Everyday Essentials</h1>
                <p class="lead mb-4">Shop groceries, electronics, fashion &amp; more — all in one place.</p>
                <a href="#" class="btn btn-light btn-lg">Shop Now</a>
            </div>

            {{-- Categories row --}}
            <h5 class="mb-3">Shop by Category</h5>
            <div class="row g-3 mb-5 text-center">
                <div class="col-6 col-md-2">
                    <div class="p-3 bg-white rounded shadow-sm h-100">
                        <i class="fa-solid fa-mobile-screen fa-2x text-primary mb-2"></i>
                        <p class="mb-0 small">Electronics</p>
                    </div>
                </div>
                <div class="col-6 col-md-2">
                    <div class="p-3 bg-white rounded shadow-sm h-100">
                        <i class="fa-solid fa-cart-shopping fa-2x text-primary mb-2"></i>
                        <p class="mb-0 small">Groceries</p>
                    </div>
                </div>
                <div class="col-6 col-md-2">
                    <div class="p-3 bg-white rounded shadow-sm h-100">
                        <i class="fa-solid fa-shirt fa-2x text-primary mb-2"></i>
                        <p class="mb-0 small">Fashion</p>
                    </div>
                </div>
                <div class="col-6 col-md-2">
                    <div class="p-3 bg-white rounded shadow-sm h-100">
                        <i class="fa-solid fa-couch fa-2x text-primary mb-2"></i>
                        <p class="mb-0 small">Home &amp; Living</p>
                    </div>
                </div>
                <div class="col-6 col-md-2">
                    <div class="p-3 bg-white rounded shadow-sm h-100">
                        <i class="fa-solid fa-spray-can-sparkles fa-2x text-primary mb-2"></i>
                        <p class="mb-0 small">Beauty</p>
                    </div>
                </div>
                <div class="col-6 col-md-2">
                    <div class="p-3 bg-white rounded shadow-sm h-100">
                        <i class="fa-solid fa-baby fa-2x text-primary mb-2"></i>
                        <p class="mb-0 small">Baby Care</p>
                    </div>
                </div>
            </div>

            {{-- Products --}}
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">Featured Products</h5>
                <a href="#" class="small">View All <i class="fa-solid fa-arrow-right ms-1"></i></a>
            </div>

            <div class="row g-4">

                {{-- Product 1 --}}
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card product-card h-100">
                        <span class="badge bg-danger position-absolute m-2">-20%</span>
                        <img src="https://via.placeholder.com/300x200" class="card-img-top product-img" alt="Product">
                        <div class="card-body">
                            <p class="text-muted small mb-1">Nestle</p>
                            <h6 class="card-title">Nescafe Coffee 200g</h6>
                            <div class="d-flex align-items-center gap-2">
                                <span class="price">Rs. 799</span>
                                <span class="old-price">Rs. 999</span>
                            </div>
                            <div class="text-warning small mb-2">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            </div>
                            <button class="btn btn-primary btn-sm w-100">
                                <i class="fa-solid fa-cart-plus me-1"></i> Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Product 2 --}}
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card product-card h-100">
                        <img src="https://via.placeholder.com/300x200" class="card-img-top product-img" alt="Product">
                        <div class="card-body">
                            <p class="text-muted small mb-1">Samsung</p>
                            <h6 class="card-title">Galaxy Buds Pro</h6>
                            <div class="d-flex align-items-center gap-2">
                                <span class="price">Rs. 12,999</span>
                            </div>
                            <div class="text-warning small mb-2">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <button class="btn btn-primary btn-sm w-100">
                                <i class="fa-solid fa-cart-plus me-1"></i> Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Product 3 --}}
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card product-card h-100">
                        <span class="badge bg-success position-absolute m-2">New</span>
                        <img src="https://via.placeholder.com/300x200" class="card-img-top product-img" alt="Product">
                        <div class="card-body">
                            <p class="text-muted small mb-1">Nike</p>
                            <h6 class="card-title">Air Max Running Shoes</h6>
                            <div class="d-flex align-items-center gap-2">
                                <span class="price">Rs. 8,499</span>
                            </div>
                            <div class="text-warning small mb-2">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            </div>
                            <button class="btn btn-primary btn-sm w-100">
                                <i class="fa-solid fa-cart-plus me-1"></i> Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Product 4 --}}
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card product-card h-100">
                        <img src="https://via.placeholder.com/300x200" class="card-img-top product-img" alt="Product">
                        <div class="card-body">
                            <p class="text-muted small mb-1">LG</p>
                            <h6 class="card-title">LED Smart TV 43"</h6>
                            <div class="d-flex align-items-center gap-2">
                                <span class="price">Rs. 54,999</span>
                                <span class="old-price">Rs. 59,999</span>
                            </div>
                            <div class="text-warning small mb-2">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            </div>
                            <button class="btn btn-primary btn-sm w-100">
                                <i class="fa-solid fa-cart-plus me-1"></i> Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Product 5 --}}
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card product-card h-100">
                        <img src="https://via.placeholder.com/300x200" class="card-img-top product-img" alt="Product">
                        <div class="card-body">
                            <p class="text-muted small mb-1">Adidas</p>
                            <h6 class="card-title">Sport T-Shirt</h6>
                            <div class="d-flex align-items-center gap-2">
                                <span class="price">Rs. 2,499</span>
                            </div>
                            <div class="text-warning small mb-2">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            </div>
                            <button class="btn btn-primary btn-sm w-100">
                                <i class="fa-solid fa-cart-plus me-1"></i> Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Product 6 --}}
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card product-card h-100">
                        <span class="badge bg-danger position-absolute m-2">-15%</span>
                        <img src="https://via.placeholder.com/300x200" class="card-img-top product-img" alt="Product">
                        <div class="card-body">
                            <p class="text-muted small mb-1">P&amp;G</p>
                            <h6 class="card-title">Shampoo 400ml</h6>
                            <div class="d-flex align-items-center gap-2">
                                <span class="price">Rs. 599</span>
                                <span class="old-price">Rs. 699</span>
                            </div>
                            <div class="text-warning small mb-2">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            </div>
                            <button class="btn btn-primary btn-sm w-100">
                                <i class="fa-solid fa-cart-plus me-1"></i> Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Product 7 --}}
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card product-card h-100">
                        <img src="https://via.placeholder.com/300x200" class="card-img-top product-img" alt="Product">
                        <div class="card-body">
                            <p class="text-muted small mb-1">Unilever</p>
                            <h6 class="card-title">Skin Care Cream</h6>
                            <div class="d-flex align-items-center gap-2">
                                <span class="price">Rs. 899</span>
                            </div>
                            <div class="text-warning small mb-2">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            </div>
                            <button class="btn btn-primary btn-sm w-100">
                                <i class="fa-solid fa-cart-plus me-1"></i> Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Product 8 --}}
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card product-card h-100">
                        <span class="badge bg-success position-absolute m-2">New</span>
                        <img src="https://via.placeholder.com/300x200" class="card-img-top product-img" alt="Product">
                        <div class="card-body">
                            <p class="text-muted small mb-1">Samsung</p>
                            <h6 class="card-title">Wireless Mouse</h6>
                            <div class="d-flex align-items-center gap-2">
                                <span class="price">Rs. 1,299</span>
                            </div>
                            <div class="text-warning small mb-2">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <button class="btn btn-primary btn-sm w-100">
                                <i class="fa-solid fa-cart-plus me-1"></i> Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </main>
@endsection
