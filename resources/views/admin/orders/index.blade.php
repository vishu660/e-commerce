@extends('admin.layouts.layout')

@section('title', 'Orders')
@section('page-title', 'Orders')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">All Orders</h4>
        <button class="btn btn-outline-primary">
            <i class="fas fa-download me-1"></i> Export Orders
        </button>
    </div>

    <!-- Order Stats -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted">Total Orders</h6>
                    <h3>{{$totalorder}}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted">Pending Orders</h6>
                    <h3 class="text-warning">32</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted">Completed Orders</h6>
                    <h3 class="text-success">187</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted">Cancelled Orders</h6>
                    <h3 class="text-danger">26</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Orders Table -->
    <div class="card border-0 shadow-sm">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#Order ID</th>
                            <th>Customer</th>
                            <th>Products</th>
                            <th>Total</th>
                            <th>Payment</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($order as $orders)
                        <tr>
                            <td>#ORD-{{ 1000 + $orders->id }}</td>

                            <td>
                                <strong>{{ $orders->user->name ?? 'Guest' }}</strong><br>
                                <small class="text-muted">{{ $orders->user->email ?? '-' }}</small>
                            </td>

                            <td>{{ $orders->product ? '1 Item' : '0 Item' }}</td>

                            <td>₹{{ $orders->product->price ?? 0 }}</td>

                            <td>
                                @if($orders->payment_status == 'paid')
                                    <span class="badge bg-success">Paid</span>
                                @else
                                    <span class="badge bg-danger">Pending</span>
                                @endif
                            </td>
                            <td>
                                <span class="badge bg-warning text-dark">
                                    {{ ucfirst($orders->status) }}
                                </span>
                            </td>
                            <td>{{ $orders->created_at->format('d M Y') }}</td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <a href="#" class="btn btn-sm btn-outline-success">
                                    <i class="fas fa-check"></i>
                                </a>

                                <a href="#" class="btn btn-sm btn-outline-danger">
                                    <i class="fas fa-times"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>

@endsection
