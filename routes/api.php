<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\User\ProductController;

Route::get('products/search', [ProductController::class, 'search']);
