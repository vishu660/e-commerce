<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // public function index()
    // {
    //     $categories = Category::withCount('products')
    //         ->with('parent')
    //         ->latest()
    //         ->paginate(10);
            
    //     $parentCategories = Category::whereNull('parent_id')->get();
        
    //     $stats = [
    //         'totalCategories' => Category::count(),
    //         'activeCategories' => Category::where('status', 'active')->count(),
    //         'totalProducts' => \App\Models\Product::count(), // Adjust based on your model
    //         'subCategories' => Category::whereNotNull('parent_id')->count(),
    //     ];
        
    //     return view('admin.categories.index', compact('categories', 'parentCategories', 'stats'));
    // }
    
    // Other methods (store, edit, update, destroy)...
}