<?php

namespace App\Http\Controllers;

use App\Http\Requests\Brand\StoreBrandRequest;
use App\Http\Requests\Brand\UpdateBrandRequest;
use App\Models\Brand;
use App\Services\BrandService;
use Illuminate\Routing\Controllers\Middleware;

class BrandController extends Controller
{
    public function __construct(private BrandService $brandService) {}

    public static function middleware(): array
    {
        return [
            'auth',
            new Middleware('permission:view brand', only: ['index']),
            new Middleware('permission:view detail brand', only: ['show']),
            new Middleware('permission:create brand', only: ['create', 'store']),
            new Middleware('permission:edit brand', only: ['edit']),
            new Middleware('permission:update brand', only: ['update']),
            new Middleware('permission:delete brand', only: ['destroy']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = $this->brandService->getPaginate();
        $brandCount = $brands->total();
        return view('admin.brand.index', compact('brands', 'brandCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request)
    {
        $this->brandService->createBrand($request->validated(), $request->file('image'));
        return redirect()->back()->with('success', 'Brand Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        return view('admin.brand.detail', compact('brand',));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('admin.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $this->brandService->updateBrand($request->validated(), $brand, $request->file('image'));
        return redirect()->back()->with('success', 'Brand Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $this->brandService->deleteBrand($brand);
        return redirect()->back()->with('success', 'Brand Deleted Successfully');
    }
}
