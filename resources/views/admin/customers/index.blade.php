@extends('admin.layouts.layout')

@section('title', 'Customers')
@section('page-title', 'Customers')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">All Customers</h4>
        <button class="btn btn-primary">
            <i class="fas fa-user-plus me-1"></i> Add Customer
        </button>
    </div>

    <!-- Customer Stats -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted">Total Customers</h6>
                    <h3>{{ $totalCustomers ?? 0 }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted">Active Customers</h6>
                    <h3 class="text-success">{{ $activeCustomers ?? 0 }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted">Inactive Customers</h6>
                    <h3 class="text-danger">{{ $inactiveCustomers ?? 0 }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted">New This Month</h6>
                    <h3 class="text-primary">{{ $newThisMonth ?? 0 }}</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Customers Table -->
    <div class="card border-0 shadow-sm">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Customer</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Total Orders</th>
                            <th>Total Spent</th>
                            <th>Status</th>
                            <th>Joined</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @isset($customers)
                            @if($customers->count())
                                @foreach($customers as $index => $customer)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $customer->name }}</td>
                                        <td>{{ $customer->email }}</td>
                                        <td>{{ $customer->phone ?? '-' }}</td>
                                        <td>{{ $customer->total_orders }}</td>
                                        <td>₹{{ number_format($customer->total_spent, 2) }}</td>
                                        <td>
                                            <span class="badge {{ $customer->status ? 'bg-success' : 'bg-danger' }}">
                                                {{ $customer->status ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($customer->created_at)->format('d M Y') }}</td>
                                        <td class="text-end">
                                            <div class="btn-group btn-group-sm" role="group">
                                                <a href="#" class="btn btn-outline-primary" title="View">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="#" class="btn btn-outline-success" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <button class="btn btn-outline-danger" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="9" class="text-center">No customers found</td>
                                </tr>
                            @endif
                        @else
                            <tr>
                                <td colspan="9" class="text-center text-danger">
                                    Customers data not passed from controller
                                </td>
                            </tr>
                        @endisset
                    </tbody>

                </table>
            </div>

        </div>
    </div>

</div>

@endsection