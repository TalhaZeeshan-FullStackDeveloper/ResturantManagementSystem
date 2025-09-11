



@extends('orders.main')

@section('title', 'Track Order')

@section('content')
<head>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Playfair+Display&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

</head>
<!-- Centered Card with Strong Glowing Red Border -->
<div class="container d-flex justify-content-center align-items-center mt-5">
  <div class="glow-wrapper">
    <form action="{{ route('orders.track.result') }}" method="GET" class="custom-form shadow-lg">
    <h3 class="form-title mb-4 text-center"><span style="color: red;">Track</span> Your <span style="color: red;">Order</span></h3>

      <div class="mb-3">
        <label for="order_id" class="form-label fw-bold">
          Order ID <span>(optional)</span>
        </label>
        <input type="text" name="order_id" id="order_id"
               class="form-control" placeholder="Enter Order ID">
      </div>

      <div class="mb-3">
        <label for="customer_name" class="form-label fw-bold">Customer Name</label>
        <input type="text" name="customer_name" id="customer_name"
               class="form-control" placeholder="Enter your name" required>
      </div>

      <div class="mb-3">
        <label for="customer_email" class="form-label fw-bold">Customer Email</label>
        <input type="email" name="customer_email" id="customer_email"
               class="form-control" placeholder="Enter your email" required>
      </div>

      <button type="submit" class="btn btn-danger w-100 py-2 btn-glow">
        Track Order
      </button>
    </form>
  </div>
</div>

<style>
  /* Outer wrapper creates glowing border */
  .glow-wrapper{
    padding: 6px; /* Border thickness */
    border-radius: 20px;
    background: linear-gradient(90deg,#ff0000,#ff3333,#ff6666,#ff0000);
    background-size: 400% 400%;
    animation: glow 3s linear infinite;
    max-width: 700px; /* wider form */
    width: 100%;
    box-shadow: 0 0 25px rgba(255,0,0,0.7), 
                0 0 50px rgba(255,0,0,0.5),
                0 0 75px rgba(255,0,0,0.3);
  }

  @keyframes glow{
    0%   { background-position:   0% 50%; }
    50%  { background-position: 100% 50%; }
    100% { background-position:   0% 50%; }
  }

  /* Inner form (solid black, white text) */
  .custom-form{
    background: #000;
    border-radius: 16px;
    padding: 2rem 2.5rem;
    color: #fff;
  }

  .custom-form h3 { color: #fff; }

  .custom-form .form-label { color: #fff; }

  .custom-form .form-control{
    background: #0b0b0b;
    color: #fff;
    border: 1px solid rgba(255,255,255,0.15);
    box-shadow: none;
  }
  .custom-form .form-control::placeholder{ color: #bbb; }

  .custom-form .form-control:focus{
    border-color: #ff3333;
    box-shadow: 0 0 8px rgba(255,0,0,0.6);
  }

  /* Glowing button */
  .btn-glow{
    background: linear-gradient(90deg,#ff3333,#ff0000);
    border: none;
    color: #fff;
    transition: transform .08s, box-shadow .15s;
  }
  .btn-glow:hover{
    transform: translateY(-2px);
    box-shadow: 0 0 20px rgba(255,0,0,0.6), 
                0 0 40px rgba(255,0,0,0.4);
  }


  .form-title{
    font-family: 'Playfair Display', serif;
    font-size: 2.2rem;   /* bigger size */
    color: #fff;
    text-shadow: 0 0 10px rgba(255,0,0,0.6), 
                 0 0 20px rgba(255,0,0,0.4); /* glowing effect */
    letter-spacing: 1px;
  }
</style>

@endsection