<?php

namespace App\Repositories;

use App\Models\Category;


class CategoryRepository implements CategoryRepositoryInterface
{
    public function getAll()
    {
        return Category::with('parent')->get();
    }

    public function getParents($excludeId = null)
    {
        return Category::when($excludeId, fn($q) => $q->where('id', '!=', $excludeId))
            ->whereNull('parent_id')
            ->get();
    }

    public function create(array $data): Category
    {
        return Category::create($data);
    }

    public function update(Category $category, array $data): Category
    {
        $category->update($data);
        return $category;
    }

    public function delete(Category $category): void
    {
        $category->delete();
    }
}

