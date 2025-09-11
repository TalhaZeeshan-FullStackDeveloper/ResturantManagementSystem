<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Orders')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" />
     <!-- Google Fonts -->
   <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Playfair+Display&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">


    <style>
         body{
    background-color: black;
  }


/* Fade-in keyframes */
@keyframes fadeInUp {
from { opacity: 0; transform: translateY(30px); }
to { opacity: 1; transform: translateY(0); }
}


/* Nav link styling */.nav-link {
    margin-right: 15px;
    transition: transform 0.3s ease, color 0.3s ease, opacity 0.4s ease, filter 0.4s ease;
    opacity: 0; /* will be revealed by adding .show via JS */
    filter: blur(5px);
    font-weight: 600;
    color: #fff !important;
    display: flex;
    align-items: center;
    gap: .35rem;

    /* 👇 Stylish font + bigger size */
    font-family: 'Poppins', sans-serif;
    font-size: 1.25rem;  /* ~20px */
    letter-spacing: 0.5px;
}

.nav-link:hover { 
    transform: scale(1.1); 
    color: red !important; 
}
.nav-link.show { opacity: 1; filter: blur(0); }


/* Container animation */
.container-fluid { animation: fadeIn 1s; }
@keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }






.glow-red {
    border: 2px solid red;
    border-radius: 8px;
    padding: 6px 14px;
    color: #fff;
    background: transparent;
    font-family: 'Poppins', sans-serif;
    font-size: 1.1rem;
    font-weight: 600;
    box-shadow: 0 0 8px red, 0 0 12px red;
    transition: all 0.3s ease-in-out;
    cursor: pointer;
}

/* Hover effect → stronger glow */
.glow-red:hover {
    background: red;
    color: #fff;
    transform: scale(1.08);
    box-shadow: 0 0 15px red, 0 0 30px red, 0 0 45px red;
}


  
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

<li class="nav-item">
<a class="nav-link" href="/register1"> {{-- use your actual cart route name here --}}
<i class="fas fa-user-plus" style="font-size: 1.5rem; color: red;"></i>
<span>Register</span>
</a>
</li>
<li>
<form action="/logout1" method="POST" class="ms-3">
  @csrf
  <button class="glow-red btn-sm" type="submit">Logout</button>
</form>
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


<div class="container my-4">
    <div class="ratio ratio-16x9">
        <video controls autoplay muted loop class="w-100 rounded shadow">
            <source src="{{ asset("img/videoplayback.mp4") }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
</div>
</body>
