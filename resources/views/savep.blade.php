<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Nike Shoes </title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


<style>
  .image-wrapper {
    position: relative;
    overflow: hidden;
  }

  .overlay-hover {
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    background-color: rgba(0, 0, 0, 0.6);
    opacity: 0; /* Completely hidden */
    visibility: hidden;
    transition: opacity 0.4s ease-in-out;
  }

  .image-wrapper:hover .overlay-hover {
    opacity: 1;
    visibility: visible;
  }


  .circle-img {
      width: 60%;
      aspect-ratio: 1 / 1;
      object-fit: cover;
      border-radius: 80%;
      border: 4px solid #fff;
      box-shadow: 0 4px 12px rgba(0,0,0,0.2);
      transition: transform 0.3s ease;
    }

    .circle-img:hover {
      transform: scale(1.05);
    }




 

/* Smooth zoom on card click */
.product-card {
  transition: transform 0.6s ease, box-shadow 0.6 s ease;
  cursor: pointer;
}
.product-card:hover {
  transform: scale(1.03);
  box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
}
.product-card:active {
  transform: scale(1.12);
  transition: transform 0.1s ease-in-out;
}

/* Heading font responsive and modern */
h1.display-5 {
  font-size: clamp(2rem, 5vw, 3.5rem);
  color: #1e3a8a;
}

/* Responsive tweaks */
@media (max-width: 576px) {
  .card-img-top {
    height: 180px;
  }
} 


 .custom-marquee-wrapper {
    overflow: hidden;
    height: 60px;
    position: relative;
    background-color: #eff1f5;
  }

  .custom-marquee {
    display: flex;
    flex-direction: column;
    position: absolute;
    width: 100%;
    animation: marqueeLoop 3s linear infinite; /* infinite loop */
  }

  .custom-marquee p {
    margin: 0;
    padding: 12px 0;
    font-size: 20px;
    font-weight: 600;
    text-align: center;
    opacity: 3;
    animation: fadeInOut 6s ease-in-out infinite;
  }

  .custom-marquee p:nth-child(2) {
    animation-delay: 2s;
  }

  @keyframes marqueeLoop {
    0%, 100% { top: 0; }
    50% { top: -100%; }
  }

  @keyframes fadeInOut {
    0% { opacity: 0; }
    10% { opacity: 1; }
    40% { opacity: 1; }
    50% { opacity: 0; }
    100% { opacity: 0; }
  }



  #typewriterHeading::after {
    content: '|';
    animation: blink 0.7s infinite;
    color: #1e3a8a;
  }

  @keyframes blink {
    0% { opacity: 1; }
    50% { opacity: 0; }
    100% { opacity: 1; }
  }




  .flip-card {
      background-color: transparent;
      width: 100%;
      height: 300px;
      perspective: 1000px; /* 3D effect */
    }

    .flip-card-inner {
      position: relative;
      width: 100%;
      height: 100%;
      transition: transform 0.6s;
      transform-style: preserve-3d;
    }

    .flip-card:hover .flip-card-inner {
      transform: rotateY(180deg);
    }

    .flip-card-front,
    .flip-card-back {
      position: absolute;
      width: 100%;
      height: 100%;
      backface-visibility: hidden;
      border-radius: 15px;
      overflow: hidden;
      outline:auto;
    }

    .flip-card-front img,
    .flip-card-back img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .flip-card-back {
      transform: rotateY(180deg);
    }




/* Navbar style */
  .navbar {
    background-color: #f8f9fa;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    animation: fadeInDown 0.6s ease-in-out;
  }

  /* Brand text */
  .navbar-brand strong {
    font-size: 24px;
    font-weight: bold;
  }

  .navbar-brand span {
    color: #0d6efd;
    font-size: 30px;
  }

  /* Nav links */
  .navbar-nav .nav-link {
    font-size: 18px;
    margin-right: 15px;
    color: #333;
    transition: all 0.3s ease;
    position: relative;
  }

  .navbar-nav .nav-link:hover {
    color: #0d6efd;
  }

  .navbar-nav .nav-link::after {
    content: '';
    position: absolute;
    width: 0%;
    height: 2px;
    background-color: #0d6efd;
    bottom: 0;
    left: 0;
    transition: 0.3s;
  }

  .navbar-nav .nav-link:hover::after {
    width: 100%;
  }

  .btn-outline-primary {
    font-size: 16px;
    padding: 5px 12px;
  }

  /* Heading animation */
  @keyframes fadeInDown {
    from {
      transform: translateY(-30px);
      opacity: 0;
    }
    to {
      transform: translateY(0);
      opacity: 1;
    }
  }

  /* Typewriter heading */
  #typewriterHeading {
    font-family: 'Poppins', sans-serif;
    font-size: 2.5rem;
    color: #1e3a8a;
    margin-top: 20px;
    text-align: center;
  }
</style>
</head>
<body>

  <!-- Typewriter Heading -->
<div class="container">
  <h1 id="typewriterHeading" class="fw-bold"></h1>
</div>

<!-- Typewriter Script -->
<script>
  const text = "Welcome to Nike";
  const heading = document.getElementById("typewriterHeading");

  let index = 0;
  let isDeleting = false;

  function typeEffect() {
    if (!isDeleting) {
      heading.textContent = text.slice(0, index++);
      if (index > text.length) {
        isDeleting = true;
        setTimeout(typeEffect, 1500);
        return;
      }
    } else {
      heading.textContent = text.slice(0, --index);
      if (index === 0) {
        isDeleting = false;
      }
    }
    setTimeout(typeEffect, isDeleting ? 100 : 150);
  }

  typeEffect();
</script>

<!-- Navbar -->
<nav class="navbar navbar-expand-sm navbar-light">
  <div class="container-fluid">
    <!-- Logo and Brand -->
    <a class="navbar-brand" href="#">
      <img src="/images/1755021906-removebg-preview.png" height="80px" alt="Nike Logo">
      <strong><span>Nike</span> Shoes </strong>
    </a>

    <!-- Mobile Toggle Button -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <form action="/logout" method="POST" class="ms-3">
            @csrf
            <button class="btn btn-outline-primary btn-sm">Logout</button>
          </form>

    <!-- Navbar Links -->
    <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
      <ul class="navbar-nav align-items-center">
        <li class="nav-item"><a class="nav-link" href="{{ route('nike.front') }}"> Home</a></li>
        <li class="nav-item"><a class="nav-link" href="/nike">insert items</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('frontend.about') }}"> About</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/contact') }}"> Contact</a></li>
        <li class="nav-item">
          <li class="nav-item"><a class="nav-link" href="{{ url('/orders') }}"> Orders</a></li>
        <li class="nav-item">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/orders/track') }}"> Orders track</a></li>
        <li class="nav-item">
          <a href="{{ route('cart.index') }}" class="btn btn-outline-primary">🛒 View Cart</a>
        </li>
      </ul>
    </div>
  </div>
        </div>
      </div>
</nav>



 <!-- Modern Marquee with Loop and Fade -->
<div class="container-fluid p-0">
  <div class="custom-marquee-wrapper">
    <div class="custom-marquee">
      <p>🏃‍♂ Delivery charges :RS 100 — <span style="color:blue; font-size: 22px;"><b>Nike Shoes</b></span></p>
      <p>🛍 Order Now for <span style="color:blue;"><b>Free Shipping in our city</b></span></p>
    </div>
  </div>
</div>


 <!-- ✅ Responsive Fullscreen Video Section with Text -->
<div class="container-fluid p-0 position-relative">
  <!-- Video Wrapper -->
  <div class="ratio ratio-16x9">
    <video autoplay muted loop playsinline class="w-100 h-100 object-fit-cover">
      <source src="/image/videoplayback_eu6r6lNb.webm" />
      Your browser does not support the video tag.
    </video>
  </div>
   <!-- Text Overlay -->
  <div class="position-absolute top-50 start-50 translate-middle text-white text-center px-3">
    <h1 class="display-4 fw-bold text-light"><span class="text-primary">Welcome</span> to Our Website</h1>

  </div>
</div>
<!-- endFullscreen Video -->


<!-- Carousel -->
<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">

    <!-- Slide 1 -->
    <div class="carousel-item active" data-bs-interval="3000">
      <div class="row align-items-center justify-content-center px-3 px-md-5 py-5">
        <div class="col-md-6 text-end text-md-start">
          <h1 class="fw-bold">Discover the Power of <span style="color:blue;">Nike</span></h1>
          <p>Engineered for comfort, built for performance. Whether <br> on the field or in the streets — step ahead with Nike.</p>
        </div>
        <div class="col-md-6 text-center">
          <img src="/images/1755021906-removebg-preview.png" class="img-fluid w-75" alt="Nike Tennis Shoes">
        </div>
      </div>
    </div>

    <!-- Slide 2 -->
    <div class="carousel-item" data-bs-interval="3000">
      <div class="row align-items-center justify-content-center px-3 px-md-5 py-5">
        <div class="col-md-6 text-end text-md-start">
          <h1 class="fw-bold">Step Into the <span style="color:blue;">Future</span></h1>
          <p>New arrivals now available — comfort meets fashion. Grab your perfect pair today in Rahim Yar Khan!</p>
        </div>
        <div class="col-md-6 text-center">
          <img src="/images/1755021906-removebg-preview.png" class="img-fluid w-75" alt="Fashion Shoes">
        </div>
      </div>
    </div>

    <!-- Slide 3 -->
    <div class="carousel-item" data-bs-interval="3000">
      <div class="row align-items-center justify-content-center px-3 px-md-5 py-5">
        <div class="col-md-6 text-end text-md-start">
          <h1 class="fw-bold">Classic <span style="color:blue;">Leather</span> Perfection</h1>
          <p>Explore our premium leather shoes collection — unmatched elegance and durability.</p>
        </div>
        <div class="col-md-6 text-center">
          <img src="/images/1755021906-removebg-preview.png" class="img-fluid w-75" alt="Leather Shoes">
        </div>
      </div>
    </div>

  </div>

  <!-- Carousel Controls -->
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
    <span class="" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
    <span class="" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<!-- #end carousel -->

<div class="container my-5">
  <h2 class="text-center mb-4 fw-bold">Our <span style="color: #0d6efd;">Top</span> Picks</h2>
  <div class="row text-center g-4">
    <div class="col-12 col-sm-6 col-md-4">
      <img src="/image/feet-1840619_1920.jpg" alt="Image 1" class="circle-img">
    </div>
    <div class="col-12 col-sm-6 col-md-4">
      <img src="/images/1754561392.jpg" alt="Image 2" class="circle-img">
    </div>
    <div class="col-12 col-sm-6 col-md-4 mx-auto">
      <img src="/images/1753420650.jpg" alt="Image 3" class="circle-img">
    </div>
  </div>
</div>


<!-- Section Heading -->
<div class="text-center py-4 bg-light">
  <h1 class="fw-bold text-dark" style="font-size: 2.5rem;">
    Sh<span class="text-primary">o</span>p N<span class="text-primary">o</span>w
  </h1>
</div>
<div class="container py-4"style="outlile:auto;">
  {{-- Success Alert --}}
  @if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ Session::get('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
  {{-- Error Alert --}}
  @if (Session::has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ Session::get('error') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
 {{-- Products --}}
@if($products->isNotEmpty())
  <div class="container py-4">
    <div id="product-list" class="row g-4 justify-content-center">
      @include('nike.partials.product_cards', ['products' => $products])
    </div>
    <!-- See More Button -->
    @if($products->hasMorePages())
      <div class="text-center mt-4">
  <button id="load-more-btn"
          class="btn btn-primary btn-lg rounded-pill shadow fw-bold px-5 py-2"
          data-next-page="{{ $products->currentPage() + 1 }}">
     See More
  </button>
</div>

    @endif
  </div>
@else
  <div class="alert alert-info text-center mt-4">
    No products found.
  </div>
@endif

<!-- Include jQuery if not already -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script>
  $(document).ready(function() {
    $('#load-more-btn').on('click', function() {
      var button = $(this);
      var nextPage = button.data('next-page');
      $.ajax({
        url: "{{ route('nike.loadMore') }}?page=" + nextPage,
        type: 'GET',
        beforeSend: function() {
          button.text('Loading...');
        },
        success: function(response) {
          if (response.html) {
            $('#product-list').append(response.html);
            button.data('next-page', nextPage + 1);
            button.text('See More');
            if (!response.hasMorePages) {
              button.hide();
            }
          } else {
            button.hide();
          }
        },
        error: function() {
          alert('Error loading more products.');
          button.text('See More');
        }
      });
    });
  });
</script>



<div class="container my-5">
  <div class="row g-4">
    <!-- Card 1 -->
    <div class="col-md-6">
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <img src="/images/1753420650.jpg" alt="Front" style="transform: scaleX(-1);">
          </div>
          <div class="flip-card-back">
            <img src="/images/1753423935.png" alt="Back" style="transform: scaleX(-1);">
          </div>
        </div>
      </div>
    </div>
    <!-- Card 2 -->
    <div class="col-md-6">
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <img src="/images/1753420490.png" alt="Front" style="transform: scaleX(-1);">
          </div>
          <div class="flip-card-back">
            <img src="/images/1753420779.jpg" alt="Back" style="transform: scaleX(-1);">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


   <!-- Footer -->
<div class="container-fluid bg-dark mt-5 py-4 text-white">
  <div class="text-center mb-4">
  <h1 class="fw-bold" style="font-size: 2.5rem;">
    <span class="text-primary">S</span>tep Into <span class="text-primary">S</span>tyle
  </h1>
</div>
  <div class="row">
    <div class="col-6 col-md-3 mb-3 text-center">
      <h5 class="text-uppercase fw-bold">Company</h5>
      <ul class="list-unstyled d-inline-block text-start">
        <li><a href="#" class="text-decoration-none text-white">About Us</a></li>
        <li><a href="#" class="text-decoration-none text-white">Careers</a></li>
        <li><a href="#" class="text-decoration-none text-white">Affiliates</a></li>
        <li><a href="#" class="text-decoration-none text-white">Blog</a></li>
        <li><a href="#" class="text-decoration-none text-white">Contact Us</a></li>
      </ul>
    </div>
    <div class="col-6 col-md-3 mb-3 text-center">
      <h5 class="text-uppercase fw-bold">Shop</h5>
      <ul class="list-unstyled d-inline-block text-start">
        <li><a href="#" class="text-decoration-none text-white">New Arrivals</a></li>
        <li><a href="#" class="text-decoration-none text-white">Accessories</a></li>
        <li><a href="#" class="text-decoration-none text-white">Men</a></li>
        <li><a href="#" class="text-decoration-none text-white">Women</a></li>
        <li><a href="#" class="text-decoration-none text-white">Shop All</a></li>
      </ul>
    </div>
    <div class="col-6 col-md-3 mb-3 text-center">
      <h5 class="text-uppercase fw-bold">Help</h5>
      <ul class="list-unstyled d-inline-block text-start">
        <li><a href="#" class="text-decoration-none text-white">Customer Service</a></li>
        <li><a href="#" class="text-decoration-none text-white">My Account</a></li>
        <li><a href="#" class="text-decoration-none text-white">Find a Store</a></li>
        <li><a href="#" class="text-decoration-none text-white">Legal & Privacy</a></li>
        <li><a href="#" class="text-decoration-none text-white">Gift Card</a></li>
      </ul>
    </div>

    <div class="col-6 col-md-3 mb-3 text-center">
      <h5 class="text-uppercase fw-bold">Categories</h5>
      <ul class="list-unstyled d-inline-block text-start">
        <li><a href="#" class="text-decoration-none text-white">Shirts</a></li>
        <li><a href="#" class="text-decoration-none text-white">Jeans</a></li>
        <li><a href="#" class="text-decoration-none text-white">Shoes</a></li>
        <li><a href="#" class="text-decoration-none text-white">Bags</a></li>
        <li><a href="#" class="text-decoration-none text-white">Shop All</a></li>
      </ul>
    </div>

  </div>
</div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>
</body>
</html>