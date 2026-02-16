@extends('layout.layout')

@section('content')
<div class="container my-5">
    <div class="row">

        <!-- LEFT -->
        <div class="col-md-7">
            <div class="card p-4 shadow-sm">
                <h4 class="mb-4">Delivery Address</h4>

                <form action="{{ route('placeorder') }}" method="POST" id="checkout-form">
                    @csrf

                    <div class="mb-3">
                        <label class="fw-semibold">Full Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="fw-semibold">Shipping Address</label>
                        <textarea name="address" class="form-control" rows="4" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="fw-semibold">Payment Method</label>
                        <select name="payment_method" id="payment_method" class="form-select" required>
                            <option value="cod">Cash on Delivery</option>
                            <option value="card">Credit / Debit Card</option>
                        </select>
                    </div>

                    <!-- STRIPE CARD -->
                    <div id="card-section" style="display:none;">
                        <label class="fw-semibold">Card Details</label>
                        <div id="card-element" class="form-control p-2"></div>
                        <div id="card-errors" class="text-danger mt-2"></div>
                    </div>

                    <input type="hidden" name="stripeToken" id="stripeToken">

                    <button class="btn btn-warning w-100 fw-bold mt-3">
                        Place your order
                    </button>
                </form>
            </div>
        </div>

        <!-- RIGHT -->
        <div class="col-md-5">
            <div class="card p-4 shadow-sm">
                <h4>Order Summary</h4>
                <p class="d-flex justify-content-between">
                    <span>Total</span>
                    <span>₹{{ $cartItems->sum(fn($i) => $i->product->price) }}</span>
                </p>
            </div>
        </div>

    </div>
</div>

<!-- STRIPE -->
<script src="https://js.stripe.com/v3/"></script>

<script>
const stripe = Stripe("{{ config('services.stripe.key') }}");
const elements = stripe.elements();

// 🔥 FIX: hidePostalCode removes ZIP issue
const card = elements.create('card', {
    hidePostalCode: true
});

card.mount('#card-element');

// Live validation
card.on('change', function(event) {
    document.getElementById('card-errors').textContent =
        event.error ? event.error.message : '';
});

const paymentMethod = document.getElementById('payment_method');
const cardSection = document.getElementById('card-section');
const form = document.getElementById('checkout-form');

// Show / hide card
paymentMethod.addEventListener('change', () => {
    cardSection.style.display = paymentMethod.value === 'card' ? 'block' : 'none';
});

// Submit handling
form.addEventListener('submit', async function(e) {

    if (paymentMethod.value === 'card') {
        e.preventDefault();

        const { token, error } = await stripe.createToken(card);

        if (error) {
            document.getElementById('card-errors').textContent = error.message;
            return;
        }

        document.getElementById('stripeToken').value = token.id;
        form.submit();
    }
});
</script>
@endsection
