<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;

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

}
