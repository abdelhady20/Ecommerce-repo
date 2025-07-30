<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class WebsiteCategoryController extends Controller
{

    public function showSubcategories(Category $mainCategory)
    {
        $subcategories = $mainCategory->children()->get();
        return view('website.categories.subcategories', compact('mainCategory', 'subcategories'));
    }

    public function showSubcategoryProducts(Category $subcategory)
    {
        $products = $subcategory->products()->paginate(12);
        return view('website.categories.products', compact('subcategory', 'products'));
    }



}
