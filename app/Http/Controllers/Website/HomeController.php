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
        $newProducts = Product::latest()->take(8)->get();
        $products = Product::latest()->paginate(8);

        return view('website.main_home', compact('newProducts', 'products'));
    }

    public function index(Request $request)
    {
        $categories = Category::whereNull('parent_id')->get();

        $query = $request->input('search');

        $products = Product::query()
            ->when($query, function ($q) use ($query) {
                $q->where('name', 'like', "%{$query}%")
                    ->orWhere('description', 'like', "%{$query}%");
            })
            ->latest()
            ->paginate(8);

        return view('website.home', compact('categories', 'products', 'query'));
    }


}
