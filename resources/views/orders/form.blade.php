<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place Your Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
            background: black;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .order-card {
            border-radius: 15px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            background: #fff;
            width: 100%;
            max-width: 450px;
        }
        .form-label {
            font-weight: 600;
        }





       /* Card with glowing border */
.order-card {
  border: 2px solid red;
  border-radius: 15px;
  padding: 25px;
  animation: redGlow 1.5s infinite alternate;
}

@keyframes redGlow {
  0% { box-shadow: 0 0 6px red, 0 0 12px red; }
  100% { box-shadow: 0 0 22px red, 0 0 40px red; }
}

/* Stylish font & larger text */
.stylish-card {
  font-family: 'Poppins', sans-serif;
  font-size: 1.1rem; /* Increase base text size */
  line-height: 1.6;
}

.stylish-card h4 {
  font-size: 2rem;  /* Larger title */
  font-weight: 600;
  letter-spacing: 1px;
}













body{
    background-color: black;
  }


/* Fade-in keyframes */
@keyframes fadeInUp {
from { opacity: 0; transform: translateY(30px); }
to { opacity: 1; transform: translateY(0); }
}


/* Nav link styling */
.nav-link {
margin-right: 15px;
transition: transform 0.3s ease, color 0.3s ease, opacity 0.4s ease, filter 0.4s ease;
opacity: 0; /* will be revealed by adding .show via JS */
filter: blur(5px); /* nice reveal effect */
font-weight: 600;
color: #fff !important; /* default white */
display: flex;
align-items: center;
gap: .25rem;
}
.nav-link:hover { transform: scale(1.05); color: red !important; }
.nav-link.show { opacity: 1; filter: blur(0); }


/* Container animation */
.container-fluid { animation: fadeIn 1s; }
@keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
    </style>
</head>
<body>

@if(!$carts->isEmpty())
<div class="order-card bg-black text-white stylish-card">
    <h4 class="text-center mb-4">
        <span class="text-danger">Place</span> Your <span class="text-danger">Order</span>
    </h4>
    <form action="{{ route('order.place') }}" method="POST" novalidate>
        @csrf
        <div class="mb-3">
            <label for="customer_name" class="form-label">Name</label>
            <input type="text" name="customer_name" id="customer_name" class="form-control" placeholder="Enter your full name" required>
        </div>
        <div class="mb-3">
            <label for="customer_email" class="form-label">Email</label>
            <input type="email" name="customer_email" id="customer_email" class="form-control" placeholder="Enter your email address" required>
        </div>
        <div class="d-grid">
            <button class="btn btn-danger btn-lg" type="submit">Place Order</button>
        </div>
    </form>
</div>
@else
    <div class="alert alert-warning">Thank you! Your order has been received.</div>
@endif

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>