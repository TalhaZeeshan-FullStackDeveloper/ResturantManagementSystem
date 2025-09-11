
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laravel Add to Cart</title>


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
<!-- Font Awesome 5 (for .fas icons) -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" />

</head>
<style>
   .shining-red-border {
    position: relative;
    padding: 5px; /* space for border glow */
    border-radius: 10px;
    background: red;
    animation: redGlow 2s infinite alternate;
    display: inline-block; /* shrink to content */
  }

  .shining-red-border form {
    background: #fff; /* form background */
    border-radius: 8px;
    padding: 10px;
  }

  @keyframes redGlow {
    0% {
      box-shadow: 0 0 5px red, 0 0 10px red, 0 0 20px red;
    }
    100% {
      box-shadow: 0 0 20px red, 0 0 40px red, 0 0 60px red;
    }
  }






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




<div class="container mt-4">
  {{-- Top Bar: Back, Search, Create --}}
  <div class="d-flex justify-content-between mb-3 align-items-center">
    {{-- Centered Search Bar --}}
    <div class="shining-red-border mx-auto my-4" style="max-width: 500px; width: 100%;">
  <form action="{{ route('nike.indexn') }}" method="GET" class="d-flex">
    <input type="text" name="search" class="form-control"
           placeholder="Search products..." value="{{ $search ?? '' }}">
    <button type="submit" class="btn btn-danger btn-sm px-4">
      <i class="bi bi-search" style="font-size: 1.25rem;"></i> Search
    </button>
  </form>
</div>



    <a href="{{ route('nike.createn') }}" class="btn btn-outline-danger">
      <i class="bi bi-plus-circle"></i> Create Product
    </a>

  </div>

  @if(isset($products) && $products->count())
    <div class="table-responsive">
      <table class="table table-bordered table-striped table-hover bg-white">
        <thead class="table-dark text-center">
          <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Category</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody class="text-center">
          @foreach ($products as $product)
            <tr>
              <td>{{ $product->id }}</td>
              <td>
                @if (!empty($product->image) && file_exists(public_path('images/' . $product->image)))
                  <img src="{{ asset('images/' . $product->image) }}" width="80" height="60" class="rounded">
                @elseif(!empty($product->image))
                  <img src="{{ $product->image }}" width="80" height="60" class="rounded">
                @else
                  <img src="https://placehold.co/80x60" width="80" height="60" class="rounded">
                @endif
              </td>
              <td>{{ $product->name }}</td>
              <td>Rs {{ number_format($product->price, 0) }}</td>
              <td>{{ $product->category }}</td>
              <td>
                <a href="{{ route('nike.editn', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('nike.destroy', $product->id) }}" method="POST" class="d-inline"
                      onsubmit="return confirm('Are you sure you want to delete this item?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm mt-1">Delete</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center bg-body-secondary">
      {{ $products->links('pagination::bootstrap-5') }}
    </div>
  @else
    <div class="alert alert-danger text-center">No products found.</div>
  @endif

</div>
