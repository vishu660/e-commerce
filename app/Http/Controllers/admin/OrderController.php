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
        $order = Order::with(['product', 'user'])
            ->select('user_id', 'created_at', 'payment_status', 'status')
            ->selectRaw('COUNT(*) as items_count')
            ->groupBy('user_id', 'created_at', 'payment_status', 'status')
            ->latest()
            ->get();
            $totalorder = Order::count();

        return view('admin.orders.index', compact('order', 'totalorder'));
    }

   public function dashboard()
    {
        $order = Order::with(['product', 'user'])
            ->select('user_id', 'created_at', 'payment_status', 'status','price')
            ->selectRaw('COUNT(*) as items_count')
            ->groupBy('user_id', 'created_at', 'payment_status', 'status','price')
            ->latest()
            ->limit(5) 
            ->get();

        $totalorder = Order::count();

        return view('admin.dashboard', compact('order', 'totalorder'));
    }



}
