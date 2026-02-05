<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function customers()
    {
        // Total customers
        $totalCustomers = User::where('role', 'ROLE_CUSTOMER')->count();

        // Since status column users table me nahi hai
        $activeCustomers = $totalCustomers;
        $inactiveCustomers = 0;

        // New customers this month
        $newThisMonth = User::where('role', 'ROLE_CUSTOMER')
            ->whereYear('created_at', now()->year)
            ->whereMonth('created_at', now()->month)
            ->count();

        // Customers with orders & total spent (from products table)
        $customers = User::leftJoin('orders', 'users.id', '=', 'orders.user_id')
            ->leftJoin('products', 'orders.product_id', '=', 'products.id')
            ->where('users.role', 'ROLE_CUSTOMER')
            ->select(
                'users.id',
                'users.name',
                'users.email',
                'users.mobile',
                'users.created_at',
                DB::raw('COUNT(DISTINCT orders.id) as total_orders'),
                DB::raw('COALESCE(SUM(products.price), 0) as total_spent')
            )
            ->groupBy(
                'users.id',
                'users.name',
                'users.email',
                'users.mobile',
                'users.created_at'
            )
            ->orderByDesc('users.created_at')
            ->get();

        return view('admin.customers.index', compact(
            'customers',
            'totalCustomers',
            'activeCustomers',
            'inactiveCustomers',
            'newThisMonth'
        ));
    }
}
