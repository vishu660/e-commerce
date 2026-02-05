@extends('layout.layout')

@section('content')
<div class="container">
    <div class="row">

        @forelse($products as $product)
            <div class="col-md-3 mb-4">
                <div class="card h-100">

                    @if($product->gallery)
                        <img src="{{ asset('storage/'.$product->gallery) }}"
                             class="card-img-top" alt="{{ $product->name }}">
                    @endif

                    <div class="card-body">
                        <h6 class="card-title">{{ $product->name }}</h6>

                        <p class="mb-1">
                            ₹{{ $product->price }}
                            @if($product->discount > 0)
                                <span class="text-success">
                                    ({{ $product->discount }}% off)
                                </span>
                            @endif
                        </p>

                        <a href="{{ route('products.detail', $product->id) }}"
                           class="btn btn-sm btn-primary">
                            View
                        </a>
                    </div>

                </div>
            </div>
        @empty
            <p class="text-center">No products found</p>
        @endforelse

    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $products->links() }}
    </div>
</div>
@endsection
