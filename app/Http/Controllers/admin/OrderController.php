<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use Stripe\Stripe;
use Stripe\Charge;

class OrderController extends Controller
{
    //
   public function index()
        {
            $order = Order::join('products', 'orders.product_id', '=', 'products.id')
                ->join('users', 'orders.user_id', '=', 'users.id')
                ->select(
                    'orders.user_id',
                    'users.name as user_name',
                    'users.email',
                    'orders.created_at',
                    'orders.payment_status',
                    'orders.status'
                )
                ->selectRaw('COUNT(orders.id) as items_count')
                ->selectRaw('SUM(products.price) as total_price')
                ->groupBy(
                    'orders.user_id',
                    'users.name',
                    'users.email',
                    'orders.created_at',
                    'orders.payment_status',
                    'orders.status'
                )
                ->latest()
                ->get();

            $totalorder = Order::count();

            return view('admin.orders.index', compact('order', 'totalorder'));
        }

 public function dashboard()
            {
                $order = Order::join('products', 'orders.product_id', '=', 'products.id')
                    ->select(
                        'orders.user_id',
                        'orders.created_at',
                        'orders.payment_status',
                        'orders.status'
                    )
                    ->selectRaw('COUNT(*) as items_count')
                    ->selectRaw('SUM(products.price) as total_price')
                    ->groupBy(
                        'orders.user_id',
                        'orders.created_at',
                        'orders.payment_status',
                        'orders.status'
                    )
                    ->latest()
                    ->limit(5)
                    ->get();

                $totalorder = Order::count();

                return view('admin.dashboard', compact('order', 'totalorder'));
            }


    public function placeOrder(Request $request)
            {
                $total = auth()->user()->cartItems
                    ->sum(fn($item) => $item->product->price);

                $paymentId = null;
                $paymentStatus = 'pending';

                if ($request->payment_method === 'card') {

                    Stripe::setApiKey(config('services.stripe.secret'));

                    $charge = Charge::create([
                        "amount" => $total * 100,
                        "currency" => "inr",
                        "source" => $request->stripeToken,
                        "description" => "Order Payment"
                    ]);

                    $paymentId = $charge->id;
                    $paymentStatus = 'paid';
                }

                Order::create([
                    'user_id' => auth()->id(),
                    'name' => $request->name,
                    'address' => $request->address,
                    'total_amount' => $total,
                    'payment_method' => $request->payment_method,
                    'payment_id' => $paymentId,
                    'payment_status' => $paymentStatus,
                ]);

                auth()->user()->cartItems()->delete();

                return redirect()->route('orders.success');
                {
                $total = auth()->user()->cartItems
                    ->sum(fn($item) => $item->product->price);

                $paymentId = null;
                $paymentStatus = 'pending';

                if ($request->payment_method === 'card') {

                    Stripe::setApiKey(config('services.stripe.secret'));

                    $charge = Charge::create([
                        "amount" => $total * 100, // paisa
                        "currency" => "inr",
                        "source" => $request->stripeToken,
                        "description" => "Order Payment"
                    ]);

                    $paymentId = $charge->id;
                    $paymentStatus = 'paid';
                }

                // ORDER SAVE
                Order::create([
                    'user_id' => auth()->id(),
                    'name' => $request->name,
                    'address' => $request->address,
                    'total_amount' => $total,
                    'payment_method' => $request->payment_method,
                    'payment_id' => $paymentId,
                    'payment_status' => $paymentStatus,
                ]);

                // Cart clear
                auth()->user()->cartItems()->delete();

                return redirect()->route('orders.success');
            }
        }

}
