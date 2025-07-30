<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductsRequests\StoreProductRequest;
use App\Http\Requests\ProductsRequests\UpdateProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Repositories\ProductRepositoryInterface;

class ProductController extends Controller
{
    public function __construct(protected ProductRepositoryInterface $productRepo) {}

    public function index()
    {
        $products = $this->productRepo->getAll();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $mainCategories = Category::with('children')->whereNull('parent_id')->get();
        $brands = Brand::all();
        return view('admin.products.create', compact('mainCategories', 'brands'));
    }

    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('main_image')) {
            $image = $request->file('main_image')->store('products', 'public');
            $data['main_image'] = $image;
        }

        $this->productRepo->create($data);

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }


    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.products.edit', compact('product', 'categories', 'brands'));
    }


    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $data = $request->validated();

        if ($request->hasFile('main_image')) {
            if ($product->main_image && file_exists(public_path('uploads/' . $product->main_image))) {
                unlink(public_path('uploads/' . $product->main_image));
            }

            $file = $request->file('main_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/products'), $filename);
            $data['main_image'] = 'products/' . $filename;
        }

        $this->productRepo->update($product, $data);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $this->productRepo->delete($product);
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }
}
