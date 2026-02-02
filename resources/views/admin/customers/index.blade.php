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
                    <h3>1,284</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted">Active Customers</h6>
                    <h3 class="text-success">1,050</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted">Inactive Customers</h6>
                    <h3 class="text-danger">234</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted">New This Month</h6>
                    <h3 class="text-primary">86</h3>
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
                        <tr>
                            <td>1</td>
                            <td>
                                <img src="https://i.pravatar.cc/40?img=1" class="rounded-circle me-2">
                                <strong>Rahul Sharma</strong>
                            </td>
                            <td>rahul@gmail.com</td>
                            <td>+91 98765 43210</td>
                            <td>12</td>
                            <td>₹2,45,000</td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td>12 Jan 2026</td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-warning">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger">
                                    <i class="fas fa-ban"></i>
                                </button>
                            </td>
                        </tr>

                        <tr>
                            <td>2</td>
                            <td>
                                <img src="https://i.pravatar.cc/40?img=2" class="rounded-circle me-2">
                                <strong>Neha Verma</strong>
                            </td>
                            <td>neha@gmail.com</td>
                            <td>+91 91234 56789</td>
                            <td>5</td>
                            <td>₹89,999</td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td>08 Jan 2026</td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-warning">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </td>
                        </tr>

                        <tr>
                            <td>3</td>
                            <td>
                                <img src="https://i.pravatar.cc/40?img=3" class="rounded-circle me-2">
                                <strong>Amit Kumar</strong>
                            </td>
                            <td>amit@gmail.com</td>
                            <td>+91 99887 66554</td>
                            <td>1</td>
                            <td>₹5,499</td>
                            <td><span class="badge bg-danger">Inactive</span></td>
                            <td>30 Dec 2025</td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>

@endsection
