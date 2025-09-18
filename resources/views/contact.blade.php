<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WhatsApp Contact Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome CDN -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">


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





.custom-card {
    background: #000; /* black background */
    border: 14px solid #ff0000; /* red border */
    border-radius: 25px; /* rounded border */
    color: #fff;

    /* Glow effect */
    box-shadow: 0 0 25px rgba(255,0,0,0.9),
                0 0 50px rgba(255,0,0,0.7),
                0 0 80px rgba(255,0,0,0.5);
  }

  /* Text inside card */
  .custom-card .form-label,
  .custom-card h3,
  .custom-card p,
  .custom-card input,
  .custom-card textarea {
    color: #fff;
  }

  /* Form controls */
  .custom-card .form-control {
    background: #111;
    color: #fff;
    border: 1px solid rgba(255,255,255,0.2);
  }
  .custom-card .form-control::placeholder {
    color: #bbb;
  }
  .custom-card .form-control:focus {
    border-color: #ff3333;
    box-shadow: 0 0 12px rgba(255,0,0,0.7);
  }

  /* Glowing button */
  .btn-glow {
    background: linear-gradient(90deg,#ff3333,#ff0000);
    border: none;
    color: #fff;
    border-radius: 12px;
    transition: transform .08s, box-shadow .15s;
  }
  .btn-glow:hover {
    transform: translateY(-2px);
    box-shadow: 0 0 20px rgba(255,0,0,0.7),
                0 0 40px rgba(255,0,0,0.5);
  }

  /* Stylish title */
  .form-title {
    font-family: 'Playfair Display', serif;
    font-size: 2rem;
    font-weight: bold;
    text-shadow: 0 0 10px rgba(255,0,0,0.9),
                 0 0 25px rgba(255,0,0,0.6);
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



<!-- Contact Form -->
<div class="container py-5">
  <div class="glow-wrapper">
  <div class="card custom-card shadow p-4 mx-auto " style="max-width: 600px;">
  <h3 class="form-title text-center mb-4">
    <span class="text-danger">C</span>ontact 
    <span class="text-danger">U</span>s on 
    <span class="text-danger">WhatsApp</span>
  </h3>


      <form id="whatsappForm">
        <div class="mb-3">
          <label for="name" class="form-label">Full Name</label>
          <input type="text" class="form-control" id="name" placeholder="Enter your full name" required>
        </div>
        <div class="mb-3">
          <label for="city" class="form-label">City Name</label>
          <input type="text" class="form-control" id="city" placeholder="Enter your City Name" required>
        </div>
        <div class="mb-3">
          <label for="phone" class="form-label">Phone Number</label>
          <input type="text" class="form-control" id="phone" placeholder="e.g. 03001234567" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" placeholder="ab@gmail.com" required>
        </div>
        <div class="mb-3">
          <label for="message" class="form-label">Message</label>
          <textarea class="form-control" id="message" rows="4" placeholder="Type your message here..." required></textarea>
        </div>
        <div class="d-grid">
          <button type="submit" class="btn btn-danger btn-lg btn-glow">Send via WhatsApp</button>
        </div>
      </form>
    </div>
  </div>
</div>


<script>
document.getElementById("whatsappForm").addEventListener("submit", function(e) {
  e.preventDefault();

  var name = document.getElementById("name").value.trim();
  var city = document.getElementById("city").value.trim();
  var phone = document.getElementById("phone").value.trim();
  var email = document.getElementById("email").value.trim();
  var message = document.getElementById("message").value.trim();

  if (!name || !city || !phone || !email || !message) {
    alert("Please fill in all fields.");
    return;
  }

  var whatsappNumber = "923260971621";
  var whatsappUrl = "https://wa.me/" + whatsappNumber + "?text=" +
    encodeURIComponent(
      "📩 Contact Request\n\n" +
      "👤 Name: " + name + "\n" +
      "🏙 City: " + city + "\n" +
      "📞 Phone: " + phone + "\n" +
      "📧 Email: " + email + "\n" +
      "📝 Message:\n" + message
    );

  window.open(whatsappUrl, "_blank");
});
</script>



</body>
</html>