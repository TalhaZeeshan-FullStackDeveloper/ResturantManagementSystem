{{-- resources/views/menu/frontend.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Shoes Club Navbar</title>

  {{-- Bootstrap & Font Awesome --}}
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
  <title>Stylish Text Animation</title>
  <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">

   <!-- Google Fonts -->
   <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Playfair+Display&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">


  <style>
    body {
      margin: 0;
      background-color: black;
    }

    /* Logo image styling */
.navbar-brand img {
  width: 200px;
  height: auto;
  transition: transform 0.5s ease;
}

.navbar-brand img:hover {
  transform: scale(1.05);
}

/* Navigation item animation */
.navbar-nav .nav-item {
  opacity: 0;
  transform: translateY(-20px);
  animation: fadeInUp 0.5s forwards;
}

.navbar-nav .nav-item:nth-child(1) { animation-delay: 0.2s; }
.navbar-nav .nav-item:nth-child(2) { animation-delay: 0.4s; }
.navbar-nav .nav-item:nth-child(3) { animation-delay: 0.6s; }

/* Fade-in keyframes */
@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Nav link styling */
.nav-link {
  margin-right: 15px;
  transition: transform 0.9s ease, color 0.9s ease, opacity 0.9s ease;
  opacity: 0;
  filter: blur(5px);
  font-weight: bold;
  color: white !important;  /* Set default color to white */
}

.nav-link:hover {
  transform: scale(1.1);
  color: red !important;  /* On hover, color changes to red */
}

.nav-link.show {
  opacity: 1;
  filter: blur(0);
}

/* Container animation */
.container-fluid {
  animation: fadeIn 1s;
}

@keyframes fadeIn {
  from { opacity: 0; }
  to { opacity: 1; }
}




   
    

    .typing {
      border-right: 1px solid black;
      white-space: nowrap;
      overflow: hidden;
      animation: typing 2s steps(30, end), blink-caret 0.75s step-end infinite;
    }

    @keyframes typing {
      from { width: 0; }
      to { width: 90%; }
    }

    @keyframes blink-caret {
      from, to { border-color: transparent; }
      50% { border-color: black; }
    }

 /* Footer */
  @keyframes fadeInUp {
    from {
      opacity: 0;
      transform: translateY(20px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .animated-list li {
    opacity: 0;
    animation: fadeInUp 0.6s ease forwards;
  }

  /* Delay each item */
  .animated-list li:nth-child(1) { animation-delay: 0.2s; }
  .animated-list li:nth-child(2) { animation-delay: 0.4s; }
  .animated-list li:nth-child(3) { animation-delay: 0.6s; }
  .animated-list li:nth-child(4) { animation-delay: 0.8s; }
  .animated-list li:nth-child(5) { animation-delay: 1s; }
  .animated-list li:nth-child(6) { animation-delay: 1.2s; }
  .animated-list li:nth-child(7) { animation-delay: 1.4s; }



  .welcome-text {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 2;
    text-align: center;
  }

  .stylish-heading {
    font-size: 4rem; /* bigger size */
    font-weight: 900;
    font-family: 'Poppins', sans-serif;
    text-transform: uppercase;
    letter-spacing: 3px;
    color: white;
    text-shadow: 0 0 10px red, 0 0 20px red, 0 0 30px crimson, 0 0 40px darkred;
    animation: glow 2s infinite alternate;
  }

  @keyframes glow {
    0% {
      text-shadow: 0 0 10px red, 0 0 20px red, 0 0 30px crimson, 0 0 40px darkred;
    }
    100% {
      text-shadow: 0 0 20px red, 0 0 40px crimson, 0 0 60px darkred, 0 0 80px red;
    }
  }







* {
  box-sizing: border-box;
}

body {
  margin: 0;
  font-family: Arial;
  font-size: 17px;
}

#myVideo {
  position: fixed;
  right: 0;
  bottom: 0;
  min-width: 100%; 
  min-height: 100%;
}

.content {
  position: fixed;
  bottom: 0;
  background: rgba(0, 0, 0, 0.5);
  color: #f1f1f1;
  width: 100%;
  padding: 20px;
}

#myBtn {
  width: 200px;
  font-size: 18px;
  padding: 10px;
  border: none;
  background: #000;
  color: #fff;
  cursor: pointer;
}

#myBtn:hover {
  background: #ddd;
  color: black;
}





.flip-box-container {
    display: flex;
    justify-content: center;      /* Center flip boxes horizontally */
    gap: 30px;                    /* Space between flip boxes */
    margin: 50px 20px 0 20px;    /* Top + left/right margins */
    flex-wrap: wrap;              /* Wrap on small screens */
    max-width: 1200px;            /* Limit container width */
    margin-left: auto;
    margin-right: auto;           /* Center container */
  }

  .flip-box {
    background-color: transparent;
    width: 45%;                  /* Two boxes side-by-side with gap */
    max-width: 500px;            /* Optional max width */
    height: 60vh;
    perspective: 1000px;
    position: relative;
  }

  .flip-box-inner {
    position: relative;
    width: 90%;
    height: 90%;
    transition: transform 0.8s;
    transform-style: preserve-3d;
    margin: auto;                /* Center inner box horizontally */
  }

  .flip-box:hover .flip-box-inner {
    transform: rotateY(180deg);
  }

  .flip-box-front,
  .flip-box-back {
    position: absolute;
    width: 100%;
    height: 100%;
    backface-visibility: hidden;
    top: 0;
    left: 0;
    border-radius: 0;
  }

  .flip-box-front img,
  .flip-box-back img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 0;
    display: block;
  }

  .flip-box-back {
    transform: rotateY(180deg);
  }

  /* Responsive: stack flip boxes vertically on small screens */
  @media (max-width: 768px) {
    .flip-box {
      width: 100vw;
      max-width: none;
      height: 40vh;
    }

    .flip-box-inner {
      width: 100%;
      height: 100%;
    }
  }





  .glow-btn {
            display: inline-block;
            padding: 12px 30px;
            font-size: 1.2rem;
            font-weight: bold;
            color: white;
            text-decoration: none;
            background: black;
            border: 2px solid red;
            border-radius: 8px;
            text-align: center;
            transition: 0.3s;
            box-shadow: 0 0 10px red, 0 0 20px red;
        }

        .glow-btn:hover {
            background: red;
            color: white;
            box-shadow: 0 0 20px red, 0 0 40px red, 0 0 60px red;
        }




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
    <a class="navbar-brand" href="#">
      <img src="{{ asset("img/ChatGPT_Image_Sep_2__2025__11_32_01_AM-removebg-preview.png") }}" alt="Shoes Brand Logo" style="height: 80px;">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('nike.front') }}"><i class="fas fa-home mx-1"style="font-size: 1.5rem; color: red;"></i>Home</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{ route('frontend.about') }}">
        <i class="fas fa-users" style="font-size: 1.5rem; color: red;"></i>About Us</a>

        <li class="nav-item">
    <a class="nav-link" href="{{ route('cart.index') }}" >
    <i class="fas fa-shopping-cart" style="font-size: 1.5rem; color: red;"></i> Cart
    </a>
    <li class="nav-item">
    <a class="nav-link"href="{{ url('/contact') }}" >
    <i class="fas fa-phone" style="font-size: 1.5rem; color: red;"></i> Contact
    </a>
</li>
<li class="nav-item">
    <a class="nav-link"a href="{{ url('/orders/track') }}" >
    <i class="fas fa-truck" style="font-size: 1.5rem; color: red;"></i> Track Order
    </a>
</li>
<li>
<form action="/logout" method="POST" class="ms-3">
  @csrf
  <button class="glow-red btn-sm" type="submit">Logout</button>
</form>
        </li>
 

      </ul>
    </div>
  </div>
</nav>






<div class="d-flex justify-content-center py-3">
        <a href='/login1'  class="glow-btn">
            Admin Panel
        </a>
    </div>




{{-- Slide Animations --}}
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const navLinks = document.querySelectorAll(".nav-link");
    navLinks.forEach((link, index) => {
      setTimeout(() => {
        link.classList.add("show");
      }, index * 300);
    });
  });
</script>

{{-- Carousel --}}
<div id="carouselExampleDark" class="carousel carousel-dark slide " data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">

    {{-- Slide 1 --}}
    <div class="carousel-item active bg-black " data-bs-interval="2000">
      <div class="row align-items-center justify-content-center p-5">
        <div class="col-md-6 text-end text-md-start bg-black rounded">
          <h1 class="fw-bold typing text-white">Food <span style="color:red;font-size:35px;">Quality</span> & Fresh</h1>
          <p class="text-justify typing text-white">well-prepared, and flavorful dishes.Consistency<br>in taste every time a customer visits.</p>
        </div>
        <div class="col-md-6 text-center">
          <img src="{{ asset("img/cupcake-2749204_1920.jpg") }}" class="img-fluid w-75 rounded" alt="Fashion Shoes" style="transition: transform 0.3s;width:500px"
               onmouseover="this.style.transform='scaleX(-1)';"
               onmouseout="this.style.transform='scaleX(1)' ">
        </div>
      </div>
    </div>

    {{-- Slide 2 --}}
    <div class="carousel-item bg-black" data-bs-interval="2000">
      <div class="row align-items-center justify-content-center p-5">
        <div class="col-md-6 text-end text-md-start bg-black rounded">
          <h1 class="fw-bold typing text-white">Cleanliness and <span style="color:red;font-size:35px;">Hygiene</span></h1>
          <p class="text-justify typing text-white">Clean dining area, restrooms, and kitchen.Proper <br> food safety and hygiene practices.</p>
        </div>
        <div class="col-md-6 text-center">
          <img src="{{ asset("img/fried-flour-7622536_1920.jpg") }}" class="img-fluid w-75 rounded" alt="Fashion Shoes" style="transition: transform 0.3s;width:500px"
               onmouseover="this.style.transform='scaleX(-1)';"
               onmouseout="this.style.transform='scaleX(1)' ">
        </div>
      </div>
    </div>

    {{-- Slide 3 --}}
    <div class="carousel-item bg-black" data-bs-interval="2000">
      <div class="row align-items-center justify-content-center p-5">
        <div class="col-md-6 text-center text-md-start bg-black rounded">
          <h1 class="fw-bold typing text-white">Special Deals & <span style="color:red;font-size:40px;">Offers</span></h1>
          <p class="text-justify typing text-white">Creative promotions, bundle offers, and discounts<br> provide customers with more choices at better prices.</p>
        </div>
        <div class="col-md-6 text-center">
          <img src="{{ asset("img/coffee-3120750_1920.jpg") }}" class="img-fluid w-75 rounded" alt="Leather Shoes" style="transition: transform 0.1s;width:50%"
               onmouseover="this.style.transform='scaleX(-1)';"
               onmouseout="this.style.transform='scaleX(1)' ">
        </div>
      </div>
    </div>
  </div>

  {{-- Carousel Controls --}}
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
    <span class="" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
    <span class="" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

{{-- Scripts --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

{{-- Optional Typing Re-animation (on slide show) --}}
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const slides = document.querySelectorAll('.carousel-item');

    slides.forEach(slide => {
      const h1 = slide.querySelector('h1');
      const p = slide.querySelector('p');

      function typeText(element, text, delay) {
        let index = 0;
        element.innerHTML = '';
        const interval = setInterval(() => {
          if (index < text.length) {
            element.innerHTML += text.charAt(index);
            index++;
          } else {
            clearInterval(interval);
          }
        }, delay);
      }

      slide.addEventListener('shown.bs.carousel', function () {
        typeText(h1, h1.textContent, 90);
        typeText(p, p.textContent, 50);
      });
    });
  });
</script>







<div class="container my-4 position-relative">

    <!-- Responsive video -->
    <div class="ratio ratio-16x9">
        <video autoplay muted loop class="w-100 rounded shadow">
            <source src="{{ asset('img/videoplayback.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

   
</div>









<h2 class="text-center fw-bold display-6 bg-black" style="font-family: 'Playfair Display', serif; color:white;">
  SH<span style="color: red;">O</span>P N<span style="color: red;">O</span>W
</h2>


<div class="text-container bg-black"
     style="overflow: hidden; position: relative; width: 100%; height: 40px;">
  <p id="line1"
     style="opacity: 0; transform: translateX(100%);
            transition: transform 1s ease, opacity 1s ease;
            position: absolute; left: 50%; top: 0;
            margin: 0; white-space: nowrap;
            font-family: 'Lobster', cursive; font-size: 20px; color:white;">
    <span style="color: red;">Delivery</span> charges will be <span style="color: red;">RS 100</span>
  </p>
  <p id="line2"
     style="opacity: 0; transform: translateX(100%);
            transition: transform 1s ease, opacity 1s ease;
            position: absolute; left: 50%; top: 0;
            margin: 0; white-space: nowrap;
            font-family: 'Lobster', cursive; font-size: 20px; color: white;">
    No <span style="color: red;">return</span> or <span style="color: red;">exchange</span> on sale items
  </p>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const line1 = document.getElementById("line1");
    const line2 = document.getElementById("line2");
    let currentLine = 1;

    function showNextLine() {
      if (currentLine === 1) {
        line1.style.opacity = 1;
        line1.style.transform = "translateX(-50%)";
        line2.style.opacity = 0;
        line2.style.transform = "translateX(100%)";
        currentLine = 2;
      } else {
        line1.style.opacity = 0;
        line1.style.transform = "translateX(100%)";
        line2.style.opacity = 1;
        line2.style.transform = "translateX(-50%)";
        currentLine = 1;
      }
    }

    showNextLine();

    setInterval(() => {
      showNextLine();
    }, 3000);
  });
</script>


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


















@if(session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif










<div class="flip-box-container">
  <!-- First Flip Box -->
  <div class="flip-box">
    <div class="flip-box-inner">
      <div class="flip-box-front">
        <img src="{{ asset("img/dinner-1433494_1920.jpg") }}" alt="Front Image" class="rounded">
      </div>
      <div class="flip-box-back">
        <img src="{{ asset("img/cake-1114056_1920.jpg") }}" alt="Back Image" class="rounded">
      </div>
    </div>
  </div>

  <!-- Second Flip Box -->
  <div class="flip-box">
    <div class="flip-box-inner">
      <div class="flip-box-front">
        <img src="{{ asset("img/party-3655712_1920.jpg") }}" alt="Front Image" class="rounded">
      </div>
      <div class="flip-box-back">
        <img src="{{ asset("img/sashimi-platter-2495970_1920.jpg") }}" alt="Back Image" class="rounded">
      </div>
    </div>
  </div>
</div>


<footer>
  <h3 class="text-center fw-bold display-6" style="font-family: 'Playfair Display', serif;color:red;">
    Categories
  </h3>

  <div class="container-fluid my-4" style="font-family: 'Lobster', cursive;">
    <div class="row text-center">

      <div class="col-md-3 col-sm-6 p-4 border">
        <p class="fw-bold" style="color: red;">APPETIZERS / STARTERS</p>
        <ul class="animated-list" style="list-style: none; padding-left: 0; margin: 0; text-align: center;color:white">
          <li>Soups</li>
          <li>Salads</li>
          <li>Spring Rolls</li>
          <li>Nachos</li>
          <li>Chicken Wings</li>
        </ul>
      </div>

      <div class="col-md-3 col-sm-6 p-4 border">
        <p class="fw-bold" style="color: red;">MAIN COURSE</p>
        <ul class="animated-list" style="list-style: none; padding-left: 0; margin: 0; text-align: center;color:white;">
          <li>Grilled Meats</li>
          <li>Steaks</li>
          <li>Burgers</li>
          <li>Pasta</li>
          <li>Seafood</li>
        </ul>
      </div>

      <div class="col-md-3 col-sm-6 p-4 border">
        <p class="fw-bold" style="color: red;">SIDE DISHES</p>
        <ul class="animated-list" style="list-style: none; padding-left: 0; margin: 0; text-align: center;color:white;">
          <li>French Fries</li>
          <li>Mashed Potatoes</li>
          <li>Garlic Bread</li>
          <li>Sautéed Veggies</li>
        </ul>
      </div>

      <div class="col-md-3 col-sm-6 p-4 border">
        <p class="fw-bold" style="color: red;">VEGETARIAN & VEGAN</p>
        <ul class="animated-list" style="list-style: none; padding-left: 0; margin: 0; text-align: center;color:white;">
          <li>Plant-Based Meals</li>
          <li>Tofu Dishes</li>
          <li>Lentils</li>
          <li>Vegetarian Curries</li>
          <li>Vegan Burgers</li>
        </ul>
      </div>

      <div class="col-md-3 col-sm-6 p-4 border">
        <p class="fw-bold" style="color: red;">SEAFOOD</p>
        <ul class="animated-list" style="list-style: none; padding-left: 0; margin: 0; text-align: center;color:white;">
          <li>Fish</li>
          <li>Prawns</li>
          <li>Lobster</li>
          <li>Crabs</li>
          <li>Grilled Salmon</li>
        </ul>
      </div>

      <div class="col-md-3 col-sm-6 p-4 border">
        <p class="fw-bold" style="color: red;">BARBECUE / GRILLED</p>
        <ul class="animated-list" style="list-style: none; padding-left: 0; margin: 0; text-align: center;color:white;">
          <li>Kebabs</li>
          <li>BBQ Chicken</li>
          <li>Grilled Lamb</li>
          <li>Skewers</li>
        </ul>
      </div>

      <div class="col-md-3 col-sm-6 p-4 border">
        <p class="fw-bold" style="color: red;">DESSERTS</p>
        <ul class="animated-list" style="list-style: none; padding-left: 0; margin: 0; text-align: center;color:white;">
          <li>Cakes</li>
          <li>Pastries</li>
          <li>Puddings</li>
          <li>Ice Cream</li>
          <li>Cheesecake</li>
        </ul>
      </div>

      <div class="col-md-3 col-sm-6 p-4 border">
        <p class="fw-bold" style="color: red;">BEVERAGES</p>
        <ul class="animated-list" style="list-style: none; padding-left: 0; margin: 0; text-align: center;color:white;">
          <li>Soft Drinks</li>
          <li>Juices</li>
          <li>Tea</li>
          <li>Coffee</li>
          <li>Mocktails</li>
        </ul>
      </div>

      <div class="col-md-3 col-sm-6 p-4 border">
        <p class="fw-bold" style="color: red;">ALCOHOLIC DRINKS</p>
        <ul class="animated-list" style="list-style: none; padding-left: 0; margin: 0; text-align: center;color:white;">
          <li>Beer</li>
          <li>Wine</li>
          <li>Cocktails</li>
          <li>Whiskey</li>
        </ul>
      </div>

      <div class="col-md-3 col-sm-6 p-4 border">
        <p class="fw-bold" style="color: red;">KIDS MENU</p>
        <ul class="animated-list" style="list-style: none; padding-left: 0; margin: 0; text-align: center;color:white;">
          <li>Nuggets</li>
          <li>Mini Burgers</li>
          <li>Kids Pasta</li>
          <li>Small Portions</li>
        </ul>
      </div>

      <div class="col-md-3 col-sm-6 p-4 border">
        <p class="fw-bold" style="color: red;">HEALTHY OPTIONS</p>
        <ul class="animated-list" style="list-style: none; padding-left: 0; margin: 0; text-align: center;color:white;">
          <li>Salads</li>
          <li>Low-Carb Meals</li>
          <li>Gluten-Free</li>
          <li>Sugar-Free Desserts</li>
        </ul>
      </div>

      <div class="col-md-3 col-sm-6 p-4 border">
        <p class="fw-bold" style="color: red;">SPECIALTY / CHEF’S SPECIALS</p>
        <ul class="animated-list" style="list-style: none; padding-left: 0; margin: 0; text-align: center;color:white;">
          <li>Signature Dishes</li>
          <li>Seasonal Meals</li>
          <li>Chef’s Creations</li>
        </ul>
      </div>

    </div>
  </div>
</footer>




</body>
</html>
