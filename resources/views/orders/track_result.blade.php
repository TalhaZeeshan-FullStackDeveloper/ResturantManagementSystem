@extends('orders.main')

@section('title', 'Order Status')

@section('content')
<head>
     <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Playfair+Display&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

</head>
<div class="container mt-5" style="max-width: 700px;">
  <div class="glow-wrapper">
    <div class="card custom-card shadow-lg border-0 rounded-3">
    <div class="card-header text-center">
  <h4 class="card-title mb-0">Order Status</h4>
</div>
      <div class="card-body p-4">

        @if($orders->count() > 0)
          <div class="list-group">
            @foreach($orders as $order)
              <div class="list-group-item flex-column align-items-start mb-3 rounded custom-item">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">Order #{{ $order->id }}</h5>
                  <small class="text-muted">{{ $order->created_at->format('d M, Y') }}</small>
                </div>
                <p class="mb-1">
                  <strong>Name:</strong> {{ $order->customer_name }}
                </p>
                <p class="mb-1">
                  <strong>Status:</strong> 
                  <span class="badge 
                      @if($order->status == 'pending') bg-warning 
                      @elseif($order->status == 'completed') bg-success 
                      @elseif($order->status == 'cancelled') bg-danger 
                      @else bg-secondary @endif">
                      {{ ucfirst($order->status) }}
                  </span>
                </p>
              </div>
            @endforeach
          </div>
        @else
          <div class="alert alert-danger text-center p-4 rounded">
            ❌ No orders found with this information.
          </div>
        @endif

      </div>
    </div>
  </div>
</div>

<style>
  /* Glowing red animated border wrapper */
  .glow-wrapper {
    padding: 5px; /* border thickness */
    border-radius: 18px;
    background: linear-gradient(90deg,#ff0000,#ff3333,#ff6666,#ff0000);
    background-size: 400% 400%;
    animation: glow 3s linear infinite;
    box-shadow: 0 0 25px rgba(255,0,0,0.7), 
                0 0 50px rgba(255,0,0,0.5);
  }

  @keyframes glow {
    0%   { background-position: 0% 50%; }
    50%  { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
  }

  /* Black card with white text */
  .custom-card {
    background: #000;
    border-radius: 14px;
    color: #fff;
  }

  .custom-card .card-header {
    background: #000;
    border-bottom: 1px solid rgba(255,255,255,0.15);
    color: #fff;
  }

  /* White text inside list items */
  .custom-item {
    background: #0b0b0b;
    color: #fff;
    border: 1px solid rgba(255,255,255,0.1);
  }

  .custom-item h5,
  .custom-item p,
  .custom-item small,
  .custom-item strong {
    color: #fff;
  }

  /* Even muted text is white-ish */
  .custom-item .text-muted {
    color: #bbb !important;
  }

  /* Badges remain colored for status clarity */
  .badge {
    font-size: 0.85rem;
    padding: 0.4em 0.75em;
  }



  .card-title {
    font-family: 'Pacifico', cursive; /* Or: 'Playfair Display', serif; or 'Poppins', sans-serif */
    font-size: 2.5rem;   /* larger size */
    font-weight: 600;
    color: #fff;
    text-shadow: 0 0 12px rgba(255,0,0,0.8), 
                 0 0 25px rgba(255,0,0,0.6);
    letter-spacing: 1px;
  }
</style>

@endsection