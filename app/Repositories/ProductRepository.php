<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    public function getAll()
    {
        return Product::with(['category', 'brand'])
            ->oldest()
            ->paginate(20);
    }

    public function create(array $data): Product
    {
        if (request()->hasFile('main_image')) {
            $file = request()->file('main_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/products'), $filename);
            $data['main_image'] = 'products/' . $filename;
        }

        return Product::create($data);
    }

    public function update(Product $product, array $data): Product
    {
        $product->update($data);
        return $product;
    }

    public function delete(Product $product): void
    {
        if ($product->main_image && file_exists(public_path('uploads/' . $product->main_image))) {
            unlink(public_path('uploads/' . $product->main_image));
        }

        $product->delete();
    }
}

