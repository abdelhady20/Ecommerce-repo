<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequests\StoreBrandRequest;
use App\Http\Requests\BrandRequests\UpdateBrandRequest;
use App\Models\Brand;
use App\Repositories\BrandRepositoryInterface;

class BrandController extends Controller
{
    public function __construct(protected BrandRepositoryInterface $brandRepo) {}

    public function index()
    {
        $brands = $this->brandRepo->getAll();
        return view('admin.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.brands.create');
    }

    public function store(StoreBrandRequest $request)
    {
        $this->brandRepo->create($request->validated());

        return redirect()->route('admin.brands.index')->with('success', 'Brand created successfully.');
    }

    public function edit(Brand $brand)
    {
        return view('admin.brands.edit', compact('brand'));
    }

    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $this->brandRepo->update($brand, $request->validated());

        return redirect()->route('admin.brands.index')->with('success', 'Brand updated successfully.');
    }

    public function destroy(Brand $brand)
    {
        $this->brandRepo->delete($brand);

        return redirect()->route('admin.brands.index')->with('success', 'Brand deleted successfully.');
    }
}

