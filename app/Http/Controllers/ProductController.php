<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart; 
use Illuminate\Support\Facades\DB;
use App\Models\Order;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    $products = Product::latest()->paginate(10);
    return view('home.product1', compact('products'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
public function show($id)
{
    $product = Product::findOrFail($id);  

    $relatedProducts = Product::where('category_id', $product->category)
                              ->where('id', '!=', $id)
                              ->take(4)
                              ->get();

    return view('home.detail', [
        'product' => $product,
        'products' => $relatedProducts,
    ]);
}
public function product1()
{
    $products = Product::where('category', 'Skin Care')
                       ->orderBy('created_at', 'desc')
                       ->get();
    return view('home.product1', compact('products'));
}

public function product2()
{
    $products = Product::where('category', 'Toys')
                       ->orderBy('created_at', 'desc')
                       ->get();
    return view('home.product1', compact('products'));
}
public function product3()
{
    $products = Product::where('category', 'Kitchen')
                       ->orderBy('created_at', 'desc')
                       ->get();
    return view('home.product1', compact('products'));
}
public function product4()
{
    $products = Product::where('category', 'home')
                       ->orderBy('created_at', 'desc')
                       ->get();
    return view('home.product1', compact('products'));
}
public function product5()
{
    $products = Product::where('category', 'women')
                       ->orderBy('created_at', 'desc')
                       ->get();
    return view('home.product1', compact('products'));
}
public function product6()
{
    $products = Product::where('category', 'improvement')
                       ->orderBy('created_at', 'desc')
                       ->get();
    return view('home.product1', compact('products'));
}
public function product7()
{
    $products = Product::where('category', 'Fun toys ')
                       ->orderBy('created_at', 'desc')
                       ->get();
    return view('home.product1', compact('products'));
}
public function product8()
{
    $products = Product::where('category', 'Brands ')
                       ->orderBy('created_at', 'desc')
                       ->get();
    return view('home.product1', compact('products'));
}
public function product9()
{
    $products = Product::where('category', 'cook ')
                       ->orderBy('created_at', 'desc')
                       ->get();
    return view('home.product1', compact('products'));
}
public function product10()
{
    $products = Product::where('category', 'fitness journey')
                       ->orderBy('created_at', 'desc')
                       ->get();
    return view('home.product1', compact('products'));
}
public function product11()
{
    $products = Product::where('category', 'Furniture')
                       ->orderBy('created_at', 'desc')
                       ->get();
    return view('home.product1', compact('products'));
}
public function product12()
{
    $products = Product::where('category', 'mobile')
                       ->orderBy('created_at', 'desc')
                       ->get();
    return view('home.product1', compact('products'));
}
public function product13()
{
    $products = Product::where('category', 'Electronics')
                       ->orderBy('created_at', 'desc')
                       ->get();
    return view('home.product1', compact('products'));
}


// search
public function search(Request $request){
    $search = $request->input('query'); 
    $products = Product::where('name', 'LIKE', "%{$search}%")
                        ->orWhere('description', 'LIKE', "%{$search}%")
                        ->get();

    return view('home.search', compact('products'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
   public function addToCart(Request $request) {
    if (Auth::check()) {
        $cart = new Cart();
        $cart->user_id = Auth::id();
        $cart->product_id = $request->product_id;
        $cart->save();
        return redirect('/')->with('success', 'Product added to cart!');
    } else {
        return redirect()->route('login')->with('error', 'Please login to add items to the cart.');
    }
}
public static function cartItemCount() {
    if (Auth::check()) {
        $userId = Auth::id();
        return Cart::where('user_id', $userId)->count();
    }
    return 0;
}
public function CartList(){
    if (Auth::check()) {
        $userId = Auth::id();
        $cartItems = Cart::with('product')->where('user_id', $userId)->get();
        return view('home.cart', compact('cartItems'));
    } else {
        return redirect()->route('login')->with('error', 'Please login to view your cart.');
    }
}
public function RemoveCart($id){
    Cart::destroy($id);
    return redirect('cart')->with('success', 'Product removed from cart successfully!');

}
public function OrderNow()
{
    if (Auth::check()) {
        $userId = Auth::id();
        $cartItems = Cart::with('product')->where('user_id', $userId)->get();

        if ($cartItems->isEmpty()) {
            return redirect('cart')->with('error', 'Your cart is empty!');
        }

      
        return view('home.checkout', ['cartItems' => $cartItems]);
    } else {
        return redirect()->route('login')->with('error', 'Please login to place an order.');
    }
}
public function placeOrder(Request $request)
{
    $request->validate([
        'name' => 'required|string',
        'address' => 'required|string',
        'payment_method' => 'required|string',
    ]);

    $userId = Auth::id();

    // Fetch cart items
    $cartItems = Cart::where('user_id', $userId)->get();
     
    foreach($cartItems as $cart){
        $order = new Order();
        $order->product_id = $cart->product_id;
        $order->user_id = $cart->user_id;
        $order->address = $request->address;
        $order->status = 'pending';
        $order->payment_method = $request->payment_method;
        $order->payment_status = 'pending'; 
        $order->save();
    }

    // Clear the cart
    Cart::where('user_id', $userId)->delete();

    return redirect('/')->with('success', 'Order placed successfully!');
}

public function profileWithOrders()
{
    $user = Auth::user(); 
    $orders = Order::with('product')->where('user_id', $user->id)->get();

    return view('profile.profile', compact('user', 'orders')); 
}





}
