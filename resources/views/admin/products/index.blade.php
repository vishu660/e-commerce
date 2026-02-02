@extends('admin.layouts.layout')

@section('title', 'Products')
@section('page-title', 'Products')

@section('content')

<div class="container-fluid">

    <!-- Top Actions -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">All Products</h4>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#productModal">
            <i class="fas fa-plus me-1"></i> Add Product
        </button>
    </div>

    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6 class="text-muted">Total Products</h6>
                    <h3 class="mb-0">128</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6 class="text-muted">In Stock</h6>
                    <h3 class="mb-0 text-success">96</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6 class="text-muted">Out of Stock</h6>
                    <h3 class="mb-0 text-danger">32</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6 class="text-muted">Categories</h6>
                    <h3 class="mb-0">8</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Product Table -->
    <div class="card shadow-sm border-0">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Product</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>
                                <img src="https://via.placeholder.com/60"
                                     class="rounded"
                                     width="60">
                            </td>
                            <td>
                                <strong>iPhone 14 Pro</strong><br>
                                <small class="text-muted">SKU: IP14PRO</small>
                            </td>
                            <td>Mobile</td>
                            <td>₹1,29,999</td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-warning"
                                        data-bs-toggle="modal"
                                        data-bs-target="#productModal">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>

                        <tr>
                            <td>2</td>
                            <td>
                                <img src="https://via.placeholder.com/60"
                                     class="rounded"
                                     width="60">
                            </td>
                            <td>
                                <strong>Samsung Galaxy S23</strong><br>
                                <small class="text-muted">SKU: SGS23</small>
                            </td>
                            <td>Mobile</td>
                            <td>₹89,999</td>
                            <td><span class="badge bg-danger">Inactive</span></td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-warning"
                                        data-bs-toggle="modal"
                                        data-bs-target="#productModal">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>

                        <tr>
                            <td>3</td>
                            <td>
                                <img src="https://via.placeholder.com/60"
                                     class="rounded"
                                     width="60">
                            </td>
                            <td>
                                <strong>MacBook Air M2</strong><br>
                                <small class="text-muted">SKU: MBA-M2</small>
                            </td>
                            <td>Laptop</td>
                            <td>₹1,19,999</td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-warning"
                                        data-bs-toggle="modal"
                                        data-bs-target="#productModal">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>

<!-- Add / Edit Product Modal -->
<div class="modal fade" id="productModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow">

            <div class="modal-header">
                <h5 class="modal-title">Add / Edit Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form>
                    <div class="row g-3">

                        <div class="col-md-6">
                            <label class="form-label">Product Name</label>
                            <input type="text" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Category</label>
                            <select class="form-select">
                                <option>Mobile</option>
                                <option>Laptop</option>
                                <option>Accessories</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Price</label>
                            <input type="number" class="form-control">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Stock</label>
                            <input type="number" class="form-control">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Status</label>
                            <select class="form-select">
                                <option>Active</option>
                                <option>Inactive</option>
                            </select>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" rows="3"></textarea>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">Product Image</label>
                            <input type="file" class="form-control">
                        </div>

                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                <button class="btn btn-primary">Save Product</button>
            </div>

        </div>
    </div>
</div>

@endsection
