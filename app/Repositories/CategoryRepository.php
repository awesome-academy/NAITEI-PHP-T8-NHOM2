<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    protected $model;

    public function __construct(Category $category)
    {
        $this->model = $category;
    }

    /**
     * Get all categories with pagination
     */
    public function getAll($perPage = 10)
    {
        return $this->model->latest()->paginate($perPage);
    }

    /**
     * Get trashed categories with pagination
     */
    public function getTrashed($perPage = 10)
    {
        return $this->model->onlyTrashed()->latest()->paginate($perPage);
    }

    /**
     * Get category by ID
     */
    public function findById($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Create a new category
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * Update an existing category
     */
    public function update($id, array $data)
    {
        $category = $this->findById($id);
        $category->update($data);
        return $category;
    }

    /**
     * Delete a category
     */
    public function delete($id)
    {
        $category = $this->findById($id);
        return $category->delete();
    }

    /**
     * Restore a trashed category
     */
    public function restore($id)
    {
        $category = $this->model->withTrashed()->findOrFail($id);
        $category->restore();
        return $category;
    }

    /**
     * Get category by slug
     */
    public function findBySlug($slug)
    {
        return $this->model->where('slug', $slug)->firstOrFail();
    }
}