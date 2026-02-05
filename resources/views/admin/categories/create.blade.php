@extends('admin.layouts.layout')

@section('content')
<div class="container mt-4">

    <h3 class="fw-bold mb-4">➕ Add Category</h3>

    <div class="card shadow-sm">
        <div class="card-body">

            <form method="POST" action="{{ route('admin.categories.store') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Category Name</label>
                    <input type="text"
                           name="name"
                           class="form-control"
                           placeholder="Enter category name"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Slug</label>
                    <input type="text"
                        name="slug"
                        class="form-control"
                        placeholder="example: mens-fashion"
                        required>
                </div>

                <div class="d-flex gap-2">
                    <button class="btn btn-success">Save</button>
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
                        Back
                    </a>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection
