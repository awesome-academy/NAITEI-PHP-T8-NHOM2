<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;

// Admin Controllers
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\ProvinceController;

// User Controllers
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\User\FeedbackController;
use App\Http\Controllers\User\UserAddressController;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LanguageController;

// Language switching routes
Route::get('/language/{locale}', [LanguageController::class, 'switch'])->name('language.switch');

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

// Lấy dashboard làm pivot điều hướng flow user || admin
Route::get('/dashboard', function () {
    if (Auth::user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    } else {
        return redirect()->route('user.products.index');
    }
})
->middleware(['auth', 'verified'])
->name('dashboard');

// Admin Routes
Route::middleware(['auth', AdminMiddleware::class])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', UserController::class);
    // categories
    Route::get('categories/trashed', [CategoryController::class, 'trashed'])->name('categories.trashed');
    Route::post('categories/{category}/restore', [CategoryController::class, 'restore'])->name('categories.restore')->withTrashed();
    Route::resource('categories', CategoryController::class);
    // products
    Route::get('products/trashed', [AdminProductController::class, 'trashed'])
        ->name('products.trashed');
    Route::post('products/{product}/restore', [AdminProductController::class, 'restore'])
        ->name('products.restore')->withTrashed();
    Route::resource('products', AdminProductController::class);
    // provinces
    Route::resource('provinces', ProvinceController::class);
    // orders
    Route::get('orders', [AdminOrderController::class, 'index'])->name('orders.index');
    Route::get('orders/{order}', [AdminOrderController::class, 'show'])->name('orders.show');
    Route::patch('orders/{order}/status', [AdminOrderController::class, 'updateStatus'])->name('orders.updateStatus');
    // notifications
    Route::post('notifications/mark-as-read', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');
    Route::delete('notifications/clear-all', [NotificationController::class, 'clearAll'])->name('notifications.clearAll');
});

// User Routes
Route::middleware(['auth'])->prefix('user')->name('user.')->group(function () {
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/{product:slug}', [ProductController::class, 'show'])->name('products.show');
    // addresses
    Route::resource('addresses', UserAddressController::class);
    // reviews
    Route::post('/products/{product:slug}/feedbacks',                             [FeedbackController::class,'store'])->name('products.feedbacks.store');
    Route::match(['put','patch'],'/products/{product:slug}/feedbacks/{feedback}', [FeedbackController::class,'update'])->name('products.feedbacks.update');
    Route::delete('/products/{product:slug}/feedbacks/{feedback}',                [FeedbackController::class,'destroy'])->name('products.feedbacks.destroy');
});

// Cart and Checkout Routes
Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::get('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('/checkout', [CheckoutController::class, 'checkoutForm'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'placeOrder'])->name('checkout.place');
    Route::get('/orders/{id}', [CheckoutController::class, 'showOrder'])->name('checkout.orders.show');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
});

require __DIR__.'/auth.php';
