<?php

namespace App\Repositories;

use App\Models\Category;

interface CategoryRepositoryInterface
{
    /**
     * Get all categories with pagination
     */
    public function getAll($perPage = 10);

    /**
     * Get trashed categories with pagination
     */
    public function getTrashed($perPage = 10);

    /**
     * Get category by ID
     */
    public function findById($id);

    /**
     * Create a new category
     */
    public function create(array $data);

    /**
     * Update an existing category
     */
    public function update($id, array $data);

    /**
     * Delete a category
     */
    public function delete($id);

    /**
     * Restore a trashed category
     */
    public function restore($id);

    /**
     * Get category by slug
     */
    public function findBySlug($slug);
}