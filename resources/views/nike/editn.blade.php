<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nike shoes edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Font Awesome 5 (for .fas icons) -->
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
    <div class="container mb-5">
        <div class="row">
            <div class="d-flex justify-content-end p-0 mt-3">
                <a href="{{ route('nike.indexn') }}" class="btn btn-outline-danger">Back</a>
            </div>
        <div class="card p-0 mt-3">
            <div class="card-header bg-danger text-white">
                <h4 class="h4">Edit item list</h4>
            </div>
            <div class="card-body shadow-lg">
                <form action="{{ route('nike.update',$product->id) }}" enctype="multipart/form-data" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input value="{{ old('name', $product->name) }}" type="text" class="form-control  @error('name') is-invalid  @enderror"
                        id="name" name="name" placeholder="name">
                        @error('name')
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror

                        @if (!empty($product->image ))
                                <img class="rounded mt-3" src="{{ asset('images/'.$product->image) }}" width="100">
                                @endif
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input  value="{{ old('image') }}" type="file" class="form-control  @error('image') is-invalid  @enderror" id="image" name="image">
                        @error('image')
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">price</label>
                        <input  value="{{ old('price', $product->price) }}" type="text" class="form-control @error('price') is-invalid  @enderror" id="price" name="price" placeholder="price">
                        @error('price')
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">category</label>
                        <input  value="{{ old('category', $product->category) }}" type="text" class="form-control  @error('category') is-invalid  @enderror" id="category" name="category" placeholder="category">
                        @error('category')
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="d-grid gap-2 col-6 mx-auto">
                    <button class="btn btn-danger"><b>Update</b></button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>