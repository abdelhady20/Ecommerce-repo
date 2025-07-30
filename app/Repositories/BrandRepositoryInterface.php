<?php

namespace App\Repositories;

use App\Models\Brand;

interface BrandRepositoryInterface
{
    public function getAll();
    public function create(array $data): Brand;
    public function update(Brand $brand, array $data): Brand;
    public function delete(Brand $brand): void;
}
