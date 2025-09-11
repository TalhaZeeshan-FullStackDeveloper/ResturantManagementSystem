<style>
  /* Card hover effect */
  .product-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border-radius: 15px;
    overflow: hidden;
  }

  .product-card:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 0 12px 25px rgba(159, 8, 8, 0.2);
  }

  /* Image wrapper */
  .image-wrapper {
    position: relative;
    overflow: hidden;
    border-radius: 15px 15px 0 0;
  }

  .image-wrapper img {
    transition: transform 0.4s ease;
  }

  .product-card:hover .image-wrapper img {
    transform: scale(1.1);
  }

  /* Hover overlay */
  .overlay-hover {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(220, 53, 69, 0.6); /* Bootstrap danger color overlay */
    opacity: 0;
    transition: opacity 0.4s ease, transform 0.3s ease;
    transform: translateY(20px);
  }

  .product-card:hover .overlay-hover {
    opacity: 1;
    transform: translateY(0);
  }

  /* Button inside overlay */
  .overlay-hover button {
    transform: scale(0.9);
    transition: transform 0.3s ease, background 0.3s ease;
  }

  .overlay-hover button:hover {
    transform: scale(1.05);
    background-color:rgb(226, 12, 33) !important; /* Darker red on hover */
  }

  /* Star icons color */
  .star-rating i {
    font-size: 1.1rem;
    margin-right: 2px;
  }

  .star-rating .bi-star-fill {
    color: #ffc107;
  }

  .star-rating .bi-star {
    color: #ccc;
  }
</style>


@foreach ($products as $product)
  <div class="col-lg-4 col-md-6 col-sm-10">
    <div class="card product-card h-100 border-0 shadow-sm bg-light">

      <!-- Image with hover overlay -->
      <div class="position-relative image-wrapper">
        @if (!empty($product->image))
          <img src="{{ asset('images/' . $product->image) }}" class="card-img-top" style="height: 200px; object-fit: cover;">
        @else
          <img src="https://placehold.co/300x200" class="card-img-top" style="height: 200px; object-fit: cover;">
        @endif

        <div class="overlay-hover d-flex justify-content-center align-items-center">
          <form action="{{ route('cart.store') }}" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <button type="submit" class="btn btn-danger btn-sm">🛒 Add to Cart</button>
          </form>
        </div>
      </div>

      <!-- Product Info -->
      <div class="card-body text-center" style="background-color:rgb(25, 13, 4) ;color:whitesmoke">
        <h5 class="card-title">{{ $product->name }}</h5>

       

        <p class="card-text"><strong>Price:</strong> {{ $product->price }}</p>
        <p class="card-text"><strong>Category:</strong> {{ $product->category }}</p>
      </div>
    </div>
  </div>
@endforeach
