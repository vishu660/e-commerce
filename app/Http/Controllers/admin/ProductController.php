<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class ProductController extends Controller
{
    //
    public function index(){
        $products = Product::all();
        $totalproducts = Product::count();
        return view('admin.products.index',compact('products','totalproducts'));
    }

            public function create()
            {
                $categories = Category::orderBy('name')->get();
                return view('admin.products.create', compact('categories'));
            }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required|string',
            'discount' => 'nullable|numeric',
            'description' => 'nullable|string',
            'gallery' => 'nullable|image|max:2000',
        ]);

            $data['discount'] = $data['discount'] ?? 0;


        if ($request->hasFile('gallery')) {
            $data['gallery'] = $request->file('gallery')
                                    ->store('product_img', 'public');
        }

        Product::create($data);

        return redirect()->route('product.index')->with('success', 'Product created successfully');
    }


            public function edit(Product $product)
            {
                $categories = Category::orderBy('name')->get();
                return view('admin.products.edit', compact('product', 'categories'));
            }


   public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name'        => 'required|string',
            'price'       => 'required|numeric',
            'category_id'    => 'required|string',
            'discount'    => 'nullable|numeric',
            'description' => 'nullable|string',
            'gallery'     => 'nullable|image|max:2000',
        ]);

        $data['discount'] = $data['discount'] ?? 0;

        if ($request->hasFile('gallery')) {
            if ($product->gallery && \Storage::disk('public')->exists($product->gallery)) {
                \Storage::disk('public')->delete($product->gallery);
            }

            $data['gallery'] = $request->file('gallery')->store('product_img', 'public');
        }

        $product->update($data);

        return redirect()->route('product.index')->with('success', 'Product updated successfully');
    }


    public function destroy(Product $product)
    {
        if ($product->gallery && Storage::disk('public')->exists($product->gallery)) {
            Storage::disk('public')->delete($product->gallery);
        }

        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product deleted successfully');
    }


}
