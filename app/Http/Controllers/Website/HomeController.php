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
        // أحدث 8 منتجات (أعلى id)
        $newProducts = Product::orderBy('id', 'asc')->take(8)->get();

        // أقدم 8 منتجات (أقل id)
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
