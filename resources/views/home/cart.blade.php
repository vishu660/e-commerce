@extends('layout.layout')

@section('content')
<div class="container py-5">
  <h3 class="mb-4">Shopping Cart</h3>

  <div class="row">
    <div class="col-md-8">
     @foreach ($cartItems as $item)
  <div class="cart-item d-flex align-items-center mb-3">
    <a href="{{ route('products.detail', $item->product->id) }}" class="d-flex align-items-center text-decoration-none text-dark w-100">
      <img src="{{ asset($item->product->gallery) }}" class="product-img me-3" width="80" height="80" alt="Product" />
      <div class="flex-grow-1">
        <h6 class="mb-1">{{ $item->product->name }}</h6>
        <p class="text-muted mb-1">₹{{ $item->product->price }}</p>
      </div>
    </a>
    <div class="d-flex align-items-center ms-3">
      <input type="number" class="form-control form-control-sm w-50" value="1" min="1"/>
      <a href="{{ route('remove', $item->id) }}" class="btn btn-outline-danger btn-sm ms-2">Remove</a>
    </div>
  </div>
@endforeach

    </div>

    <div class="col-md-4">
      <div class="card shadow-sm">
        <div class="card-body">
          <h5 class="card-title">Order Summary</h5>
          <p class="d-flex justify-content-between">
            <span>Subtotal:</span>
            <span>₹{{ $cartItems->sum(fn($item) => $item->product->price) }}</span>
          </p>
          <p class="d-flex justify-content-between">
            <span>Shipping:</span>
            <span>Free</span>
          </p>
          <hr />
          <h6 class="d-flex justify-content-between">
            <span>Total:</span>
            <span>₹{{ $cartItems->sum(fn($item) => $item->product->price) }}</span>
          </h6>
          <a href="{{ route('order') }}" class="btn btn-primary w-100 mt-3">Proceed to Checkout</a>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection
