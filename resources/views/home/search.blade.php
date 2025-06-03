@extends('layout.layout')

@section('content')
<div class="container py-4">
    {{-- <h2 class="py-3">Best sellers beauty products</h2> --}}
    <div class="row row-cols-1 row-cols-md-3 g-4">

        @foreach ($products as $product)
        <div class="col">
            <div class="product-card">
                <a href="{{ route('products.detail', $product->id) }}">
                <img src="{{ asset($product->gallery) }}" alt="{{ $product->name }}" class="w-100 product-image mb-2">
                </a>
                <small class="text-muted">Sponsored</small>
                <h2>{{ $product->name }}</h2>
                 <h2>{{ $product->description }}</h2>
                 <h2>{{ $product->category }}</h2>
                 <h2>{{ $product->discount }}</h2>
                 

                <div class="price mb-1">₹{{ $product->price }}</div>

                <a href="{{ route('products.detail', $product->id) }}" class="btn btn-warning w-100">Add to cart</a>
            </div>
        </div>
        @endforeach

    </div>
</div>
@endsection
