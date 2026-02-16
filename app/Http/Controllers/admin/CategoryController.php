<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|unique:categories,name',
    ]);

    Category::create([
        'name' => $request->name,
        'slug' => Str::slug($request->name),
    ]);

    return redirect()->route('admin.categories.index')
        ->with('success', 'Category created successfully');
}

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:categories,name,' . $category->id,
            'slug' => 'required|unique:categories,slug,' . $category->id
        ]);

        $category->update([
            'name' => $request->name,
            'slug' => $request->slug,  
        ]);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category updated successfully');
    }

    public function destroy($id)
    {
        Category::findOrFail($id)->delete();

        return redirect()->back()
            ->with('success', 'Category deleted');
    }
}