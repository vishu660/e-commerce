<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class ProductController extends Controller
{
    //
    public function index(){
        $products = Product::all();
        return view('admin.products.index',compact('products'));
    }

    public function create(){
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'category' => 'required|string',
            'discount' => 'nullable|numeric',
            'descripation' => 'nullable|string',
            'gallery' => 'nullable|image|max:2000',
        ]);

        if ($request->hasFile('gallery')) {
            $data['gallery'] = $request->file('gallery')
                                    ->store('product_img', 'public');
        }

        Product::create($data);

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully');
    }


    public function edit(Product $product)
{
    return view('admin.products.edit', compact('product'));
}

}
