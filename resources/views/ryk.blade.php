@extends('layout')

@section('content')

<style>
/* Shining red border effect */
.search-form {
  border: 2px solid red;
  animation: glowingBorder 1.5s infinite alternate;
}

@keyframes glowingBorder {
  0% {
    box-shadow: 0 0 5px red, 0 0 10px red;
  }
  100% {
    box-shadow: 0 0 15px red, 0 0 25px red;
  }
}
</style>
<div class="container mt-4 bg-black">
    <!-- Top bar -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        {{-- Centered Search Bar --}}
        <form action="{{ route('cart.index') }}" method="GET" 
      class="d-flex mx-auto rounded search-form" 
      style="max-width: 500px; width: 100%;">
    <input type="text" name="search" class="form-control"
           placeholder="Search products..." value="{{ $search ?? '' }}">
    <button type="submit" class="btn btn-danger btn-sm px-4">
        <i class="bi bi-search" style="font-size: 1.25rem;"></i> Search
    </button>
</form>

        <div style="width: 80px;"></div>
    </div>

    @if (Session::has('success'))
        <div class="alert alert-success text-center">{{ Session::get('success') }}</div>
    @endif

    @if ($carts->isEmpty())
        <div class="alert alert-info text-center">No items in cart.</div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered align-middle text-center">
                <thead class="table-dark">
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

            @if(!$carts->isEmpty())
    <div class="text-center mt-3">
        <a href="{{ url('/orders/form') }}" class="btn btn-danger">Order Now</a>
    </div>
@endif

        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-3">
            {{ $carts->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection