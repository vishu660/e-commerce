<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\admin\ProductController as AdminProductController;
use App\Http\Controllers\admin\OrderController as AdminOrderController;
use App\Http\Controllers\admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\SettingController;

Route::get('/', fn () => view('home.home'))->name('home');
Route::get('/about', fn () => view('home.about'))->name('about');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('products.detail');
Route::get('/search', [ProductController::class, 'search'])->name('search');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);


Route::middleware(['auth', 'role:ROLE_CUSTOMER'])->group(function () {

    Route::post('/add-to-cart', [ProductController::class, 'addToCart'])->name('add-to-cart');
    Route::get('/cart', [ProductController::class, 'CartList'])->name('cart');
    Route::get('/remove/{id}', [ProductController::class, 'RemoveCart'])->name('remove');

    Route::get('/ordernow', [ProductController::class, 'OrderNow'])->name('order');
    Route::post('/place-order', [ProductController::class, 'placeOrder'])->name('placeorder');

    Route::get('/myorders', [ProductController::class, 'myOrders'])->name('my.orders');

    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile', [ProductController::class, 'profileWithOrders'])->name('profile');

});


Route::middleware(['auth', 'role:ROLE_ADMIN'])->prefix('admin')->group(function () {

    // Route::get('/', fn () => view('admin.dashboard'))->name('dashboard');

    // Route::get('/orders', fn () => view('admin.orders.index'))->name('orders.index');
    Route::get('/customers', fn () => view('admin.customers.index'))->name('admin.customers.index');

    Route::get('/analytics', fn () => view('admin.analytics.index'))->name('analytics.index');
    Route::get('/settings', fn () => view('admin.settings.index'))->name('settings');

    Route::get('/profile', fn () => view('admin.profile.index'))->name('admin.profile');

    // ADMIN PRODUCTS
    Route::get('/products', [AdminProductController::class, 'index'])->name('product.index');
    Route::get('/products/create', [AdminProductController::class, 'create'])->name('product.create');
    Route::post('/products', [AdminProductController::class, 'store'])->name('product.store');
    Route::get('/products/{product}/edit', [AdminProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [AdminProductController::class, 'update'])->name('product.update');
    Route::delete('/products/{product}', [AdminProductController::class, 'destroy'])->name('products.delete');


    // Order Route
    Route::get('/orders', [AdminOrderController::class, 'index'])->name('orders.index');
    Route::get('/', [AdminOrderController::class, 'dashboard'])->name('dashboard');


    // Category Route
    Route::get('/categories', [AdminCategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('/categories/create', [AdminCategoryController::class, 'create'])->name('admin.categories.create');
    Route::POST('/categories', [AdminCategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/categories/{id}/edit', [AdminCategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::PUT('/categories{id}', [AdminCategoryController::class, 'update'])->name('admin.categories.update');
    Route::DELETE('/categories{id}', [AdminCategoryController::class, 'destroy'])->name('admin.categories.destroy');


    Route::get('/settings', [SettingController::class, 'index'])->name('settings');
    Route::post('/settings', [SettingController::class, 'store'])->name('admin.settings.store');
    
    
});



Route::middleware('auth')->get('logout', [LoginController::class, 'logout'])->name('logout');