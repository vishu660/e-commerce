@extends('layout.layout')

@section('content')

<!-- Hero Section -->
<section class="bg-primary text-white text-center py-5 shadow">
    <div class="container">
        <h1 class="display-4 fw-bold">About Us</h1>
        <p class="lead">Discover our story, values, and what drives us every day.</p>
    </div>
</section>

<!-- About Section -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-md-6">
                <img src="{{ asset('product_img/about.jpg') }}" alt="About Image" class="img-fluid rounded shadow">
            </div>
            <div class="col-md-6">
                <h2 class="mb-3">Who We Are</h2>
                <p class="text-muted">Welcome to <strong class="text-dark">YourStore</strong> — your trusted partner in fashion, electronics, home decor, and more. We are passionate about offering top-quality products while keeping affordability and convenience in mind.</p>
                <p class="text-muted">Started in 2022, we’ve grown into one of India’s most dynamic e-commerce platforms, delivering to thousands of customers across the country.</p>
                <a href="{{ url('/products') }}" class="btn btn-outline-primary mt-3">Explore Our Products</a>
            </div>
        </div>
    </div>
</section>

<!-- Mission and Vision -->
<section class="bg-light py-5">
    <div class="container">
        <h2 class="text-center mb-5">Our Mission & Vision</h2>
        <div class="row text-center">
            <div class="col-md-6 mb-4">
                <div class="p-4 bg-white rounded shadow h-100">
                    <i class="bi bi-bullseye display-4 text-primary mb-3"></i>
                    <h5 class="fw-bold">Our Mission</h5>
                    <p class="text-muted">To provide high-quality, affordable products while offering an exceptional shopping experience.</p>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="p-4 bg-white rounded shadow h-100">
                    <i class="bi bi-lightbulb display-4 text-warning mb-3"></i>
                    <h5 class="fw-bold">Our Vision</h5>
                    <p class="text-muted">To be India’s most loved and trusted e-commerce brand by empowering customers with choice and innovation.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Core Values Section -->
<section class="py-5">
    <div class="container text-center">
        <h2 class="mb-4">What We Stand For</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow h-100">
                    <div class="card-body">
                        <i class="bi bi-heart-fill text-danger display-5 mb-3"></i>
                        <h5 class="card-title fw-bold">Customer First</h5>
                        <p class="card-text text-muted">We put our customers at the center of everything we do and constantly strive to meet their needs.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow h-100">
                    <div class="card-body">
                        <i class="bi bi-shield-lock-fill text-info display-5 mb-3"></i>
                        <h5 class="card-title fw-bold">Trust & Transparency</h5>
                        <p class="card-text text-muted">We believe in open communication, honesty, and building lasting relationships with our users.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow h-100">
                    <div class="card-body">
                        <i class="bi bi-stars text-warning display-5 mb-3"></i>
                        <h5 class="card-title fw-bold">Innovation</h5>
                        <p class="card-text text-muted">We continuously evolve to bring new ideas, features, and better experiences to our customers.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
