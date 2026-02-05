<form action="{{ isset($product) ? route('product.update', $product->id) : route('product.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($product))
        @method('PUT')
    @endif
    <div class="mb-3">
        <label>Product Name</label>
        <input type="text" name="name" value="{{ $product->name ?? '' }}" class="form-control" required>
    </div>

            <div class="mb-3">
                <label class="form-label">Category</label>
                <select name="category_id" class="form-select" required>
                    <option value="">Select Category</option>

                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', optional($product)->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach

                </select>
            </div>



    <div class="mb-3">
        <label>Price</label>
        <input type="number" name="price" value="{{ $product->price ?? '' }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Discount</label>
        <input type="number" name="discount" value="{{ $product->discount ?? '' }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control">{{ $product->description ?? '' }}</textarea>
    </div>

    <div class="mb-3">
        <label>Product Image</label>
        <input type="file" name="gallery" class="form-control">
        @if(isset($product) && $product->gallery)
            <img src="{{ asset('storage/'.$product->gallery) }}" width="100" class="mt-2">
        @endif
    </div>

    <button type="submit" class="btn btn-primary">{{ isset($product) ? 'Update' : 'Save' }} Product</button>
</form>