@extends('admin.layouts.layout')

@section('content')
<div class="container-fluid">

    <!-- Page Title -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">Categories</h3>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Add Category Card -->
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <div class="row align-items-center">

                    <div class="col-md-6">
                        <h5 class="mb-0 fw-bold">Add New Category</h5>
                    </div>

                    <div class="col-md-6 text-end">
                        <a href="{{ route('admin.categories.create') }}" class="btn btn-success">
                            <i class="fas fa-plus"></i> Add Category
                        </a>
                    </div>

                </div>
            </div>
        </div>


    <!-- Categories Table -->
    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered table-hover align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th width="5%">ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th width="20%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td class="fw-semibold">{{ $category->name }}</td>
                            <td>
                                <span class="badge bg-secondary">
                                    {{ $category->slug }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.categories.edit', $category->id) }}" 
                                   class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i> Edit
                                </a>

                                <form action="{{ route('admin.categories.destroy', $category->id) }}" 
                                      method="POST" 
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-muted">
                                No categories found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
