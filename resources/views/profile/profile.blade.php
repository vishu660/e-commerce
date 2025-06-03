@extends('layout.layout')

@section('content')
<div class="container mt-4">
    <div class="row">
        <!-- Left: User Details -->
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">User Profile</div>
                <div class="card-body">
                    <p><strong>Name:</strong> {{ $user->name }}</p>
                    <p><strong>Mobile:</strong> {{ $user->mobile }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary btn-sm">Edit Profile</a>
                </div>
            </div>
        </div>

        <!-- Right: Orders Section -->
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-success text-white">My Orders</div>
                <div class="card-body">
                    @if($orders->isEmpty())
                        <p>आपके द्वारा अभी तक कोई ऑर्डर नहीं किया गया है।</p>
                    @else
                        @foreach($orders as $order)
                            <div class="row mb-3 border-bottom pb-2">
                                <div class="col-md-3">
                                    <img src="{{ asset($order->product->gallery) }}" class="img-fluid rounded" alt="Product Image">
                                </div>
                                <div class="col-md-9">
                                    <h5>{{ $order->product->name }}</h5>
                                    <p class="mb-1">Price: ₹{{ $order->product->price }}</p>
                                    <p class="mb-1">Address: {{ $order->address }}</p>
                                    <p class="mb-1">Payment Method: <strong>{{ ucfirst($order->payment_method) }}</strong></p>
                                    <p class="mb-0">Order Status: <span class="badge bg-warning text-dark">{{ ucfirst($order->status) }}</span></p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
