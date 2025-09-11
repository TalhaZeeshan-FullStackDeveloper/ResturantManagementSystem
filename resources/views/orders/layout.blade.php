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


.stylish-heading {
    font-family: 'Poppins', sans-serif; /* Stylish modern font */
    color: red; /* Red text */
    font-weight: 600;
    text-align: center;
  }

  


  .glow-border {
    border: 3px solid red;
    border-radius: 10px;
    padding: 10px;
    box-shadow: 0 0 10px red, 0 0 20px red, 0 0 30px red;
    animation: borderGlow 2s infinite alternate;
  }

  @keyframes borderGlow {
    from {
      box-shadow: 0 0 5px red, 0 0 15px red;
    }
    to {
      box-shadow: 0 0 20px red, 0 0 40px red, 0 0 60px red;
    }
  }


  .glow-container {
    border: 3px solid red;
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 0 10px red, 0 0 20px red, 0 0 30px red;
    animation: containerGlow 2s infinite alternate;
  }

  @keyframes containerGlow {
    from {
      box-shadow: 0 0 5px red, 0 0 15px red;
    }
    to {
      box-shadow: 0 0 20px red, 0 0 40px red, 0 0 60px red;
    }
  }


  p{
    color:white;
  }
  h2{color: white;}
  h4{color: white;}
    </style>
</head>
<body>
  <div class="container py-4">
      @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif
      @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
      @endif
      @yield('content')
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>