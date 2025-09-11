@extends('orders.layout')

@section('title', 'Order Details')

@section('content')

 {{-- Navbar --}}
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container-fluid">
<a class="navbar-brand" href="{{ route('nike.front') }}">
<img src="{{ asset('img/ChatGPT_Image_Sep_2__2025__11_32_01_AM-removebg-preview.png') }}" alt="Shoes Brand Logo" height="80">
</a>


<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>


<div class="collapse navbar-collapse" id="navbarNav">
<ul class="navbar-nav ms-auto">

<li class="nav-item">
<a class="nav-link" href="/nike/adminpannel"> {{-- use your actual cart route name here --}}
<i class="fas fa-tachometer-alt" style="font-size: 1.5rem; color: red;"></i>
<span>Dashboard</span>
</a>
</li>




<li class="nav-item">
<a class="nav-link"  href="/nike">
<i class="fas fa-upload" style="font-size: 1.5rem; color: red;"></i>
<span>Insert</span>
</a>
</li>




<li class="nav-item">
<a class="nav-link" href="{{ url('/orders') }}"> {{-- use your actual cart route name here --}}
<i class="fas fa-clipboard-list" style="font-size: 1.5rem; color: red;"></i>
<span>Orders</span>
</a>
</li>


<li class="nav-item">
<a class="nav-link" href="{{ route('nike.front') }}">
<i class="fas fa-home mx-1" style="font-size: 1.5rem; color: red;"></i>
<span>Home</span>
</a>
</li>


</ul>
</div>
</div>
</nav>


<!-- Reveal the nav-link blur/opacity on load -->
<script>
document.addEventListener('DOMContentLoaded', function () {
const links = document.querySelectorAll('.nav-link');
links.forEach((link, i) => setTimeout(() => link.classList.add('show'), 200 + i * 200));
});
</script>


<!-- Bootstrap 5 JS (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>







<div class="container mt-4 glow-container">
    <h2>Order Number:  <span style="color:red;">{{ $order->id }}</span></h2>
    <p><strong>Name:</strong> {{ $order->customer_name }}</p>
    <p><strong>Email:</strong> {{ $order->customer_email }}</p>
    <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>

    <h4>Order Items</h4>
    <table class="table table-bordered text-center"style="border:10px solid red;">
        <thead>
            <tr>
                <th>Product</th>
                <th>Category</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->items as $item)
                <tr>
                    <td>{{ $item->product_name }}</td>
                    <td>{{ $item->category }}</td>
                    <td>Rs {{ number_format($item->price) }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>Rs {{ number_format($item->price * $item->quantity) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h5 class="text-end">Grand Total: Rs {{ number_format($order->total_price) }}</h5>
</div>
@endsection