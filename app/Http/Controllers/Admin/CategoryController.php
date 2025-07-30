<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequests\StoreCategoryRequest;
use App\Http\Requests\CategoryRequests\UpdateCategoryRequest;
use App\Models\Category;
use App\Repositories\CategoryRepositoryInterface;

class CategoryController extends Controller
{
    protected CategoryRepositoryInterface $categoryRepo;

    public function __construct(CategoryRepositoryInterface $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }

    public function index()
    {
        $categories = $this->categoryRepo->getAll();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $parents = $this->categoryRepo->getParents();
        return view('admin.categories.create', compact('parents'));
    }

    public function store(StoreCategoryRequest $request)
    {
        $this->categoryRepo->create($request->validated());

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category created successfully.');
    }

    public function edit(Category $category)
    {
        $parents = $this->categoryRepo->getParents($category->id);
        return view('admin.categories.edit', compact('category', 'parents'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $this->categoryRepo->update($category, $request->validated());

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        $this->categoryRepo->delete($category);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category deleted successfully.');
    }
    public function getCategoryTree()
    {
        return Category::with('children')->whereNull('parent_id')->get();
    }
}
