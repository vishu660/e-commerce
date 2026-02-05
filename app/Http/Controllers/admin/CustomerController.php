<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function customers()
    {
        // Get customer statistics
        $totalCustomers = User::where('role', 'ROLE_CUSTOMER')->count();
        $activeCustomers = User::where('role', 'ROLE_CUSTOMER')->where('status', 1)->count();
        $inactiveCustomers = User::where('role', 'ROLE_CUSTOMER')->where('status', 0)->count();
        $newThisMonth = User::where('role', 'ROLE_CUSTOMER')
            ->whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))
            ->count();

        // Get customers with their order data
        $customers = User::leftJoin('orders', 'users.id', '=', 'orders.user_id')
            ->where('users.role', 'ROLE_CUSTOMER')
            ->select(
                'users.id',
                'users.name',
                'users.email',
                'users.phone',
                'users.status',
                'users.created_at',
                DB::raw('COUNT(orders.id) as total_orders'),
                DB::raw('COALESCE(SUM(orders.total_amount), 0) as total_spent')
            )
            ->groupBy(
                'users.id',
                'users.name',
                'users.email',
                'users.phone',
                'users.status',
                'users.created_at'
            )
            ->orderBy('users.created_at', 'DESC')
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