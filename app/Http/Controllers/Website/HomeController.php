<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function main_home()
    {

        $newProducts = Product::orderBy('id', 'asc')->take(8)->get();
        $oldProducts = Product::orderBy('id', 'desc')->take(8)->get();

        return view('website.main_home', [
            'newProducts' => $newProducts,
            'products' => $oldProducts,
        ]);
    }



    public function index(Request $request)
    {
        $categories = Category::whereNull('parent_id')
            ->with('children')
            ->get();

        $search = $request->input('search');
        $categorySlug = $request->input('category');
        $subcategorySlug = $request->input('subcategory');

        $products = Product::query()

            ->when($search, function ($q) use ($search) {
                $q->where(function ($subQuery) use ($search) {
                    $subQuery->where('name', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%");
                });
            })

            ->when($categorySlug, function ($q) use ($categorySlug) {
                $category = Category::where('slug', $categorySlug)
                    ->with('children')
                    ->first();
                if ($category) {
                    $ids = $category->children->pluck('id')->toArray();
                    $ids[] = $category->id;
                    $q->whereIn('category_id', $ids);
                }
            })

            ->when($subcategorySlug, function ($q) use ($subcategorySlug) {
                $subcategory = Category::where('slug', $subcategorySlug)->first();
                if ($subcategory) {
                    $q->where('category_id', $subcategory->id);
                }
            })
            ->latest()
            ->paginate(8)
            ->appends($request->query());

        return view('website.home', compact(
            'categories',
            'products',
            'search',
            'categorySlug',
            'subcategorySlug'
        ));
    }



}
