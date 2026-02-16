<?php
use Stripe\Stripe;
use Stripe\Charge;
use Illuminate\Http\Request;

class StripePaymentController extends Controller
{
    public function checkout()
    {
        return view('stripe.checkout');
    }

    public function payment(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        Charge::create([
            "amount" => 50000, 
            "currency" => "inr",
            "source" => $request->stripeToken,
            "description" => "Test Payment"
        ]);

        return back()->with('success', 'Payment Successful!');
    }
}
