@extends('admin.layouts.layout')

@section('title', 'Products')
@section('page-title', 'Products')

@section('content')

<div class="container-fluid">

    <!-- Top Actions -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">All Products</h4>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#productModal">
            <i class="fas fa-plus me-1"></i> 
            <a href="{{route('product.create')}}">Add Product</a>
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
                            <th>Discount</th>
                            <th>Description</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>
                            @if($product->gallery)
                                <img src="{{ asset('storage/' . $product->gallery) }}" alt="Product Image">                            @else
                                No Image
                            @endif
                            </td>
                            <td>
                                <strong>{{$product->name}}</strong><br>
                            </td>
                            <td>{{$product->category}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->discount}}</td>
                            <td>{{$product->description}}</td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-eye"></i>
                                </button>
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary">
                                     <i class="fas fa-edit"></i></a>
                                <button class="btn btn-sm btn-outline-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
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
