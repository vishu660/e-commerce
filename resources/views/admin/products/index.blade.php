@extends('admin.layouts.layout')

@section('title', 'Products Management')
@section('page-title', 'Products')

@push('styles')
<style>
    /* Stats Cards */
    .stats-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }
    
    .stats-card {
        background: white;
        border-radius: 15px;
        padding: 25px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        border-left: 5px solid;
        position: relative;
        overflow: hidden;
    }
    
    .stats-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
    }
    
    .stats-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        opacity: 0.1;
    }
    
    .stats-card.total-products {
        border-left-color: #667eea;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }
    
    .stats-card.in-stock {
        border-left-color: #43e97b;
        background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
        color: white;
    }
    
    .stats-card.low-stock {
        border-left-color: #ff9a9e;
        background: linear-gradient(135deg, #ff9a9e 0%, #fad0c4 100%);
        color: white;
    }
    
    .stats-card.out-of-stock {
        border-left-color: #ff5858;
        background: linear-gradient(135deg, #ff5858 0%, #f09819 100%);
        color: white;
    }
    
    .stats-icon {
        font-size: 40px;
        margin-bottom: 15px;
        opacity: 0.9;
    }
    
    .stats-count {
        font-size: 36px;
        font-weight: 800;
        margin-bottom: 5px;
        line-height: 1;
    }
    
    .stats-label {
        font-size: 14px;
        opacity: 0.9;
        font-weight: 500;
        letter-spacing: 0.5px;
    }
    
    /* Filters Section */
    .filters-section {
        background: white;
        border-radius: 15px;
        padding: 25px;
        margin-bottom: 30px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
    }
    
    .filter-row {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-bottom: 20px;
    }
    
    .filter-group {
        position: relative;
    }
    
    .filter-label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #2c3e50;
        font-size: 14px;
    }
    
    .search-box {
        position: relative;
    }
    
    .search-icon {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #7f8c8d;
        z-index: 2;
    }
    
    .filter-input,
    .filter-select {
        width: 100%;
        padding: 12px 15px 12px 45px;
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        font-size: 14px;
        transition: all 0.3s ease;
        background: white;
    }
    
    .filter-select {
        padding-left: 15px;
    }
    
    .filter-input:focus,
    .filter-select:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }
    
    .filter-actions {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        margin-top: 10px;
    }
    
    .btn-filter {
        background: linear-gradient(135deg, #2c3e50 0%, #3498db 100%);
        color: white;
        border: none;
        padding: 12px 25px;
        border-radius: 10px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .btn-filter:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
    
    /* Products Table */
    .products-table-container {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        margin-bottom: 30px;
    }
    
    .table-header {
        padding: 20px 25px;
        border-bottom: 1px solid #e0e0e0;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: linear-gradient(135deg, #2c3e50 0%, #3498db 100%);
        color: white;
    }
    
    .table-title {
        font-size: 18px;
        font-weight: 600;
        margin: 0;
    }
    
    .btn-add {
        background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 10px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
        font-size: 14px;
    }
    
    .btn-add:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
    
    .products-table {
        width: 100%;
        border-collapse: collapse;
    }
    
    .products-table thead {
        background: #f8f9fa;
    }
    
    .products-table th {
        padding: 18px 15px;
        text-align: left;
        font-weight: 600;
        color: #2c3e50;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border-bottom: 2px solid #e0e0e0;
    }
    
    .products-table tbody tr {
        border-bottom: 1px solid #f1f1f1;
        transition: all 0.3s ease;
    }
    
    .products-table tbody tr:hover {
        background-color: #f8f9fa;
    }
    
    .products-table td {
        padding: 16px 15px;
        vertical-align: middle;
    }
    
    .product-image-cell {
        width: 80px;
    }
    
    .product-image {
        width: 60px;
        height: 60px;
        border-radius: 10px;
        object-fit: cover;
        border: 2px solid #e0e0e0;
        padding: 2px;
        background: white;
    }
    
    .product-info {
        display: flex;
        flex-direction: column;
    }
    
    .product-name {
        font-weight: 600;
        color: #2c3e50;
        font-size: 15px;
        margin-bottom: 3px;
    }
    
    .product-sku {
        font-size: 12px;
        color: #7f8c8d;
        background: #f8f9fa;
        padding: 2px 8px;
        border-radius: 4px;
        display: inline-block;
        font-family: monospace;
        width: fit-content;
    }
    
    .category-badge {
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        display: inline-block;
        background-color: #e3f2fd;
        color: #1976d2;
        border: 1px solid #bbdefb;
    }
    
    .price-info {
        display: flex;
        flex-direction: column;
    }
    
    .current-price {
        font-weight: 700;
        color: #2e59d9;
        font-size: 16px;
    }
    
    .original-price {
        text-decoration: line-through;
        color: #95a5a6;
        font-size: 13px;
    }
    
    .discount-badge {
        background-color: #ef476f;
        color: white;
        padding: 3px 8px;
        border-radius: 4px;
        font-size: 11px;
        font-weight: 600;
        display: inline-block;
        margin-top: 2px;
    }
    
    .stock-badge {
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        display: inline-block;
    }
    
    .stock-in {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }
    
    .stock-low {
        background-color: #fff3cd;
        color: #856404;
        border: 1px solid #ffeaa7;
    }
    
    .stock-out {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }
    
    .status-badge {
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        display: inline-block;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .status-active {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }
    
    .status-draft {
        background-color: #e2e3e5;
        color: #383d41;
        border: 1px solid #d6d8db;
    }
    
    .status-inactive {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }
    
    .action-buttons {
        display: flex;
        gap: 8px;
    }
    
    .btn-action {
        width: 36px;
        height: 36px;
        border-radius: 8px;
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 14px;
        text-decoration: none;
    }
    
    .btn-action:hover {
        transform: translateY(-2px);
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
    }
    
    .btn-edit {
        background-color: #f39c12;
        color: white;
    }
    
    .btn-featured {
        background-color: #9b59b6;
        color: white;
    }
    
    .btn-delete {
        background-color: #e74c3c;
        color: white;
    }
    
    .featured-tag {
        position: absolute;
        top: 10px;
        right: 10px;
        background: linear-gradient(135deg, #ff9a9e 0%, #fad0c4 100%);
        color: white;
        padding: 3px 10px;
        border-radius: 4px;
        font-size: 10px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    /* Pagination */
    .pagination-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px 25px;
        border-top: 1px solid #e0e0e0;
        background: white;
        border-radius: 0 0 15px 15px;
    }
    
    .page-info {
        color: #7f8c8d;
        font-size: 14px;
    }
    
    .pagination {
        display: flex;
        gap: 6px;
        list-style: none;
        margin: 0;
        padding: 0;
    }
    
    .page-item {
        margin: 0;
    }
    
    .page-link {
        padding: 8px 14px;
        border: 1px solid #e0e0e0;
        border-radius: 6px;
        color: #667eea;
        text-decoration: none;
        font-weight: 600;
        display: block;
        background-color: white;
        font-size: 13px;
        transition: all 0.3s ease;
    }
    
    .page-link:hover {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-color: #667eea;
    }
    
    .page-item.active .page-link {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-color: #667eea;
    }
    
    /* Modal Styles - Pure CSS */
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 9999;
        align-items: center;
        justify-content: center;
        padding: 20px;
        overflow-y: auto;
        backdrop-filter: blur(5px);
    }
    
    .modal:target {
        display: flex;
    }
    
    .modal-content {
        background: white;
        border-radius: 20px;
        width: 100%;
        max-width: 800px;
        max-height: 90vh;
        overflow-y: auto;
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
        animation: modalSlideIn 0.3s ease;
    }
    
    @keyframes modalSlideIn {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .modal-header {
        padding: 25px 30px;
        border-bottom: 1px solid #e0e0e0;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-radius: 20px 20px 0 0;
        position: sticky;
        top: 0;
        z-index: 10;
    }
    
    .modal-title {
        font-size: 22px;
        font-weight: 600;
        margin: 0;
    }
    
    .modal-close {
        color: white;
        text-decoration: none;
        font-size: 24px;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        transition: all 0.3s ease;
    }
    
    .modal-close:hover {
        background-color: rgba(255, 255, 255, 0.2);
    }
    
    .modal-body {
        padding: 30px;
    }
    
    .modal-footer {
        padding: 20px 30px;
        border-top: 1px solid #e0e0e0;
        display: flex;
        justify-content: flex-end;
        gap: 15px;
        background-color: #f8f9fa;
        border-radius: 0 0 20px 20px;
        position: sticky;
        bottom: 0;
        z-index: 10;
    }
    
    /* Form Styles */
    .form-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
    }
    
    .form-group {
        margin-bottom: 20px;
    }
    
    .form-label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #2c3e50;
        font-size: 14px;
    }
    
    .form-label.required::after {
        content: ' *';
        color: #e74c3c;
    }
    
    .form-control {
        width: 100%;
        padding: 12px 15px;
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        font-size: 14px;
        transition: all 0.3s ease;
        background: white;
    }
    
    .form-control:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }
    
    .form-select {
        width: 100%;
        padding: 12px 15px;
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        font-size: 14px;
        background: white;
        transition: all 0.3s ease;
    }
    
    .form-select:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }
    
    .form-textarea {
        width: 100%;
        padding: 12px 15px;
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        font-size: 14px;
        resize: vertical;
        min-height: 120px;
        transition: all 0.3s ease;
        font-family: inherit;
    }
    
    .form-textarea:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }
    
    .btn-save {
        background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
        color: white;
        border: none;
        padding: 12px 30px;
        border-radius: 10px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 14px;
    }
    
    .btn-save:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
    
    .btn-cancel {
        background: #95a5a6;
        color: white;
        border: none;
        padding: 12px 30px;
        border-radius: 10px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 14px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }
    
    .btn-cancel:hover {
        background: #7f8c8d;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
    
    .image-upload {
        border: 2px dashed #bdc3c7;
        border-radius: 10px;
        padding: 40px 20px;
        text-align: center;
        background-color: #f8f9fa;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .image-upload:hover {
        border-color: #667eea;
        background-color: #f0f7ff;
    }
    
    .upload-icon {
        font-size: 48px;
        color: #bdc3c7;
        margin-bottom: 15px;
    }
    
    .upload-text {
        color: #7f8c8d;
        font-size: 14px;
        margin-bottom: 10px;
    }
    
    .upload-hint {
        font-size: 12px;
        color: #95a5a6;
    }
    
    /* Product Image Container */
    .product-image-container {
        position: relative;
        display: inline-block;
    }
    
    /* Responsive Design */
    @media (max-width: 768px) {
        .stats-container {
            grid-template-columns: 1fr;
        }
        
        .stats-count {
            font-size: 28px;
        }
        
        .filter-row {
            grid-template-columns: 1fr;
        }
        
        .products-table {
            display: block;
            overflow-x: auto;
        }
        
        .table-header {
            flex-direction: column;
            gap: 15px;
            align-items: flex-start;
        }
        
        .action-buttons {
            flex-wrap: wrap;
        }
        
        .pagination-container {
            flex-direction: column;
            gap: 15px;
            align-items: center;
        }
        
        .modal-body {
            padding: 20px;
        }
        
        .modal-footer {
            flex-direction: column;
        }
        
        .btn-save,
        .btn-cancel {
            width: 100%;
        }
    }
    
    /* Custom Scrollbar */
    .modal-content::-webkit-scrollbar {
        width: 6px;
    }
    
    .modal-content::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 3px;
    }
    
    .modal-content::-webkit-scrollbar-thumb {
        background: #667eea;
        border-radius: 3px;
    }
    
    .modal-content::-webkit-scrollbar-thumb:hover {
        background: #764ba2;
    }
    
    /* Focus States for Accessibility */
    .btn-action:focus,
    .btn-add:focus,
    .btn-filter:focus,
    .btn-save:focus,
    .btn-cancel:focus {
        outline: 2px solid #667eea;
        outline-offset: 2px;
    }
</style>
@endpush

@section('content')
<div class="container">
    <!-- Stats Overview -->
    <div class="stats-container">
        <div class="stats-card total-products">
            <div class="stats-icon">
                <i class="fas fa-boxes"></i>
            </div>
            <div class="stats-count">856</div>
            <div class="stats-label">Total Products</div>
        </div>
        
        <div class="stats-card in-stock">
            <div class="stats-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="stats-count">724</div>
            <div class="stats-label">In Stock</div>
        </div>
        
        <div class="stats-card low-stock">
            <div class="stats-icon">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <div class="stats-count">45</div>
            <div class="stats-label">Low Stock</div>
        </div>
        
        <div class="stats-card out-of-stock">
            <div class="stats-icon">
                <i class="fas fa-times-circle"></i>
            </div>
            <div class="stats-count">87</div>
            <div class="stats-label">Out of Stock</div>
        </div>
    </div>
    
    <!-- Filters Section -->
    <div class="filters-section">
        <form action="" method="GET">
            <div class="filter-row">
                <div class="filter-group">
                    <label class="filter-label">Search Products</label>
                    <div class="search-box">
                        <i class="fas fa-search search-icon"></i>
                        <input type="text" name="search" class="filter-input" placeholder="Search by name, SKU or description...">
                    </div>
                </div>
                
                <div class="filter-group">
                    <label class="filter-label">Category</label>
                    <select name="category" class="filter-select">
                        <option value="">All Categories</option>
                        <option value="electronics">Electronics</option>
                        <option value="fashion">Fashion</option>
                        <option value="furniture">Furniture</option>
                        <option value="books">Books</option>
                        <option value="home">Home & Garden</option>
                    </select>
                </div>
                
                <div class="filter-group">
                    <label class="filter-label">Stock Status</label>
                    <select name="stock_status" class="filter-select">
                        <option value="">All Status</option>
                        <option value="in_stock">In Stock</option>
                        <option value="low_stock">Low Stock</option>
                        <option value="out_of_stock">Out of Stock</option>
                    </select>
                </div>
            </div>
            
            <div class="filter-actions">
                <button type="reset" class="btn-cancel">Reset</button>
                <button type="submit" class="btn-filter">
                    <i class="fas fa-filter"></i> Apply Filters
                </button>
            </div>
        </form>
    </div>
    
    <!-- Products Table -->
    <div class="products-table-container">
        <div class="table-header">
            <h3 class="table-title">Products List</h3>
            <a href="#addProductModal" class="btn-add">
                <i class="fas fa-plus"></i> Add Product
            </a>
        </div>
        
        <div class="table-responsive">
            <table class="products-table">
                <thead>
                    <tr>
                        <th width="60">#</th>
                        <th>Product</th>
                        <th width="120">Category</th>
                        <th width="120">Price</th>
                        <th width="120">Stock</th>
                        <th width="120">Status</th>
                        <th width="140">Actions</th>
                    </tr>
                </thead>
                
                <tbody>
                    <!-- Product 1 -->
                    <tr>
                        <td>1</td>
                        <td>
                            <div class="product-info">
                                <div class="product-name">Bluetooth Speaker - Premium Sound</div>
                                <div class="product-sku">PROD-BTS-001</div>
                                <div style="font-size: 13px; color: #7f8c8d; margin-top: 5px;">
                                    Wireless, 20W, 12hr battery
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="category-badge">Electronics</span>
                        </td>
                        <td>
                            <div class="price-info">
                                <span class="current-price">₹1,499</span>
                                <span class="original-price">₹1,999</span>
                                <span class="discount-badge">-25%</span>
                            </div>
                        </td>
                        <td>
                            <span class="stock-badge stock-in">25 in stock</span>
                        </td>
                        <td>
                            <span class="status-badge status-active">Active</span>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <a href="#editProductModal1" class="btn-action btn-edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" class="btn-action btn-featured">
                                    <i class="fas fa-star"></i>
                                </button>
                                <button type="button" class="btn-action btn-delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Product 2 -->
                    <tr>
                        <td>2</td>
                        <td>
                            <div class="product-info">
                                <div class="product-name">Men's Premium Cotton T-Shirt</div>
                                <div class="product-sku">PROD-TS-045</div>
                                <div style="font-size: 13px; color: #7f8c8d; margin-top: 5px;">
                                    100% Cotton, Multiple Colors
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="category-badge">Fashion</span>
                        </td>
                        <td>
                            <div class="price-info">
                                <span class="current-price">₹799</span>
                            </div>
                        </td>
                        <td>
                            <span class="stock-badge stock-out">Out of stock</span>
                        </td>
                        <td>
                            <span class="status-badge status-inactive">Inactive</span>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <a href="#editProductModal2" class="btn-action btn-edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" class="btn-action btn-featured">
                                    <i class="fas fa-star"></i>
                                </button>
                                <button type="button" class="btn-action btn-delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Product 3 -->
                    <tr>
                        <td>3</td>
                        <td>
                            <div class="product-info">
                                <div class="product-name">Modern Wooden Chair</div>
                                <div class="product-sku">PROD-WC-112</div>
                                <div style="font-size: 13px; color: #7f8c8d; margin-top: 5px;">
                                    Oak Wood, Ergonomic Design
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="category-badge">Furniture</span>
                        </td>
                        <td>
                            <div class="price-info">
                                <span class="current-price">₹3,200</span>
                            </div>
                        </td>
                        <td>
                            <span class="stock-badge stock-low">12 left</span>
                        </td>
                        <td>
                            <span class="status-badge status-active">Active</span>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <a href="#editProductModal3" class="btn-action btn-edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" class="btn-action btn-featured">
                                    <i class="fas fa-star"></i>
                                </button>
                                <button type="button" class="btn-action btn-delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Product 4 -->
                    <tr>
                        <td>4</td>
                        <td>
                            <div class="product-info">
                                <div class="product-name">Complete Web Development Guide</div>
                                <div class="product-sku">PROD-BOOK-205</div>
                                <div style="font-size: 13px; color: #7f8c8d; margin-top: 5px;">
                                    500 pages, Latest Edition
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="category-badge">Books</span>
                        </td>
                        <td>
                            <div class="price-info">
                                <span class="current-price">₹499</span>
                                <span class="original-price">₹599</span>
                                <span class="discount-badge">-17%</span>
                            </div>
                        </td>
                        <td>
                            <span class="stock-badge stock-in">48 in stock</span>
                        </td>
                        <td>
                            <span class="status-badge status-draft">Draft</span>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <a href="#editProductModal4" class="btn-action btn-edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" class="btn-action btn-featured">
                                    <i class="fas fa-star"></i>
                                </button>
                                <button type="button" class="btn-action btn-delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Product 5 -->
                    <tr>
                        <td>5</td>
                        <td>
                            <div class="product-info">
                                <div class="product-name">Professional Kitchen Knife Set</div>
                                <div class="product-sku">PROD-KNIFE-033</div>
                                <div style="font-size: 13px; color: #7f8c8d; margin-top: 5px;">
                                    8 pieces, Stainless Steel
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="category-badge">Home & Garden</span>
                        </td>
                        <td>
                            <div class="price-info">
                                <span class="current-price">₹2,999</span>
                            </div>
                        </td>
                        <td>
                            <span class="stock-badge stock-in">15 in stock</span>
                        </td>
                        <td>
                            <span class="status-badge status-active">Active</span>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <a href="#editProductModal5" class="btn-action btn-edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" class="btn-action btn-featured">
                                    <i class="fas fa-star"></i>
                                </button>
                                <button type="button" class="btn-action btn-delete">
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
                Showing 1 to 5 of 856 products
            </div>
            
            <ul class="pagination">
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

<!-- Add Product Modal -->
<div class="modal" id="addProductModal">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title">Add New Product</h3>
            <a href="#" class="modal-close">&times;</a>
        </div>
        <form method="POST" action="">
            @csrf
            <div class="modal-body">
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label required">Product Name</label>
                        <input type="text" class="form-control" name="name" required placeholder="Enter product name">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label required">SKU Code</label>
                        <input type="text" class="form-control" name="sku" required placeholder="e.g., PROD-001">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label required">Category</label>
                        <select class="form-select" name="category" required>
                            <option value="">Select Category</option>
                            <option value="electronics">Electronics</option>
                            <option value="fashion">Fashion</option>
                            <option value="furniture">Furniture</option>
                            <option value="books">Books</option>
                            <option value="home">Home & Garden</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label required">Price (₹)</label>
                        <input type="number" class="form-control" name="price" required step="0.01" min="0" placeholder="0.00">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Compare at Price (₹)</label>
                        <input type="number" class="form-control" name="compare_price" step="0.01" min="0" placeholder="Original price">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Cost Price (₹)</label>
                        <input type="number" class="form-control" name="cost" step="0.01" min="0" placeholder="Cost per unit">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label required">Stock Quantity</label>
                        <input type="number" class="form-control" name="quantity" required min="0" placeholder="0">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label required">Status</label>
                        <select class="form-select" name="status" required>
                            <option value="active">Active</option>
                            <option value="draft">Draft</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Featured Product</label>
                        <select class="form-select" name="featured">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Description</label>
                    <textarea class="form-textarea" name="description" placeholder="Enter product description"></textarea>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Product Image</label>
                    <div class="image-upload">
                        <div class="upload-icon">
                            <i class="fas fa-cloud-upload-alt"></i>
                        </div>
                        <div class="upload-text">Click to upload product image</div>
                        <div class="upload-hint">PNG, JPG, GIF up to 5MB</div>
                        <input type="file" name="image" accept="image/*" style="display: none;">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn-cancel">Cancel</a>
                <button type="submit" class="btn-save">Save Product</button>
            </div>
        </form>
    </div>
</div>

<!-- Edit Product Modal for Product 1 -->
<div class="modal" id="editProductModal1">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title">Edit Product</h3>
            <a href="#" class="modal-close">&times;</a>
        </div>
        <form method="POST" action="">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label required">Product Name</label>
                        <input type="text" class="form-control" name="name" value="Bluetooth Speaker - Premium Sound" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label required">SKU Code</label>
                        <input type="text" class="form-control" name="sku" value="PROD-BTS-001" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label required">Category</label>
                        <select class="form-select" name="category" required>
                            <option value="electronics" selected>Electronics</option>
                            <option value="fashion">Fashion</option>
                            <option value="furniture">Furniture</option>
                            <option value="books">Books</option>
                            <option value="home">Home & Garden</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label required">Price (₹)</label>
                        <input type="number" class="form-control" name="price" value="1499" required step="0.01" min="0">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Compare at Price (₹)</label>
                        <input type="number" class="form-control" name="compare_price" value="1999" step="0.01" min="0">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Cost Price (₹)</label>
                        <input type="number" class="form-control" name="cost" value="899" step="0.01" min="0">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label required">Stock Quantity</label>
                        <input type="number" class="form-control" name="quantity" value="25" required min="0">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label required">Status</label>
                        <select class="form-select" name="status" required>
                            <option value="active" selected>Active</option>
                            <option value="draft">Draft</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Featured Product</label>
                        <select class="form-select" name="featured">
                            <option value="1" selected>Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Description</label>
                    <textarea class="form-textarea" name="description">Wireless Bluetooth speaker with premium sound quality, 20W output, and 12-hour battery life. Perfect for parties and outdoor activities.</textarea>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Product Image</label>
                    <div class="image-upload">
                        <div class="upload-icon">
                            <i class="fas fa-cloud-upload-alt"></i>
                        </div>
                        <div class="upload-text">Current image will be kept</div>
                        <div class="upload-hint">Click to upload new image</div>
                        <input type="file" name="image" accept="image/*" style="display: none;">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn-cancel">Cancel</a>
                <button type="submit" class="btn-save">Update Product</button>
            </div>
        </form>
    </div>
</div>

<!-- Edit Product Modal for Product 2 -->
<div class="modal" id="editProductModal2">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title">Edit Product</h3>
            <a href="#" class="modal-close">&times;</a>
        </div>
        <form method="POST" action="">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label required">Product Name</label>
                        <input type="text" class="form-control" name="name" value="Men's Premium Cotton T-Shirt" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label required">SKU Code</label>
                        <input type="text" class="form-control" name="sku" value="PROD-TS-045" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label required">Category</label>
                        <select class="form-select" name="category" required>
                            <option value="fashion" selected>Fashion</option>
                            <option value="electronics">Electronics</option>
                            <option value="furniture">Furniture</option>
                            <option value="books">Books</option>
                            <option value="home">Home & Garden</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label required">Price (₹)</label>
                        <input type="number" class="form-control" name="price" value="799" required step="0.01" min="0">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label required">Stock Quantity</label>
                        <input type="number" class="form-control" name="quantity" value="0" required min="0">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label required">Status</label>
                        <select class="form-select" name="status" required>
                            <option value="inactive" selected>Inactive</option>
                            <option value="active">Active</option>
                            <option value="draft">Draft</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Description</label>
                    <textarea class="form-textarea" name="description">100% premium cotton t-shirt available in multiple colors. Comfortable and durable fabric.</textarea>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn-cancel">Cancel</a>
                <button type="submit" class="btn-save">Update Product</button>
            </div>
        </form>
    </div>
</div>
@endsection