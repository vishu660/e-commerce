@extends('admin.layouts.layout')

@section('content')
<style>
    .stats-card {
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 20px;
        color: white;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }
    
    .stats-card:hover {
        transform: translateY(-5px);
    }
    
    .stats-card i {
        font-size: 40px;
        opacity: 0.9;
    }
    
    .stats-card .count {
        font-size: 32px;
        font-weight: 700;
        margin: 10px 0;
    }
    
    .stats-card .label {
        font-size: 14px;
        opacity: 0.9;
    }
    
    .total-orders {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    
    .pending-orders {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    }
    
    .processing-orders {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    }
    
    .revenue-card {
        background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
    }
    
    .status-badge {
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .badge-pending {
        background-color: #fff3cd;
        color: #856404;
        border: 1px solid #ffeaa7;
    }
    
    .badge-processing {
        background-color: #cce5ff;
        color: #004085;
        border: 1px solid #b8daff;
    }
    
    .badge-shipped {
        background-color: #d1ecf1;
        color: #0c5460;
        border: 1px solid #bee5eb;
    }
    
    .badge-delivered {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }
    
    .badge-cancelled {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }
    
    .badge-refunded {
        background-color: #e2e3e5;
        color: #383d41;
        border: 1px solid #d6d8db;
    }
    
    .order-table {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }
    
    .order-table thead {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }
    
    .order-table th {
        border: none;
        padding: 15px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-size: 13px;
    }
    
    .order-table tbody tr {
        transition: all 0.3s ease;
        border-bottom: 1px solid #f1f1f1;
    }
    
    .order-table tbody tr:hover {
        background-color: #f8f9fa;
        transform: scale(1.005);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }
    
    .order-table td {
        padding: 15px;
        vertical-align: middle;
        border: none;
    }
    
    .customer-info {
        display: flex;
        align-items: center;
        gap: 12px;
    }
    
    .customer-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        font-size: 16px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    
    .customer-details {
        line-height: 1.4;
    }
    
    .customer-name {
        font-weight: 600;
        color: #333;
    }
    
    .customer-email {
        font-size: 12px;
        color: #6c757d;
    }
    
    .order-id {
        font-weight: 700;
        color: #667eea;
        font-size: 15px;
    }
    
    .order-amount {
        font-weight: 700;
        color: #2e59d9;
        font-size: 16px;
    }
    
    .order-date {
        color: #6c757d;
        font-size: 13px;
    }
    
    .action-buttons {
        display: flex;
        gap: 5px;
    }
    
    .action-btn {
        width: 32px;
        height: 32px;
        border-radius: 8px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: none;
        transition: all 0.3s ease;
        text-decoration: none;
        cursor: pointer;
    }
    
    .action-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    
    .btn-view {
        background-color: #4361ee;
        color: white;
    }
    
    .btn-edit {
        background-color: #ffd166;
        color: #333;
    }
    
    .btn-delete {
        background-color: #ef476f;
        color: white;
    }
    
    .btn-print {
        background-color: #06d6a0;
        color: white;
    }
    
    .filters-card {
        background: white;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    
    .filter-group {
        margin-bottom: 15px;
    }
    
    .filter-label {
        font-weight: 600;
        margin-bottom: 8px;
        color: #495057;
        font-size: 14px;
    }
    
    .filter-select {
        width: 100%;
        padding: 10px;
        border: 1px solid #dee2e6;
        border-radius: 8px;
        background-color: white;
        color: #495057;
        font-size: 14px;
        transition: all 0.3s ease;
    }
    
    .filter-select:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }
    
    .search-box {
        position: relative;
    }
    
    .search-input {
        width: 100%;
        padding: 10px 15px 10px 40px;
        border: 1px solid #dee2e6;
        border-radius: 8px;
        font-size: 14px;
    }
    
    .search-icon {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #6c757d;
    }
    
    .apply-filters-btn {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: 600;
        width: 100%;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .apply-filters-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
    
    .pagination-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 20px;
        padding: 15px;
        background: white;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    
    .page-info {
        color: #6c757d;
        font-size: 14px;
    }
    
    .pagination {
        display: flex;
        gap: 5px;
        margin: 0;
        padding: 0;
        list-style: none;
    }
    
    .page-item {
        margin: 0;
    }
    
    .page-link {
        padding: 8px 12px;
        border: 1px solid #dee2e6;
        border-radius: 6px;
        color: #667eea;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
        display: block;
        background-color: white;
        cursor: pointer;
    }
    
    .page-link:hover {
        background-color: #667eea;
        color: white;
        border-color: #667eea;
    }
    
    .page-item.active .page-link {
        background-color: #667eea;
        color: white;
        border-color: #667eea;
    }
    
    .page-item.disabled .page-link {
        color: #6c757d;
        background-color: #f8f9fa;
        border-color: #dee2e6;
        cursor: not-allowed;
    }
    
    @media (max-width: 768px) {
        .stats-card .count {
            font-size: 24px;
        }
        
        .order-table {
            display: block;
            overflow-x: auto;
        }
        
        .action-buttons {
            flex-wrap: wrap;
        }
        
        .pagination-container {
            flex-direction: column;
            gap: 15px;
            align-items: center;
        }
    }
</style>

<div class="container-fluid">
    <!-- Stats Overview -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6">
            <div class="stats-card total-orders">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="count">1,248</div>
                        <div class="label">Total Orders</div>
                    </div>
                    <i class="fas fa-shopping-cart"></i>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-md-6">
            <div class="stats-card pending-orders">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="count">42</div>
                        <div class="label">Pending Orders</div>
                    </div>
                    <i class="fas fa-clock"></i>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-md-6">
            <div class="stats-card processing-orders">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="count">18</div>
                        <div class="label">Processing</div>
                    </div>
                    <i class="fas fa-cogs"></i>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-md-6">
            <div class="stats-card revenue-card">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="count">$5,248.50</div>
                        <div class="label">Revenue Today</div>
                    </div>
                    <i class="fas fa-dollar-sign"></i>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Filters Card -->
    <div class="filters-card">
        <div class="row">
            <div class="col-md-3">
                <div class="filter-group">
                    <label class="filter-label">Status</label>
                    <select name="status" class="filter-select">
                        <option value="">All Status</option>
                        <option value="pending">Pending</option>
                        <option value="processing">Processing</option>
                        <option value="shipped">Shipped</option>
                        <option value="delivered">Delivered</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="filter-group">
                    <label class="filter-label">Date Range</label>
                    <select name="date_range" class="filter-select">
                        <option value="">All Time</option>
                        <option value="today">Today</option>
                        <option value="yesterday">Yesterday</option>
                        <option value="week">This Week</option>
                        <option value="month">This Month</option>
                    </select>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="filter-group">
                    <label class="filter-label">Payment Method</label>
                    <select name="payment_method" class="filter-select">
                        <option value="">All Methods</option>
                        <option value="credit_card">Credit Card</option>
                        <option value="paypal">PayPal</option>
                        <option value="bank_transfer">Bank Transfer</option>
                        <option value="cod">Cash on Delivery</option>
                    </select>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="filter-group">
                    <label class="filter-label">Search</label>
                    <div class="search-box">
                        <i class="fas fa-search search-icon"></i>
                        <input type="text" 
                               name="search" 
                               class="search-input" 
                               placeholder="Order ID or Customer...">
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row mt-3">
            <div class="col-md-12">
                <button type="button" class="apply-filters-btn">
                    <i class="fas fa-filter"></i> Apply Filters
                </button>
            </div>
        </div>
    </div>
    
    <!-- Orders Table -->
    <div class="card order-table">
        <div class="card-header bg-white border-bottom-0">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Recent Orders</h5>
                <a href="#" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Create Order
                </a>
            </div>
        </div>
        
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th width="60">#</th>
                            <th>Customer</th>
                            <th>Order ID</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Payment</th>
                            <th>Status</th>
                            <th width="140">Actions</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <!-- Order 1 -->
                        <tr>
                            <td>1</td>
                            <td>
                                <div class="customer-info">
                                    <div class="customer-avatar">JS</div>
                                    <div class="customer-details">
                                        <div class="customer-name">John Smith</div>
                                        <div class="customer-email">john.smith@example.com</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="order-id">#ORD-7841</span>
                                <br>
                                <small>3 items</small>
                            </td>
                            <td>
                                <div class="order-date">
                                    Jun 15, 2023<br>
                                    <small>10:30 AM</small>
                                </div>
                            </td>
                            <td>
                                <span class="order-amount">$2,545.99</span>
                            </td>
                            <td>
                                <span class="badge bg-success">Paid</span>
                                <br>
                                <small>Credit Card</small>
                            </td>
                            <td>
                                <span class="status-badge badge-pending">Pending</span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="#" class="action-btn btn-view" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="#" class="action-btn btn-edit" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="#" class="action-btn btn-print" title="Print">
                                        <i class="fas fa-print"></i>
                                    </a>
                                    <button type="button" class="action-btn btn-delete" title="Delete" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <!-- Order 2 -->
                        <tr>
                            <td>2</td>
                            <td>
                                <div class="customer-info">
                                    <div class="customer-avatar">EJ</div>
                                    <div class="customer-details">
                                        <div class="customer-name">Emma Johnson</div>
                                        <div class="customer-email">emma.j@example.com</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="order-id">#ORD-7840</span>
                                <br>
                                <small>1 item</small>
                            </td>
                            <td>
                                <div class="order-date">
                                    Jun 14, 2023<br>
                                    <small>02:15 PM</small>
                                </div>
                            </td>
                            <td>
                                <span class="order-amount">$29.99</span>
                            </td>
                            <td>
                                <span class="badge bg-warning">Pending</span>
                                <br>
                                <small>PayPal</small>
                            </td>
                            <td>
                                <span class="status-badge badge-processing">Processing</span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="#" class="action-btn btn-view" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="#" class="action-btn btn-edit" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="#" class="action-btn btn-print" title="Print">
                                        <i class="fas fa-print"></i>
                                    </a>
                                    <button type="button" class="action-btn btn-delete" title="Delete" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <!-- Order 3 -->
                        <tr>
                            <td>3</td>
                            <td>
                                <div class="customer-info">
                                    <div class="customer-avatar">MB</div>
                                    <div class="customer-details">
                                        <div class="customer-name">Michael Brown</div>
                                        <div class="customer-email">m.brown@example.com</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="order-id">#ORD-7839</span>
                                <br>
                                <small>5 items</small>
                            </td>
                            <td>
                                <div class="order-date">
                                    Jun 14, 2023<br>
                                    <small>09:45 AM</small>
                                </div>
                            </td>
                            <td>
                                <span class="order-amount">$189.50</span>
                            </td>
                            <td>
                                <span class="badge bg-success">Paid</span>
                                <br>
                                <small>Bank Transfer</small>
                            </td>
                            <td>
                                <span class="status-badge badge-shipped">Shipped</span>
                                <br>
                                <small>TRK-784512369</small>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="#" class="action-btn btn-view" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="#" class="action-btn btn-edit" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="#" class="action-btn btn-print" title="Print">
                                        <i class="fas fa-print"></i>
                                    </a>
                                    <button type="button" class="action-btn btn-delete" title="Delete" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <!-- Order 4 -->
                        <tr>
                            <td>4</td>
                            <td>
                                <div class="customer-info">
                                    <div class="customer-avatar">SW</div>
                                    <div class="customer-details">
                                        <div class="customer-name">Sophia Williams</div>
                                        <div class="customer-email">s.williams@example.com</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="order-id">#ORD-7838</span>
                                <br>
                                <small>2 items</small>
                            </td>
                            <td>
                                <div class="order-date">
                                    Jun 13, 2023<br>
                                    <small>04:20 PM</small>
                                </div>
                            </td>
                            <td>
                                <span class="order-amount">$324.75</span>
                            </td>
                            <td>
                                <span class="badge bg-success">Paid</span>
                                <br>
                                <small>Credit Card</small>
                            </td>
                            <td>
                                <span class="status-badge badge-delivered">Delivered</span>
                                <br>
                                <small>Jun 15, 2023</small>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="#" class="action-btn btn-view" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="#" class="action-btn btn-edit" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="#" class="action-btn btn-print" title="Print">
                                        <i class="fas fa-print"></i>
                                    </a>
                                    <button type="button" class="action-btn btn-delete" title="Delete" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <!-- Order 5 -->
                        <tr>
                            <td>5</td>
                            <td>
                                <div class="customer-info">
                                    <div class="customer-avatar">RK</div>
                                    <div class="customer-details">
                                        <div class="customer-name">Rahul Kumar</div>
                                        <div class="customer-email">rahul@gmail.com</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="order-id">#ORD-7837</span>
                                <br>
                                <small>3 items</small>
                            </td>
                            <td>
                                <div class="order-date">
                                    Jun 12, 2023<br>
                                    <small>11:10 AM</small>
                                </div>
                            </td>
                            <td>
                                <span class="order-amount">$89.99</span>
                            </td>
                            <td>
                                <span class="badge bg-danger">Failed</span>
                                <br>
                                <small>Credit Card</small>
                            </td>
                            <td>
                                <span class="status-badge badge-cancelled">Cancelled</span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="#" class="action-btn btn-view" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="#" class="action-btn btn-edit" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="#" class="action-btn btn-print" title="Print">
                                        <i class="fas fa-print"></i>
                                    </a>
                                    <button type="button" class="action-btn btn-delete" title="Delete" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <!-- Order 6 -->
                        <tr>
                            <td>6</td>
                            <td>
                                <div class="customer-info">
                                    <div class="customer-avatar">AV</div>
                                    <div class="customer-details">
                                        <div class="customer-name">Anjali Verma</div>
                                        <div class="customer-email">anjali@gmail.com</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="order-id">#ORD-7836</span>
                                <br>
                                <small>4 items</small>
                            </td>
                            <td>
                                <div class="order-date">
                                    Jun 11, 2023<br>
                                    <small>03:45 PM</small>
                                </div>
                            </td>
                            <td>
                                <span class="order-amount">$156.20</span>
                            </td>
                            <td>
                                <span class="badge bg-success">Paid</span>
                                <br>
                                <small>PayPal</small>
                            </td>
                            <td>
                                <span class="status-badge badge-refunded">Refunded</span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="#" class="action-btn btn-view" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="#" class="action-btn btn-edit" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="#" class="action-btn btn-print" title="Print">
                                        <i class="fas fa-print"></i>
                                    </a>
                                    <button type="button" class="action-btn btn-delete" title="Delete" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <!-- Order 7 -->
                        <tr>
                            <td>7</td>
                            <td>
                                <div class="customer-info">
                                    <div class="customer-avatar">MS</div>
                                    <div class="customer-details">
                                        <div class="customer-name">Mohit Singh</div>
                                        <div class="customer-email">mohit@gmail.com</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="order-id">#ORD-7835</span>
                                <br>
                                <small>2 items</small>
                            </td>
                            <td>
                                <div class="order-date">
                                    Jun 10, 2023<br>
                                    <small>09:20 AM</small>
                                </div>
                            </td>
                            <td>
                                <span class="order-amount">$2,999.00</span>
                            </td>
                            <td>
                                <span class="badge bg-success">Paid</span>
                                <br>
                                <small>Credit Card</small>
                            </td>
                            <td>
                                <span class="status-badge badge-delivered">Delivered</span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="#" class="action-btn btn-view" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="#" class="action-btn btn-edit" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="#" class="action-btn btn-print" title="Print">
                                        <i class="fas fa-print"></i>
                                    </a>
                                    <button type="button" class="action-btn btn-delete" title="Delete" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <!-- Order 8 -->
                        <tr>
                            <td>8</td>
                            <td>
                                <div class="customer-info">
                                    <div class="customer-avatar">PS</div>
                                    <div class="customer-details">
                                        <div class="customer-name">Priya Sharma</div>
                                        <div class="customer-email">priya@example.com</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="order-id">#ORD-7834</span>
                                <br>
                                <small>1 item</small>
                            </td>
                            <td>
                                <div class="order-date">
                                    Jun 9, 2023<br>
                                    <small>05:30 PM</small>
                                </div>
                            </td>
                            <td>
                                <span class="order-amount">$699.00</span>
                            </td>
                            <td>
                                <span class="badge bg-warning">Pending</span>
                                <br>
                                <small>Cash on Delivery</small>
                            </td>
                            <td>
                                <span class="status-badge badge-processing">Processing</span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="#" class="action-btn btn-view" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="#" class="action-btn btn-edit" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="#" class="action-btn btn-print" title="Print">
                                        <i class="fas fa-print"></i>
                                    </a>
                                    <button type="button" class="action-btn btn-delete" title="Delete" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            <div class="pagination-container">
                <div class="page-info">
                    Showing 1 to 8 of 1,248 orders
                </div>
                
                <ul class="pagination">
                    <li class="page-item disabled">
                        <span class="page-link">
                            <i class="fas fa-angle-left"></i>
                        </span>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">4</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">5</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">
                            <i class="fas fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection