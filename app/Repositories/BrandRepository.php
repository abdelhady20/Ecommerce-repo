<?php

namespace App\Repositories;

use App\Models\Brand;

class BrandRepository implements BrandRepositoryInterface
{
    public function getAll()
    {
        return Brand::all();
    }

    public function create(array $data): Brand
    {
        return Brand::create($data);
    }

    public function update(Brand $brand, array $data): Brand
    {
        $brand->update($data);
        return $brand;
    }

    public function delete(Brand $brand): void
    {
        $brand->delete();
    }
}
