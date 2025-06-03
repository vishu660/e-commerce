@extends('layout.layout')

@section('content')
<div class="container my-5">
    <div class="row">
        <!-- Left Section: Shipping & Payment -->
        <div class="col-md-7">
            <div class="card p-4 shadow-sm">
                <h4 class="mb-4">Delivery Address</h4>
                <form action="{{ route('placeorder') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold">Full Name</label>
                        <input type="text" name="name" class="form-control" placeholder="John Doe" required>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label fw-semibold">Shipping Address</label>
                        <textarea name="address" rows="4" class="form-control" placeholder="House No, Street, City, ZIP" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="payment_method" class="form-label fw-semibold">Payment Method</label>
                        <select name="payment_method" class="form-select" required>
                            <option value="cod">Cash on Delivery</option>
                            <option value="card">Credit / Debit Card</option>
                            <option value="upi">UPI</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-warning w-100 fw-bold">Place your order</button>
                </form>
            </div>
        </div>

        <!-- Right Section: Order Summary -->
        <div class="col-md-5">
            <div class="card p-4 shadow-sm mb-3">
                <h4 class="mb-3">Order Summary</h4>
                <p class="d-flex justify-content-between">
                    <span>Subtotal</span>
                    <span>₹{{ $cartItems->sum(fn($item) => $item->product->price) }}</span>
                </p>
                <p class="d-flex justify-content-between">
                    <span>Shipping</span>
                    <span class="text-success">Free</span>
                </p>
                <hr>
                <h5 class="d-flex justify-content-between">
                    <span>Total</span>
                    <span>₹{{ $cartItems->sum(fn($item) => $item->product->price) }}</span>
                </h5>
            </div>

            <div class="text-muted small">
                <p><i class="bi bi-shield-lock-fill"></i> Secure transaction</p>
                <p><i class="bi bi-box"></i> Easy returns within 7 days</p>
            </div>
        </div>
    </div>
</div>
@endsection
