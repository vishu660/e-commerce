<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Panel')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap + Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
            font-family: 'Segoe UI', sans-serif;
        }

        /* Sidebar */
        .sidebar {
            width: 240px;
            background: #1e1e2d;
            min-height: 100vh;
            position: fixed;
        }

        .sidebar h4 {
            color: #fff;
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid #2d2d44;
        }

        .sidebar a {
            color: #cfcfd4;
            padding: 12px 20px;
            display: block;
            text-decoration: none;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #4361ee;
            color: #fff;
        }

        /* Main area */
        .main {
            margin-left: 240px;
            min-height: 100vh;
        }

        /* Header */
        .topbar {
            background: #fff;
            padding: 15px 25px;
            border-bottom: 1px solid #ddd;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .content {
            padding: 25px;
        }
    </style>
</head>
<body>

<!-- Change Password Modal -->
<!-- Change Password Modal (STATIC) -->
<div class="modal fade" id="changePasswordModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <form action="#" method="POST" onsubmit="return false;">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-lock me-2"></i> Change Password
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label">Current Password</label>
                        <input type="password" class="form-control" placeholder="Enter current password">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">New Password</label>
                        <input type="password" class="form-control" placeholder="Enter new password">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" placeholder="Confirm new password">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                        <i class="fas fa-check me-1"></i> Update Password
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>



<!-- Sidebar -->
<div class="sidebar">
    <h4>Admin Panel</h4>

    <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <i class="fas fa-home me-2"></i> Dashboard
    </a>

    <a href="{{ route('orders.index') }}">
        <i class="fas fa-shopping-cart me-2"></i> Orders
    </a>

    <a href="{{ route('product.index') }}">
        <i class="fas fa-box me-2"></i> Products
    </a>
    <a href="{{ route('admin.categories.index') }}">
    <i class="fas fa-folder-open me-2"></i> Categories
    </a>
    <a href="{{ route('admin.customers.index') }}">
        <i class="fas fa-users me-2"></i> Customers
    </a>

    <a href="{{ route('analytics.index') }}">
        <i class="fas fa-chart-line me-2"></i> Analytics
    </a>

    <a href="{{ route('settings') }}">
        <i class="fas fa-cog me-2"></i> Settings
    </a>
</div>

<!-- Main -->
<div class="main">

    <!-- Header -->
    <div class="topbar">
        <h5 class="mb-0">@yield('page-title', 'Dashboard')</h5>

        <!-- Admin Dropdown -->
        <div class="dropdown">
            <a class="btn btn-light dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                <i class="fas fa-user-circle me-1"></i>
                {{ Auth::user()->name ?? 'Admin User' }}
            </a>

            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <a class="dropdown-item" href="{{ route('admin.profile') }}">
                        <i class="fas fa-user me-2"></i> Profile
                    </a>
                </li>
                <li>
                   <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
                        <i class="fas fa-lock me-2"></i> Change Password
                    </a>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item text-danger" href="{{route('logout')}}">
                        <i class="fas fa-sign-out-alt me-2"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Page Content -->
    <div class="content">
        @yield('content')
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
