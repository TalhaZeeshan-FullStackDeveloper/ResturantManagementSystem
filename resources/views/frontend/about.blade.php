<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>About Us - Responsive Parallax</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Playfair+Display&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

  <style>
    *, *::before, *::after { margin:0; padding:0; box-sizing:border-box; }
    html, body { height:100%; scroll-behavior:smooth; font-family:'Poppins', sans-serif; }

    section {
      width: 100%;
      position: relative;
      text-align: center;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }

    .parallax {
      background-attachment: fixed;
      background-size: cover;
      background-position: center;
      color: #fff;
      min-height: 100vh;
      overflow: hidden;
      position: relative;
    }

    @media (max-width: 768px) {
      .parallax { background-attachment: scroll; }
    }

    .parallax-1 { background-image:url('{{ asset("") }}'); }
    .parallax-2 { background-image:url('{{ asset("img/keyboard-5017973_1920.jpg") }}'); }
    .parallax-3 { background-image:url('{{ asset("img/code-4333398_1920.jpg") }}'); }

    .content {
      padding: 60px 20px;
      background: #f4f4f4;
      color: #333;
      font-size: 1.1rem;
      line-height: 1.6;
    }

    /* NAVBAR STYLES */
    .navbar {
      padding: 10px 0;
      z-index: 10;
    }

    .navbar-brand img {
      max-height: 80px;
      transition: transform .5s ease;
    }

    .navbar-brand img:hover {
      transform: scale(1.05);
    }

    .navbar .nav-link {
      font-weight: 600;
      margin-right: 1rem;
      opacity: 0;
      transform: translateY(30px) scale(0.95);
      animation: navFadeIn 0.8s forwards;
    }

    .nav-item:nth-child(1) .nav-link { animation-delay: 0.3s; }
    .nav-item:nth-child(2) .nav-link { animation-delay: 0.5s; }
    .nav-item:nth-child(3) .nav-link { animation-delay: 0.7s; }

    .nav-link:hover {
      color: red !important;
      transform: scale(1.15);
      transition: all 0.3s ease;
    }

    @keyframes navFadeIn {
      to {
        opacity: 1;
        transform: translateY(0) scale(1);
      }
    }

    .welcome-text {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      z-index: 2;
    }

    .stylish-heading {
      font-family: 'Pacifico', cursive;
      font-size: 3rem;
      opacity: 0;
      transform: translateY(20px);
      animation: fadeInDelayed 2s ease-out 1.5s forwards;
    }

    @keyframes fadeInDelayed {
      to { opacity: 1; transform: translateY(0); }
    }

    .animated-thankyou {
      font-family: 'Playfair Display', serif;
      font-size: 6rem;
      color: #fff;
      opacity: 0;
      transform: scale(0.8) translateY(30px);
      animation: fadeInScale 2s ease-out forwards;
      text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
      margin-bottom: 100px;
    }

    @keyframes fadeInScale {
      to { opacity: 1; transform: scale(1) translateY(0); }
    }

    .shoe-img {
      width: 180px;
      height: 180px;
      object-fit: cover;
      border-radius: 50%;
      border: 4px solid #fff;
      box-shadow: 0 4px 8px rgba(0,0,0,0.3);
      transition: transform .3s ease;
    }

    .shoe-img:hover { transform: scale(1.05); }

    @media (max-width:768px) {
      .shoe-img { width: 140px; height: 140px; }
      .stylish-heading { font-size: 2.5rem; }
      .animated-thankyou { font-size: 4rem; margin-bottom: 50px; }
    }

    .developer-info h3 {
      font-size: 2rem;
      font-weight: 600;
      color: #fff;
    }

    .developer-info p {
      font-size: 1rem;
      color: #e0e0e0;
      line-height: 1.5;
      margin-top: 1rem;
    }

    .developer-card {
      padding: 20px;
      background-color: rgba(255, 255, 255, 0.05);
      border-radius: 12px;
      transition: transform 0.4s ease, box-shadow 0.4s ease;
      animation: slideFadeIn 1.2s ease both;
      cursor: pointer;
    }

    .developer-card:hover {
      transform: scale(1.05);
      box-shadow: 0 8px 20px rgba(0,0,0,0.3);
    }

    @keyframes slideFadeIn {
      0% { opacity: 0; transform: translateY(30px) scale(0.95); }
      100% { opacity: 1; transform: translateY(0) scale(1); }
    }
  </style>
</head>
<body>

  <!-- ✅ NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-black container position-fixed top-0 start-0 end-0">
    <a class="navbar-brand" href="#">
      <img src="{{ asset('img/ChatGPT_Image_Sep_2__2025__11_32_01_AM-removebg-preview.png') }}" alt="Logo">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item"><a href="{{ route('nike.front') }}" class="nav-link"><i class="fas fa-home mx-1" ></i>Home</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('frontend.about') }}">About Us</a></li>
        <li class="nav-item"><a href="{{ route('cart.index') }}" class="nav-link"><i class="fas fa-shopping-cart" ></i> Add to Cart</a></li>
      </ul>
    </div>
  </nav>

  <!-- ✅ PARALLAX SECTION 1 -->
  <section class="parallax parallax-1" id="home">
    <video autoplay muted loop playsinline class="position-absolute top-50 start-50 translate-middle w-100 h-100" style="object-fit:cover; z-index:-1;">
      <source src="{{ asset("img/videoplayback1.mp4") }}" type="video/mp4">
      Your browser does not support the video tag.
    </video>
    <div class="overlay position-absolute top-0 start-0 w-100 h-100" style="background:rgba(0,0,0,0.4); z-index:0;"></div>
    <div class="welcome-text">
      <h1 class="stylish-heading">
        <span style="color:red;">W</span>elcome <span style="color:red;">t</span>o <span style="color:red;">O</span>ur <span style="color:red;">W</span>ebsite
      </h1>
    </div>
  </section>

  <!-- ✅ CONTENT SECTION -->
  <section class="content bg-black" id="about-us">
    <h2 style="text-align: center; font-family: 'Pacifico', cursive; font-size: 5rem; color: #fff; margin: 0;">
      <span style="color:red;">O</span>ur <span style="color:red;">T</span>eam
    </h2>
  </section>

  <!-- ✅ DEVELOPER SECTION -->
  <section class="parallax parallax-2">
    <div class="container py-5">
      <div class="row g-4 text-center">
        <div class="col-sm-6 col-md-4">
          <div class="developer-card">
            <img src="{{ asset("img/man-9802795_1920.png") }}" class="shoe-img" alt="Talha Zeeshan">
            <div class="developer-info">
              <h3><span style="color:red;">T</span>alha <span style="color:red;">Z</span>eeshan</h3>
              <p>FULL STACK WEBSITE DEVELOPER<br>HTML, CSS, BOOTSTRAP, JavaScript, Laravel & PHP</p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4">
          <div class="developer-card">
            <img src="{{ asset("img/man-1459246_1920.png") }}" class="shoe-img" alt="Amanullah">
            <div class="developer-info">
              <h3><span style="color:red;">A</span>manullah</h3>
              <p>FULL STACK WEBSITE DEVELOPER<br>HTML, CSS, BOOTSTRAP, JavaScript, Laravel & PHP</p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 mx-auto">
          <div class="developer-card">
            <img src="{{ asset("img/man-1351317_1920.png") }}" class="shoe-img" alt="Mateen Ahmad">
            <div class="developer-info">
              <h3><span style="color:red;">M</span>ateen <span style="color:red;">A</span>hmad</h3>
              <p>FULL STACK APP DEVELOPER<br>HTML, CSS, JavaScript & Related Frameworks</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ✅ ANOTHER CONTENT BLOCK -->
  <section class="content bg-black" id="about-us">
    <h2 style="text-align: center; font-family: 'Pacifico', cursive; font-size: 5rem; color: #fff; margin: 0;">
      <span style="color:red;">O</span>ur <span style="color:red;">S</span>urvices
    </h2>
  </section>

  <!-- ✅ THANK YOU SECTION -->
  <section class="parallax parallax-3" id="add-to-cart">
    <h1 class="animated-thankyou">
      <span style="color:red;">T</span>hanks <span style="color:red;">F</span>or <span style="color:red;">V</span>isiting
    </h1>
  </section>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
