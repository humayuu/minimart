<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;

// use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(private ProductService $productServices) {}

    public static function middleware(): array
    {
        return [
            'auth',
            new Middleware('permission:view category', only: ['index']),
            new Middleware('permission:view detail category', only: ['show']),
            new Middleware('permission:create category', only: ['create', 'store']),
            new Middleware('permission:edit category', only: ['edit']),
            new Middleware('permission:update category', only: ['update']),
            new Middleware('permission:delete category', only: ['destroy']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = $this->productServices->getPaginate();
        $productCount = $products->count();
        return view('admin.product.index', compact('products', 'productCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = $this->productServices->getBrands();
        $categories = $this->productServices->getCategories();
        return view('admin.product.create', compact('brands', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $this->productServices->productStore($request->validated(), $request->file('image'));
        return redirect()->back()->with('success', 'Product Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.product.detail', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $brands = $this->productServices->getBrands();
        $categories = $this->productServices->getCategories();
        return view('admin.product.edit', compact('product', 'brands', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $this->productServices->productUpdate($request->validated(), $request->file('image'), $product);
        return redirect()->back()->with('success', 'Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $this->productServices->productDelete($product);
        return redirect()->back()->with('success', 'Product Deleted Successfully');
    }

    /**
     * For Update Product Status
     */
    public function productStatus(Request $request, Product $product)
    {
        $product->update([
            'is_active' => !$product->is_active,
        ]);

        return redirect()->back()->with('success', 'Status Updated');
    }
}
