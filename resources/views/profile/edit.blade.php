@extends('layout.layout')

@section('content')

<div class="container mt-5">
    
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Edit Profile</h2>
        <a href="{{ route('profile') }}" class="btn btn-outline-dark btn-sm">Back</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Name:</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Mobile Number:</label>
            <input type="text" name="mobile" value="{{ old('mobile', $user->mobile) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email (Gmail):</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>New Password:</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="mb-3">
            <label>Confirm Password:</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary my-2">Update Profile</button>
    </form>
</div>

@endsection
