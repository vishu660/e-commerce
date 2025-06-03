@extends('layout.layout')

@section('content')
<div class="container py-4">
  <div class="row">
    <!-- Product Image -->
    <div class="col-md-6 text-center">
      <img src="{{ asset($product->gallery) }}" alt="" class="product_img" />
      <div class="mt-5">
        <img src="{{ asset($product->gallery) }}" width="60" class="me-2 border border-secondary p-2"/>
        <img src="{{ asset($product->gallery) }}" width="60" class="me-2 border border-secondary p-2"/>
        <img src="{{ asset($product->gallery) }}" width="60" class="me-2 border border-secondary p-2"/>
      </div>
    </div>

    <!-- Product Info -->
    <div class="col-md-6">
      <h4>{{ $product->name }}</h4>
      <div class="mb-2">
        <span class="rating-stars">★ ★ ★ ★ ☆</span>
        <span>(15 ratings)</span>
      </div>

      <!-- Dynamic Price -->
      <p>
        <span class="price-discount text-danger">-{{ $product['discount'] }}%</span>
        <span class="fs-4 fw-bold text-dark">₹<span id="dynamic-price">{{ $product['price'] }}</span></span>
        <span class="text-muted ms-2"><del>₹{{ $product['mrp'] }}</del></span>
      </p>
      <p>Inclusive of all taxes</p>
      <p>Packaging: Ships in product packaging</p>

      <!-- Quantity Controls -->
      <label for="quantity" class="form-label">Quantity:</label>
      <div class="d-flex align-items-center mb-3" style="max-width: 160px;">
        <button type="button" class="btn btn-outline-secondary" id="decrease">−</button>
        <input type="number" id="quantity" name="quantity" class="form-control text-center mx-2" value="1" min="1" readonly style="width: 100px;">
        <button type="button" class="btn btn-outline-secondary" id="increase">+</button>
      </div>

      <!-- Buttons -->
      <div class="d-flex gap-2">
        <form action="{{ route('add-to-cart') }}" method="POST" class="w-50">
          @csrf
          <input type="hidden" name="product_id" value="{{ $product->id }}">
          <input type="hidden" name="quantity" id="hidden-quantity" value="1">
          <button type="submit" class="btn btn-warning w-100 py-2">Add to Cart</button>
        </form>

        <form action="{{ route('order') }}" method="GET" class="w-50">
          <input type="hidden" name="product_id" value="{{ $product->id }}">
          <input type="hidden" name="quantity" id="buy-now-quantity" value="1">
          <button type="submit" class="btn btn-success w-100 py-2">Buy Now</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- JavaScript for Quantity & Price -->
<script>
  const pricePerItem = {{ $product['price'] }};
  const quantityInput = document.getElementById('quantity');
  const priceDisplay = document.getElementById('dynamic-price');
  const decreaseBtn = document.getElementById('decrease');
  const increaseBtn = document.getElementById('increase');
  const hiddenQty = document.getElementById('hidden-quantity');
  const buyNowQty = document.getElementById('buy-now-quantity');

  function updatePrice() {
    const qty = parseInt(quantityInput.value);
    priceDisplay.textContent = pricePerItem * qty;
    hiddenQty.value = qty;
    buyNowQty.value = qty;
  }

  increaseBtn.addEventListener('click', () => {
    quantityInput.value = parseInt(quantityInput.value) + 1;
    updatePrice();
  });

  decreaseBtn.addEventListener('click', () => {
    if (parseInt(quantityInput.value) > 1) {
      quantityInput.value = parseInt(quantityInput.value) - 1;
      updatePrice();
    }
  });

  // Initialize price
  updatePrice();
</script>
@endsection
