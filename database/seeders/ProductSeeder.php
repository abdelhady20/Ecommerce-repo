<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $categories = Category::pluck('id')->toArray();
        $brands = Brand::pluck('id')->toArray();

        $path = public_path('storage/products');
        $files = glob($path . '/*.{jpg,jpeg,png}', GLOB_BRACE);

        foreach (range(1, 80) as $i) {
            $randomFile = $files[array_rand($files)];
            $randomCategory = $categories[array_rand($categories)];
            $randomBrand = count($brands) > 0 ? $brands[array_rand($brands)] : null;

            Product::create([
                'name' => 'Product ' . $i,
                'slug' => 'product-' . $i,
                'description' => 'Description for product ' . $i,
                'price' => rand(100, 500),
                'stock' => rand(10, 100),
                'category_id' => $randomCategory,
                'brand_id' => $randomBrand,
                'main_image' => 'storage/products/' . basename($randomFile),
            ]);
        }
    }
}
