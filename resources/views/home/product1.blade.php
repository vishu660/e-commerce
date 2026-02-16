@extends('layout.layout')

@section('content')
<div class="container-fluid mt-4">

    <div class="row g-4">
        @forelse($products as $product)
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="card h-100 shadow-sm border-light" style="min-height: 400px;">

                @if($product->gallery)
                <div class="position-relative" style="height: 180px; overflow: hidden;">
                    <img src="{{ asset('storage/'.$product->gallery) }}"
                         class="card-img-top h-100 w-100"
                         alt="{{ $product->name }}"
                         style="object-fit: contain; padding: 10px;">
                </div>
                @else
                <div class="position-relative bg-light d-flex align-items-center justify-content-center" 
                     style="height: 180px;">
                    <span class="text-muted">No Image Available</span>
                </div>
                @endif

                <div class="card-body d-flex flex-column p-3">
                    <h6 class="card-title text-truncate mb-2" title="{{ $product->name }}">
                        {{ $product->name }}
                    </h6>

                    @if($product->description)
                    <p class="small text-muted mb-2 text-truncate-2" 
                       style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                        {{ $product->description }}
                    </p>
                    @endif

                    <div class="mt-auto">
                        <div class="d-flex align-items-center mb-1">
                            <span class="h6 mb-0 fw-bold">₹{{ number_format($product->price, 2) }}</span>
                            @if($product->discount > 0)
                            <span class="badge bg-success ms-2">
                                {{ $product->discount }}% OFF
                            </span>
                            @endif
                        </div>

                        @if($product->discount > 0)
                        <small class="text-muted text-decoration-line-through">
                            ₹{{ number_format($product->price / (1 - $product->discount/100), 2) }}
                        </small>
                        @endif

                        <a href="{{ route('products.detail', $product->id) }}"
                           class="btn btn-primary btn-sm w-100 mt-2">
                            View Details
                        </a>
                    </div>
                </div>

            </div>
        </div>
        @empty
        <div class="col-12">
            <p class="text-center py-5">No products found</p>
        </div>
        @endforelse

    </div>

    @if($products->count() > 0)
    <div class="mt-4">
        {{ $products->links() }}
    </div>
    @endif

</div>
@endsection

<style>
.card-img-top {
    transition: transform 0.3s ease;
    background-color: #f8f9fa;
}

.card:hover .card-img-top {
    transform: scale(1.03);
}

.text-truncate-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.card {
    transition: all 0.3s ease;
    border: 1px solid #e0e0e0;
}

.card:hover {
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    border-color: #007bff;
}

.card-body {
    flex: 1;
}
</style>