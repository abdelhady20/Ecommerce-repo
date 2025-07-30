<?php

namespace App\Repositories;

use App\Models\Category;

interface CategoryRepositoryInterface
{
    public function getAll();
    public function getParents($excludeId = null);
    public function create(array $data): Category;
    public function update(Category $category, array $data): Category;
    public function delete(Category $category): void;

}
