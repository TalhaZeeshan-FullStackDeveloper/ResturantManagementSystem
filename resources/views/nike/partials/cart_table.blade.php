<div class="table-responsive">
    <table class="table table-bordered align-middle text-center">
        <thead class="table-light">
            <tr>
                <th>Image</th>
                <th>Product</th>
                <th>Category</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php $grandTotal = 0; @endphp
            @foreach ($carts as $cart)
                @php
                    $total = $cart->price * $cart->quantity;
                    $grandTotal += $total;
                @endphp
                <tr>
                    <td>
                        @if ($cart->image)
                            <img src="{{ asset('images/' . $cart->image) }}" width="60" class="img-fluid rounded">
                        @else
                            <img src="https://placehold.co/60x60" class="img-fluid rounded">
                        @endif
                    </td>
                    <td>{{ $cart->product_name }}</td>
                    <td>{{ $cart->category }}</td>
                    <td>Rs {{ number_format($cart->price) }}</td>
                    <td>
                        <form action="{{ route('cart.update', $cart->id) }}" method="POST" class="d-flex justify-content-center">
                            @csrf
                            <input type="number" name="quantity" value="{{ $cart->quantity }}"
                                   class="form-control form-control-sm me-2" min="1" style="width: 80px;">
                            <button class="btn btn-success btn-sm">Update</button>
                        </form>
                    </td>
                    <td>Rs {{ number_format($total) }}</td>
                    <td>
                        <form action="{{ route('cart.remove', $cart->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="current_page" value="{{ request()->get('page', 1) }}">
                            <button class="btn btn-danger btn-sm">Remove</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            <tr>
                <td colspan="5" class="text-end fw-bold">Grand Total</td>
                <td colspan="2" class="fw-bold">Rs {{ number_format($grandTotal) }}</td>
            </tr>
        </tbody>
    </table>
</div>

<div class="d-flex justify-content-center mt-3">
    {{ $carts->links('pagination::bootstrap-5') }}
</div>