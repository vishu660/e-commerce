<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;

// profile routes
Route::get('/profile', [ProfileController::class, 'show'])->name('profile')->middleware('auth');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

// product routes
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('products.detail');
Route::get('/product1', [ProductController::class, 'product1'])->name('product1');
Route::get('/product2', [ProductController::class, 'product2'])->name('product2');
Route::get('/product3', [ProductController::class, 'product3'])->name('product3');
Route::get('/product4', [ProductController::class, 'product4'])->name('product4');
Route::get('/product5', [ProductController::class, 'product5'])->name('product5');
Route::get('/product6', [ProductController::class, 'product6'])->name('product6');
Route::get('/product7', [ProductController::class, 'product7'])->name('product7');
Route::get('/product8', [ProductController::class, 'product8'])->name('product8');
Route::get('/product9', [ProductController::class, 'product9'])->name('product9');
Route::get('/product10', [ProductController::class, 'product10'])->name('product10');
Route::get('/product11', [ProductController::class, 'product11'])->name('product11');
Route::get('/product12', [ProductController::class, 'product12'])->name('product12');
Route::get('/product13', [ProductController::class, 'product13'])->name('product13');
Route::get('/search', [ProductController::class, 'search'])->name('search');
Route::post('/add-to-cart', [ProductController::class, 'addToCart'])->name('add-to-cart');
Route::get('/cart', [ProductController::class, 'CartList'])->name('cart');
Route::get('/remove/{id}', [ProductController::class, 'RemoveCart'])->name('remove');
// Show Checkout Form
Route::get('/ordernow', [ProductController::class, 'OrderNow'])->name('order');
Route::get('/myorders', [ProductController::class, 'myOrders'])->name('my.orders');



// Place Order (POST route)
Route::post('/place-order', [ProductController::class, 'placeOrder'])->name('placeorder');
Route::get('/profile', [ProductController::class, 'profileWithOrders'])->name('profile');


Route::get('/layout', function () { return view('layout.layout');})->name('layout');  


Route::get('/', function () { return view('home.home');})->name('home');

Route::get('/about', function () { return view('home.about');})->name('about');


Route::get('/product', function () { return view('home.product1');})->name('product');

// login routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');


// registration routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/admin', function () { return view('admin.dashboard');})->name('admin.dashboard');

Route::get('/layouts', function () { return view('layouts.layout');})->name('layouts');  

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('admin/orders', function () {
    return view('admin.orders.index');
})->name('orders.index');

Route::get('admin/products', function () {
    return view('admin.products.index');
})->name('product.index');


Route::get('/customers', function () {
    return view('customer.index');
})->name('customers.index');

Route::get('/analytics', function () {
    return view('analytic.index');
})->name('analytics');

Route::get('/settings', function () {
    return view('settings.index');
})->name('settings');