<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Orders')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" />

    <style>
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
<a class="nav-link" href="{{ route('nike.front') }}">
<i class="fas fa-home" style="font-size: 1.5rem; color: red;"></i>
<span>Home</span>
</a>
</li>


<li class="nav-item">
<a class="nav-link" href="{{ route('frontend.about') }}">
<i class="fas fa-users" style="font-size: 1.5rem; color: red;"></i>
<span>About Us</span>
</a>
</li>


<li class="nav-item">
<a class="nav-link" href="{{ route('cart.index') }}"> {{-- use your actual cart route name here --}}
<i class="fas fa-shopping-cart" style="font-size: 1.5rem; color: red;"></i>
<span>Cart</span>
</a>
</li>


<li class="nav-item">
<a class="nav-link" href="{{ url('/contact') }}">
<i class="fas fa-phone" style="font-size: 1.5rem; color: red;"></i>
<span>Contact</span>
</a>
</li>


<li class="nav-item">
<a class="nav-link" href="{{ url('/orders/track') }}">
<i class="fas fa-truck" style="font-size: 1.5rem; color: red;"></i>
<span>Track Order</span>
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

    <!-- Page Content -->
    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>