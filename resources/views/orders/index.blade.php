

@extends('orders.layout')

@section('title', 'Orders List')

@section('content')

<body>

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








<div class="container mt-4">
    <h2 class="mb-4 stylish-heading">All Orders</h2>

   <!-- 🔎 Live Search Input -->
<div class="mb-5">
    <input type="text" id="search" class="form-control" style="border: 10px solid red;" placeholder="Search by name, email or status...">
</div>


   




    @if($orders->isEmpty())
        <div class="alert alert-warning text-center">No orders found.</div>
    @else
    <!-- Responsive Table Wrapper -->
    <div class="table-responsive glow-border">
        <table class="table table-bordered table-striped align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Customer Name</th>
                    <th>Email</th>
                    <th>Total Price (Rs)</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="orderTableBody">
            @include('orders.partials.order_rows')
                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->customer_name }}</td>
                    <td>{{ $order->customer_email }}</td>
                    <td>{{ number_format($order->total_price) }}</td>
                    <td>
                        <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST" class="d-flex gap-2 justify-content-center">
                            @csrf
                            <select name="status" class="form-select form-select-sm w-auto">
                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                                <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                                <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                                <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                            <button class="btn btn-success btn-sm" type="submit">Update</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('order.show', $order->id) }}" class="btn btn-primary btn-sm mb-1">View</a>
                        <form action="{{ route('orders.destroy', $order->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this order?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
    $('#search').on('keyup', function(){
        let query = $(this).val();
        $.ajax({
            url: "{{ route('orders.index') }}",
            type: "GET",
            data: { search: query },
            success: function(data){
                $('#orderTableBody').html(data);
            }
        });
    });
});
</script>



</body>