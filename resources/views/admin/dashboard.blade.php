@extends('admin.layouts.layout')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')

<div class="container-fluid">

    <!-- Stats Cards -->
    <div class="row mb-4">

        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted">Total Orders</h6>
                        <h3 class="mb-0">{{ $totalorder }}</h3>
                    </div>
                    <div class="fs-2 text-primary">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted">Total Revenue</h6>
                        <h3 class="mb-0 text-success">₹4,85,000</h3>
                    </div>
                    <div class="fs-2 text-success">
                        <i class="fas fa-rupee-sign"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted">Customers</h6>
                        <h3 class="mb-0">620</h3>
                    </div>
                    <div class="fs-2 text-warning">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted">Products</h6>
                        <h3 class="mb-0">128</h3>
                    </div>
                    <div class="fs-2 text-danger">
                        <i class="fas fa-box"></i>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Recent Orders + Top Products -->
    <div class="row">

        <!-- Recent Orders -->
        <div class="col-md-8">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-white fw-semibold">
                    Recent Orders
                </div>
                <div class="card-body p-0">

                    <table class="table mb-0 align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>#Order</th>
                                <th>Customer</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($order as $orders)
                            <tr>
                                <td>#ORD-{{ 1000 + $orders->id }}</td>

                                <td>
                                    {{ $orders->user->name ?? 'Guest' }}
                                </td>

                                <td>
                                    ₹{{ $orders->product->price ?? 0 }}
                                </td>

                                <td>
                                    @if($orders->status == 'delivered')
                                        <span class="badge bg-success">Delivered</span>
                                    @else
                                        <span class="badge bg-warning text-dark">
                                            {{ ucfirst($orders->status) }}
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    {{ $orders->created_at->format('d M Y') }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>

                </div>
            </div>
        </div>

        <!-- Top Products -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white fw-semibold">
                    Top Selling Products
                </div>
                <div class="card-body">

                    <div class="d-flex align-items-center mb-3">
                        <img src="https://via.placeholder.com/50" class="rounded me-3">
                        <div>
                            <strong>iPhone 14 Pro</strong><br>
                            <small class="text-muted">120 sales</small>
                        </div>
                    </div>

                    <div class="d-flex align-items-center mb-3">
                        <img src="https://via.placeholder.com/50" class="rounded me-3">
                        <div>
                            <strong>Samsung S23</strong><br>
                            <small class="text-muted">95 sales</small>
                        </div>
                    </div>

                    <div class="d-flex align-items-center">
                        <img src="https://via.placeholder.com/50" class="rounded me-3">
                        <div>
                            <strong>MacBook Air M2</strong><br>
                            <small class="text-muted">64 sales</small>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

</div>

@endsection
