@extends('admin.layouts.layout')

@section('title', 'Analytics')
@section('page-title', 'Analytics & Reports')

@section('content')

<div class="container-fluid">

    <!-- Stats Cards -->
    <div class="row mb-4">

        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6 class="text-muted">Total Revenue</h6>
                    <h3 class="text-success">₹2,45,000</h3>
                    <small class="text-muted">Last 30 days</small>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6 class="text-muted">Total Orders</h6>
                    <h3>1,248</h3>
                    <small class="text-muted">All time</small>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6 class="text-muted">Customers</h6>
                    <h3>860</h3>
                    <small class="text-muted">Active users</small>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6 class="text-muted">Conversion Rate</h6>
                    <h3 class="text-primary">3.6%</h3>
                    <small class="text-muted">This month</small>
                </div>
            </div>
        </div>

    </div>

    <!-- Charts Row -->
    <div class="row mb-4">

        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white">
                    <h6 class="mb-0">Sales Overview</h6>
                </div>
                <div class="card-body text-center">
                    <img src="https://dummyimage.com/700x250/edf2f7/000&text=Sales+Chart"
                         class="img-fluid rounded"
                         alt="Sales Chart">
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white">
                    <h6 class="mb-0">Top Categories</h6>
                </div>
                <div class="card-body">

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between">
                            Mobile <span class="badge bg-primary">45%</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            Laptop <span class="badge bg-success">30%</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            Accessories <span class="badge bg-warning">15%</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            Others <span class="badge bg-secondary">10%</span>
                        </li>
                    </ul>

                </div>
            </div>
        </div>

    </div>

    <!-- Recent Orders -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white">
            <h6 class="mb-0">Recent Orders</h6>
        </div>

        <div class="card-body table-responsive">
            <table class="table align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>1</td>
                        <td>#ORD1023</td>
                        <td>Rahul Sharma</td>
                        <td>₹5,499</td>
                        <td><span class="badge bg-success">Completed</span></td>
                        <td>12 Feb 2026</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>#ORD1024</td>
                        <td>Anita Verma</td>
                        <td>₹12,999</td>
                        <td><span class="badge bg-warning">Pending</span></td>
                        <td>13 Feb 2026</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>#ORD1025</td>
                        <td>Amit Singh</td>
                        <td>₹2,199</td>
                        <td><span class="badge bg-danger">Cancelled</span></td>
                        <td>14 Feb 2026</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection
