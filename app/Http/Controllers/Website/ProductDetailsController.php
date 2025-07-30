<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductDetailsController extends Controller
{
    public function show(Product $product)
    {
        $product->load(['category', 'brand']);
        return view('website.products.show', compact('product'));
    }
}
