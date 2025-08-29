<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCategoryRequest;
use App\Http\Requests\Admin\UpdateCategoryRequest;
use App\Models\Category;
use App\Repositories\CategoryRepositoryInterface;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @group Categories
     * @authenticated
     * @response 200 {
     *   "categories": [
     *     {
     *       "id": 1,
     *       "category_name": "Electronics",
     *       "slug": "electronics",
     *       "sort_order": 1,
     *       "description": "Electronic products",
     *       "created_at": "2025-08-29T09:00:00Z",
     *       "updated_at": "2025-08-29T09:00:00Z"
     *     }
     *   ]
     * }
     */
    public function index()
    {
        $categories = $this->categoryRepository->getAll(10);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Display a listing of the trashed (soft-deleted) resource.
     *
     * @group Categories
     * @authenticated
     * @response 200 {
     *   "categories": [
     *     {
     *       "id": 1,
     *       "category_name": "Deleted Category",
     *       "slug": "deleted-category",
     *       "deleted_at": "2025-08-29T09:00:00Z"
     *     }
     *   ]
     * }
     */
    public function trashed()
    {
        $categories = $this->categoryRepository->getTrashed(10);
        return view('admin.categories.trashed', compact('categories'));
    }

    /**
     * Restore the specified resource from storage.
     *
     * @group Categories
     * @authenticated
     * @urlParam category integer required The ID of the category to restore. Example: 1
     * @response 302 {
     *   "redirect": "/admin/categories/trashed",
     *   "message": "Category restored successfully."
     * }
     */
    public function restore($id)
    {
        $this->categoryRepository->restore($id);

        return redirect()->route('admin.categories.trashed')
            ->with('success', 'Category restored successfully.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @group Categories
     * @authenticated
     * @response 200 {
     *   "form": {
     *     "category_name": "",
     *     "slug": "",
     *     "sort_order": 0,
     *     "description": ""
     *   }
     * }
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @group Categories
     * @authenticated
     * @bodyParam category_name string required The name of the category. Example: "Electronics"
     * @bodyParam slug string optional The URL-friendly slug. If empty, will be generated from category_name. Example: "electronics"
     * @bodyParam sort_order integer required The display order. Example: 1
     * @bodyParam description string optional The category description. Example: "Electronic products"
     * @response 302 {
     *   "redirect": "/admin/categories",
     *   "message": "Category created successfully."
     * }
     * @response 422 {
     *   "errors": {
     *     "category_name": ["The category name field is required."],
     *     "sort_order": ["The sort order field is required."]
     *   }
     * }
     */
    public function store(StoreCategoryRequest $request)
    {
        $data = $request->validated();
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['category_name']);
        }

        $this->categoryRepository->create($data);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @group Categories
     * @authenticated
     * @urlParam id integer required The ID of the category to display. Example: 1
     * @response 200 {
     *   "category": {
     *     "id": 1,
     *     "category_name": "Electronics",
     *     "slug": "electronics",
     *     "sort_order": 1,
     *     "description": "Electronic products",
     *     "created_at": "2025-08-29T09:00:00Z",
     *     "updated_at": "2025-08-29T09:00:00Z"
     *   }
     * }
     * @response 404 {
     *   "message": "Category not found"
     * }
     */
    public function show($id)
    {
        $category = $this->categoryRepository->findById($id);
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @group Categories
     * @authenticated
     * @urlParam id integer required The ID of the category to edit. Example: 1
     * @response 200 {
     *   "category": {
     *     "id": 1,
     *     "category_name": "Electronics",
     *     "slug": "electronics",
     *     "sort_order": 1,
     *     "description": "Electronic products"
     *   }
     * }
     * @response 404 {
     *   "message": "Category not found"
     * }
     */
    public function edit($id)
    {
        $category = $this->categoryRepository->findById($id);
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @group Categories
     * @authenticated
     * @urlParam id integer required The ID of the category to update. Example: 1
     * @bodyParam category_name string required The name of the category. Example: "Electronics"
     * @bodyParam slug string optional The URL-friendly slug. If empty, will be generated from category_name. Example: "electronics"
     * @bodyParam sort_order integer required The display order. Example: 1
     * @bodyParam description string optional The category description. Example: "Electronic products"
     * @response 302 {
     *   "redirect": "/admin/categories",
     *   "message": "Category updated successfully."
     * }
     * @response 422 {
     *   "errors": {
     *     "category_name": ["The category name field is required."],
     *     "sort_order": ["The sort order field is required."]
     *   }
     * }
     * @response 404 {
     *   "message": "Category not found"
     * }
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        $data = $request->validated();
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['category_name']);
        }

        $this->categoryRepository->update($id, $data);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @group Categories
     * @authenticated
     * @urlParam id integer required The ID of the category to delete. Example: 1
     * @response 302 {
     *   "redirect": "/admin/categories",
     *   "message": "Category deleted successfully."
     * }
     * @response 404 {
     *   "message": "Category not found"
     * }
     */
    public function destroy($id)
    {
        $this->categoryRepository->delete($id);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category deleted successfully.');
    }
}